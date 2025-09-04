<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.pages.home');
    }
}
