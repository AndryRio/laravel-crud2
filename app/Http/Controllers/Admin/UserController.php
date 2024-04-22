<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function addAdminRoleToUser(){
        $user=User::find(1);
        $role = Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        dd($user);
    }

    public function addUserRoleToUser(){

    }

    public function upgradeUserToAdminRole(){

    }

    public function deleteRoleToUser(){

    }
}
