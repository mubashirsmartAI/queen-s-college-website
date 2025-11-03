<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }
    
    public function create()
    {
        return view('admin.courses.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string|max:255',
            'fee' => 'required|numeric|min:0',
            'eligibility' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_active' => 'boolean',
        ]);
        
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses', 'public');
        }
        
        $data['is_active'] = $request->has('is_active');
        
        Course::create($data);
        
        return redirect()->route('admin.courses.index')
            ->with('success', 'Course created successfully!');
    }
    
    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }
    
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }
    
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string|max:255',
            'fee' => 'required|numeric|min:0',
            'eligibility' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_active' => 'boolean',
        ]);
        
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $data['image'] = $request->file('image')->store('courses', 'public');
        }
        
        $data['is_active'] = $request->has('is_active');
        
        $course->update($data);
        
        return redirect()->route('admin.courses.index')
            ->with('success', 'Course updated successfully!');
    }
    
    public function destroy(Course $course)
    {
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }
        
        $course->delete();
        
        return redirect()->route('admin.courses.index')
            ->with('success', 'Course deleted successfully!');
    }
    
    public function toggleStatus(Course $course)
    {
        $course->update(['is_active' => !$course->is_active]);
        
        $status = $course->is_active ? 'activated' : 'deactivated';
        
        return redirect()->back()
            ->with('success', "Course {$status} successfully!");
    }
}
