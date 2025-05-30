<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\User;
use App\Models\Department;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::with(['letter', 'userTo', 'departmentTo', 'userFrom', 'departmentFrom'])->get();
        return view('tracks.index', compact('tracks'));
    }

    public function show(Letter $letter)
    {
        $tracks = Track::with(['userTo', 'departmentTo', 'userFrom', 'departmentFrom'])
            ->where('letter_id', $letter->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('tracks.show', compact('letter', 'tracks'));
    }

    public function create($letterId)
    {
        $letter = Letter::with('department')->findOrFail($letterId);
        $users = User::all();
        $departments = Department::all();

        return view('track', compact('letter', 'users', 'departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'letter_id' => 'required|exists:letters,id',
            'user_id_from' => 'required|exists:users,id',
            'department_id_from' => 'required|exists:departments,id',
            'user_id_to' => 'required|exists:users,id',
            'department_id_to' => 'required|exists:departments,id',
        ]);

        // Create tracking record
        Track::create($validated);

        // Get the user's name who will receive the document
        $userTo = User::findOrFail($validated['user_id_to']);

        // Update the letter with current holder information
        $letter = Letter::findOrFail($validated['letter_id']);
        $letter->update([
            'to' => $userTo->name,
            'department_id' => $validated['department_id_to']
        ]);

        return redirect()->route('history')->with('success', 'Document has been tracked successfully!');
    }
}