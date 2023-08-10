<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = User::where('id', '=', Auth::user()->id)->get();

        $login_time = Carbon::parse($user[0]->login_at);
        $created_time = Carbon::parse($user[0]->created_at);
        $updated_time = Carbon::parse($user[0]->updated_at);
        $login_at = $login_time->isoFormat('dddd, MMMM Do YYYY, h:mm:ss A, z');
        $created_at = $created_time->isoFormat('dddd, MMMM Do YYYY, h:mm:ss A, z');
        $updated_at = $updated_time->isoFormat('dddd, MMMM Do YYYY, h:mm:ss A, z');
        $created_ago = $created_time->diffForHumans();
        $updated_ago = $updated_time->diffForHumans();

        return view('profile', compact(['user', 'login_at', 'created_at', 'updated_at', 'created_ago', 'updated_ago']));

    }

    /**
     * Update the user's profile information.
     */
    public function update(UpdateProfileRequest $request)
    {
        dd($request);
        User::where('email', '=', $request->email)->update([
            'name' => $request->name,
        ]);
        $user = User::where('id', '=', Auth::user()->id)->get();
        $login_time = Carbon::parse($user[0]->login_at);
        $created_time = Carbon::parse($user[0]->created_at);
        $updated_time = Carbon::parse($user[0]->updated_at);
        $login_at = $login_time->isoFormat('dddd, MMMM Do YYYY, h:mm:ss A, z');
        $created_at = $created_time->isoFormat('dddd, MMMM Do YYYY, h:mm:ss A, z');
        $updated_at = $updated_time->isoFormat('dddd, MMMM Do YYYY, h:mm:ss A, z');
        $created_ago = $created_time->diffForHumans();
        $updated_ago = $updated_time->diffForHumans();

        return view('profile', compact(['user', 'login_at', 'created_at', 'updated_at', 'created_ago', 'updated_ago']))->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile information.
     */
    public function update_avatar(Request $request)
    {
        dd($request);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        //
    }
}
