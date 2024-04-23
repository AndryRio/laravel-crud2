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
        //$role = Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        dd($user);
    }

    public function addUserRoleToUser(){
        $user=User::find(2);
        //$role = Role::create(['name' => 'user']);
        $user->assignRole('user');
        dd($user);
    }

    public function upgradeUserToAdminRole(){
        $user=User::find(2);
        $user->assignRole('admin');
        dd($user);
    }

    public function deleteRoleToUser(){
        $user=User::find(2);
        $user->removeRole(['admin', 'user']);
        dd($user);
    }
}
