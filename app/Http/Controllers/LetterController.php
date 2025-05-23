<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Department;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    public function index (Request $request) {
        $departments = Department::all();

        $query = Letter::with('department');

        if ($request->filled('item_filter')) {
            $query->where('title', 'like', '%' . $request->item_filter . '%');
        }

        if ($request->filled('department_filter')) {
            $query->whereHas('department', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->department_filter . '%');
            });
        }

        if ($request->filled('year_filter')) {
            $query->whereYear('date', $request->year_filter);
        }

        $letters = $query->get();

        return view('history', compact('departments', 'letters'));
    }
    
    public function store (Request $request) {
        $validated = $request->validate([
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'document_type' => 'required|string|max:255',
        ]);

        Letter::create($validated);

        return redirect()->back()->with('success', 'Document has been saved!');
    }

    public function create() {
        $departments =  Department::all();
        return view('letter', compact('departments'));
    }

    public function edit($id) {
        $letter = Letter::findOrFail($id);
        $departments = Department::all();

        return view('editDoc', compact('letter', 'departments'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'document_type' => 'required|string|max:255',
        ]);

        $letter = Letter::findOrFail($id);
        $letter->update($validated);

        return redirect()->back()->with('success', 'Document updated successfully!');
    }

    public function destroy($id) {
        $letter = Letter::findOrFail($id);
        $letter->delete();

        return redirect()->back()->with('success', 'Document deleted successfully!');
    }
}
