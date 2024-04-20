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
            $countAvailable = Products::where('status', 'available')->count();
            // without quantities
            // $countSnacksCategory = Products::where('categories', 'snacks')->count();
            // $countBiscuitsCategory = Products::where('categories', 'biscuits')->count();
            // $countFrozenCategory = Products::where('categories', 'frozen food')->count();
            // total quantities
            $countSnacksCategory = Products::where('categories', 'snacks')->count();
            $countBiscuitsCategory = Products::where('categories', 'biscuits')->count();
            $countFrozenCategory = Products::where('categories', 'frozen food')->count();
            $countProducts = Products::count();
            $totalUser = User::count();

        return view('dashboard', compact('chart', 'countAdmins', 'countExpired', 'countAvailable', 'countConsumed', 'countProducts', 'countConsumer', 'totalUser', 'countSnacksCategory', 'countBiscuitsCategory', 'countFrozenCategory'));
    }
}
