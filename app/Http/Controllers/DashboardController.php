<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Models\Letter;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::with('department')->get();
        $letters = Letter::with('department')->get();
        return view('dashboard', compact('users', 'letters'));
    }

}
