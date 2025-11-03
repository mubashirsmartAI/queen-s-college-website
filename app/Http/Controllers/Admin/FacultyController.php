<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacultyController extends Controller
{
    public function index()
    {
        $faculty = Faculty::latest()->paginate(10);
        return view('admin.faculty.index', compact('faculty'));
    }
    
    public function create()
    {
        return view('admin.faculty.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'qualification' => 'required|string',
            'experience' => 'required|string',
            'specialization' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_active' => 'boolean',
        ]);
        
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('faculty', 'public');
        }
        
        $data['is_active'] = $request->has('is_active');
        
        Faculty::create($data);
        
        return redirect()->route('admin.faculty.index')
            ->with('success', 'Faculty member created successfully!');
    }
    
    public function show(Faculty $faculty)
    {
        return view('admin.faculty.show', compact('faculty'));
    }
    
    public function edit(Faculty $faculty)
    {
        return view('admin.faculty.edit', compact('faculty'));
    }
    
    public function update(Request $request, Faculty $faculty)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'qualification' => 'required|string',
            'experience' => 'required|string',
            'specialization' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_active' => 'boolean',
        ]);
        
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($faculty->image) {
                Storage::disk('public')->delete($faculty->image);
            }
            $data['image'] = $request->file('image')->store('faculty', 'public');
        }
        
        $data['is_active'] = $request->has('is_active');
        
        $faculty->update($data);
        
        return redirect()->route('admin.faculty.index')
            ->with('success', 'Faculty member updated successfully!');
    }
    
    public function destroy(Faculty $faculty)
    {
        if ($faculty->image) {
            Storage::disk('public')->delete($faculty->image);
        }
        
        $faculty->delete();
        
        return redirect()->route('admin.faculty.index')
            ->with('success', 'Faculty member deleted successfully!');
    }
    
    public function toggleStatus(Faculty $faculty)
    {
        $faculty->update(['is_active' => !$faculty->is_active]);
        
        $status = $faculty->is_active ? 'activated' : 'deactivated';
        
        return redirect()->back()
            ->with('success', "Faculty member {$status} successfully!");
    }
}
