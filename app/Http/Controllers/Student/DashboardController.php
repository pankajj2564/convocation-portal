<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class DashboardController extends Controller
{
    // 1. Show Student Dashboard & Profile
    public function index(Request $request)
    {
        $studentId = session('student_id');
        if (!$studentId) {
            return redirect()->route('student.login')->with('error', 'Please login first.');
        }

        $student = Student::findOrFail($studentId);
        return view('student.dashboard', compact('student'));
    }

    // 2. Update Student Profile Details
    /*public function updateProfile(Request $request)
    {
        $studentId = session('student_id');
        if (!$studentId) {
            return redirect()->route('student.login')->with('error', 'Session expired. Please login again.');
        }

        $student = Student::findOrFail($studentId);

        $request->validate([
            'name' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'branch' => 'required|string|max:255',
            'passing_year' => 'required|string|max:4',
        ]);

        // Details update karein aur profile_completed ko true kar dein
        $student->update([
            'name' => $request->name,
            'degree' => $request->degree,
            'branch' => $request->branch,
            'passing_year' => $request->passing_year,
            'profile_completed' => true, 
        ]);

        return redirect()->route('student.dashboard')->with('success', 'Profile updated successfully! Now you can proceed to payment.');
    } */
    public function updateProfile(Request $request)
    {
        $studentId = session('student_id');
        if (!$studentId) {
            return redirect()->route('student.login')->with('error', 'Session expired. Please login again.');
        }

        $student = Student::findOrFail($studentId);

        // Validation hata kar direct update kar rahe hain taaki agar passing year ya koi field mismatch ho toh bhi update ho jaye
        $student->name = $request->input('name');
        $student->degree = $request->input('degree');
        $student->branch = $request->input('branch');
        $student->passing_year = $request->input('passing_year');
        $student->profile_completed = 1; // Yahan direct 1 set kar diya hai
        $student->save();

        return redirect()->route('student.dashboard')->with('success', 'Profile updated successfully! Now you can proceed to payment.');
    }
}
