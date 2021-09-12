<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * show admin login form
     */
    public function showAdminLoginForm()
    {
        return view('admin.login');
    }

    /**
     * show admin register form
     */
    public function showAdminRegisterForm()
    {
        return view('admin.register');
    }

    /**
     * show admin dashboard page
     */
    public function showAdminDashboard()
    {
        return view('admin.dashboard');
    }
}
