<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Department;

class StaffController extends Controller
{
    public function index() {
        $users = User::with('department')->get();

        return view('staff', compact('users'));
    }

    public function store (Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'password' => 'required|string|min:8',
        ]);
    
        // Create a new staff record
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'department_id' => $validated['department_id'],
        ]);
    
        // Redirect or return a response
        return redirect()->back()->with('success', 'Staff created successfully.');
    }

    public function create() {
        $departments = Department::all(); // Fetch departments
        return view('staffAdd', compact('departments'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        $departments = Department::all();

        return view('editUser', compact('user', 'departments'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string',
            'department_id' => 'required|exists:departments,id',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->back()->with('success', 'User data updated successfully!');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }

}
