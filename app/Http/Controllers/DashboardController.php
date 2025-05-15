<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Count letters per department
        $departments = Department::withCount('letter')->get();

        // List of staff
        $staff = User::all();

        return view('dashboard', compact('departments', 'staff'));
    }

}
