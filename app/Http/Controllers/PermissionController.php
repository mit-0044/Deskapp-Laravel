<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::where('deleted_at', null)->get();
        $role_has_permissions = DB::table('role_has_permissions')->get();
        return view('permissions.index', compact(['permissions', 'role_has_permissions']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        $permissions = Permission::where('id', $permission->id)->get();
        return view('permissions.edit', compact(['permissions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        Permission::where('id', '=', $permission->id)->update([
            'name' => $request->name,
        ]);
        $permissions = Permission::all();
        $role_has_permissions = DB::table('role_has_permissions')->get();
        return redirect(route('permission.index', ['role_has_permissions' => $role_has_permissions, 'permissions' => $permissions]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        Permission::where('id', $permission->id)->update([
            'deleted_at' => now()->toDateTimeString(),
        ]);
        $permissions = Permission::where('deleted_at', null)->get();
        $role_has_permissions = DB::table('role_has_permissions')->get();
        return view('permissions.index', compact(['permissions', 'role_has_permissions']))->with('delete', 'Permission is deleted');
    }

    /**
     * Display a listing of the deleted permissions.
     */
    public function show_deleted()
    {
        $permissions = Permission::where('deleted_at', '!=', null)->get();
        return view('permissions.deleted', compact(['permissions']));

    }

    /**
     * Display a listing of the deleted permissions.
     */
    public function restore_deleted($id)
    {
        Permission::where('id', $id)->update([
            'deleted_at' => null,
        ]);
        $permissions = Permission::where('deleted_at', '!=', null)->get();
        return view('permissions.deleted', compact(['permissions']))->with('restore', 'Permission restored successfully');
    }

}