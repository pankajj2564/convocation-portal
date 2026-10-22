<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    // Dashboard & Students List (Accessible by Admin & Staff with Filters)
    public function index(Request $request)
    {
        $query = Student::query();

        // Filters
        if ($request->filled('degree')) {
            $query->where('degree', $request->degree);
        }
        if ($request->filled('branch')) {
            $query->where('branch', $request->branch);
        }
        if ($request->filled('status')) {
            $query->where('is_registered', $request->status == 'registered' ? 1 : 0);
        }

        $students = $query->paginate(10);
        return view('admin.dashboard', compact('students'));
    }

    // Add Student Manually (Only Admin)
    public function storeStudent(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'roll_no' => 'required|unique:students,roll_no',
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|unique:students,phone',
        ]);

        Student::create($request->all());
        return redirect()->back()->with('success', 'Student added successfully!');
    }

    // Delete Student (Only Admin)
    public function destroyStudent($id)
    {
        $this->authorizeAdmin();
        Student::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Student deleted successfully!');
    }

    // Manage Staff/Other Users (Only Admin can add/delete staff)
    public function manageUsers()
    {
        $this->authorizeAdmin();
        $users = User::role('Staff')->get();
        return view('admin.manage-users', compact('users'));
    }

    public function storeUser(Request $request)
    {
        $this->authorizeAdmin();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->assignRole('Staff');

        return redirect()->back()->with('success', 'Staff user created successfully!');
    }

    public function destroyUser($id)
    {
        $this->authorizeAdmin();
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Staff user deleted successfully!');
    }

    private function authorizeAdmin()
    {
        if (!auth()->user()->hasRole('Admin')) {
            abort(403, 'Unauthorized action. Only Admin can perform this task.');
        }
    }

    public function transactions()
    {
        $this->authorizeAdmin();
        $payments = \App\Models\Payment::with('student')->latest()->paginate(15);
        return view('admin.transactions', compact('payments'));
    }
}
