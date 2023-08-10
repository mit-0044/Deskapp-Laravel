<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = Role::where('deleted_at', null)->get();
        $permissions = Permission::all();
        return view('roles.index', compact(['permissions', 'roles']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact(['permissions']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Role::where('name', '=', $request->name)->exists()) {
            return redirect()->route('roles.index')->with('error', 'Role already exists');
        } else {
            $role = Role::insertGetId([
                'name' => $request->name,
                'guard_name' => 'auth',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ]);
            $lastInsertedId = $role;
            foreach ($request->permission_id as $val) {
                DB::table('role_has_permissions')->insert([
                    'role_id' => $lastInsertedId,
                    'permission_id' => $val,
                ]);
            }
            $roles = Role::all();
            $permissions = Permission::all();
            $role_has_permissions = DB::table('role_has_permissions')->get();
            return view('roles.index', compact(['permissions', 'roles', 'role_has_permissions']))->with('add', 'Role added successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {

        $permissions = Permission::all();
        $roles = Role::where('id', '=', $role->id)->get();
        $role_has_permissions = DB::table('role_has_permissions')->where('role_id', '=', $role->id)->get();
        return view('roles.show', compact(['roles', 'permissions', 'role_has_permissions']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $roles = Role::where('id', '=', $role->id)->get();
        $role_has_permissions = DB::table('role_has_permissions')->where('role_id', '=', $role->id)->get();
        return view('roles.edit', compact(['roles', 'permissions', 'role_has_permissions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        dd($role);
        $names = DB::table('role_has_permissions')->where('role_id', '=', $role->id)->get();
        if ($request->permission_id == null) {
            Role::where('id', $role->id)->update([
                'name' => $request->name,
                'guard_name' => 'auth',
                'updated_at' => now()->toDateTimeString(),
            ]);
        } else {
            foreach ($request->permission_id as $val) {
                DB::table('role_has_permissions')->updateOrInsert([
                    'role_id' => $role->id,
                    'permission_id' => $val,
                ]);
            }
            Role::where('id', $role->id)->update([
                'name' => $request->name,
                'guard_name' => 'auth',
                'updated_at' => now()->toDateTimeString(),
            ]);
        }
        $roles = Role::all();
        $permissions = Permission::all();
        $role_has_permissions = DB::table('role_has_permissions')->get();
        return view('roles.index', compact(['permissions', 'roles', 'role_has_permissions']))->with('update', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role = Role::where('id', '=', $role->id)->update([
            'deleted_at' => now()->toDateTimeString(),
        ]);
        // $role->delete();

        $permissions = Permission::all();
        $roles = Role::get();
        $role_has_permissions = DB::table('role_has_permissions')->get();
        return to_route('role.index', ['permissions' => $permissions, 'roles' => $roles]);
    }

    /**
     * Display a listing of the deleted permissions.
     */
    public function show_deleted()
    {
        $roles = Role::where('deleted_at', '!=', null)->get();
        return view('roles.deleted', compact(['roles']));

    }

    /**
     * Display a listing of the deleted permissions.
     */
    public function restore_deleted($id)
    {
        Role::where('id', $id)->update([
            'deleted_at' => null,
        ]);
        $roles = Role::where('deleted_at', '!=', null)->get();
        return view('roles.deleted', compact(['roles']))->with('restore', 'Permission restored successfully');
    }
}
