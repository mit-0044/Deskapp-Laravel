<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;

trait HasPermission
{

    //Get Permissions
    public function getAllPermissions($permission)
    {
        return Permission::whereIn('name', $permission)->get();
    }

    //Check Has Permissions
    public function HasPermission($permission)
    {
        return (bool) $this->permisssions->where('name', $permission->name)->get();
    }

    //check users has permissions through role
    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    //give permissions
    public function givePermissionTo(...$permission)
    {
        $permissions =  $this->getAllPermissions($permission);
        if ($permissions == null) {
            return $this;
        }
        $this->permissions()->saveMany($permission);
        return $this;
    }

    //Check User has roles
    public function HasRole(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }

    //check users has permissions through role
    public function hasPermissionThroughRole($permissions)
    {
        foreach ($permissions->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }




    /**
     * The roles that belong to the HasPermission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'model_has_permissions');
    }

    /**
     * The roles that belong to the HasPermission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles');
    }
}
