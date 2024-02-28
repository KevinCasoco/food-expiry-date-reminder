<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_list()
    {
        return view('user.user-list');
    }

    public function admin_user_list()
    {
        return view('admin.admin-user-list');
    }
}
