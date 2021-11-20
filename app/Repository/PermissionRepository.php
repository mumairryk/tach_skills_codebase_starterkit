<?php
namespace App\Repository;


use App\Models\Role;

class PermissionRepository
{
    public function roles()
    {
        return Role::all()->pluck('name','id');
    }
}

