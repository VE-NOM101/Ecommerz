<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function createAdmin()
    {
        $user         =  new User();
        $user->name   =  'Admin';
        $user->email   =  'admin@gmail.com';
        $user->password = Hash::make('1234');
        $user->save();

        $admin = Role::where('slug', 'admin')->first();

        $user->roles()->attach($admin);
    }
}
