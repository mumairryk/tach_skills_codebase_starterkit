<?php
namespace App\Repository;


use App\Models\Role;

class UserRepository
{
    public function roles()
    {
        return Role::all()->pluck('name','id');
    }
}
