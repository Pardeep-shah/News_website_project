<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // You can add logic here to fetch user-specific data for the dashboard
        return view('dashboard.dashboard');
    }
}
