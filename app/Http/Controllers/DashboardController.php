<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function countUsersByRole()
    {
            $chart = User::all();

            $countAdmins = User::where('role', 'admin')->count();
            $countConsumer = User::where('role', 'consumer')->count();
            $countExpired = Products::where('status', 'expired')->count();
            $countConsumed = Products::where('status', 'consumed')->count();
            $countProducts = Products::count();
            $totalUser = User::count();

        return view('dashboard', compact('chart', 'countAdmins', 'countExpired', 'countConsumed', 'countProducts', 'countConsumer', 'totalUser'));
    }
}
