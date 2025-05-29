<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Department;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::all();
        
        $query = Letter::with('department')
            ->when($request->department, function ($query, $department) {
                return $query->where('department_id', $department);
            })
            ->orderBy('date', 'desc');

        $letters = $query->paginate(10);

        return view('report', compact('letters', 'departments'));
    }

} 