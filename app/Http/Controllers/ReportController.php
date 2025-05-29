<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Department;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function downloadPdf()
    {
        $letters = Letter::with('department')
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy('department.name');

        $pdf = PDF::loadView('pdf.report', compact('letters'));
        
        return $pdf->download('document-report.pdf');
    }
} 