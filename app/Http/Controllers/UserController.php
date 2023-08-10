<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('deleted_at', '=', null)->get();
        return view('users.index', compact(['users']));
    }

    /**
     *
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $req)
    {
        dd($req);
        User::create([
            'name' => $req->name,
            'type' => $req->type,
            'email' => $req->email,
            'password' => Hash::make($req->username),
        ]);
        return redirect(route('user.index'))->with('add', 'User added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = User::where('id', '=', $user->id)->get();
        $login_time = Carbon::parse($user[0]->login_at);
        $created_time = Carbon::parse($user[0]->created_at);
        $updated_time = Carbon::parse($user[0]->updated_at);
        $login_at = $login_time->isoFormat('dddd, MMMM Do YYYY, h:mm:ss A, z');
        $created_at = $created_time->isoFormat('dddd, MMMM Do YYYY, h:mm:ss A, z');
        $updated_at = $updated_time->isoFormat('dddd, MMMM Do YYYY, h:mm:ss A, z');
        $created_ago = $user[0]->created_at->diffForHumans();
        $updated_ago = $user[0]->updated_at->diffForHumans();
        return view('users.show', compact(['user', 'login_at', 'created_at', 'updated_at', 'created_ago', 'updated_ago']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $users = User::where('id', '=', $user->id)->get();
        return view('users.edit', compact(['users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $req, User $user)
    {
        $users = User::where('id', '=', $user->id)->update([
            'name' => $req->name,
            'email' => $req->email,
        ]);
        return redirect(route('user.index'))->with('update', 'User details have been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::where('id', '=', $user->id)->update([
            'deleted_at' => Carbon::now()->toDateTimeString(),
        ]);
        $users = User::where('deleted_at', '=', null)->get();
        return redirect(route('user.index', ['users' => $users]));
    }

    /**
     * Deactivate the active user.
     */
    public function deactivate_user_account($id)
    {
        User::where('id', '=', $id)->update([
            'account_status' => 0,
        ]);
        $users = User::where('account_status', '=', 0)->get();
        return redirect(route('user.index', ['users' => $users]));
    }

    /**
     * Deactivate the active user.
     */
    public function activate_user_account($id)
    {
        User::where('id', '=', $id)->update([
            'account_status' => 1,
        ]);
        $users = User::where('deleted_at', '=', null)->get();
        return redirect(route('user.index', ['users' => $users]));
    }

    /**
     * Display the deleted users.
     */
    public function show_deleted_users(User $user)
    {
        $users = User::where('deleted_at', '!=', null)->get();
        return view('users.deleted', compact(['users']));
    }

    /**
     * Display the deactivated users.
     */
    public function show_deactivated_users()
    {
        $users = User::where('account_status', '=', 0)->get();
        return view('users.deactivated', compact(['users']));
    }

    public function change_password(Request $req)
    {
        $users = User::where('id', '=', $req->id)->get();
        return view('users.change-password', compact(['users']));
    }

    public function update_password(User $user, Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'password' => ['required', 'required_with:password_confirmation', 'min:8'],
            'password_confirmation' => ['required', 'same:password', 'min:8'],
        ]);
        User::where('id', '=', $request->id)->update([
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->back()->with('status', "password updated successfully");
    }

    public function impersonate(User $user)
    {
        auth()->user()->impersonate($user);

        return redirect()->route('dashboard');
    }

    public function leaveImpersonate()
    {
        auth()->user()->leaveImpersonation();

        return redirect()->route('dashboard');
    }
}