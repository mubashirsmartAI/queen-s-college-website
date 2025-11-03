<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\Course;

class AdmissionController extends Controller
{
    public function index()
    {
        $courses = Course::where('is_active', true)->get();
        return view('admission.index', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'course' => 'required|string|max:255',
            'message' => 'nullable|string'
        ]);

        Admission::create($request->all());

        return redirect()->back()->with('success', 'Your admission application has been submitted successfully!');
    }
}
