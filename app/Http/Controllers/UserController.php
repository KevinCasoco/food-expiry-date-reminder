<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_list()
    {
        return view('user.user-list');
    }

    public function admin_user_list()
    {
        $data = User::paginate(10); // Paginate with 10 items per page

        return view('admin.admin-user-list', compact('data'));
    }
}
