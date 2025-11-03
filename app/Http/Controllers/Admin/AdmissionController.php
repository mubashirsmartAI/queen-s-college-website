<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Course;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $admissions = Admission::latest()->paginate(10);
        return view('admin.admissions.index', compact('admissions'));
    }
    
    public function show(Admission $admission)
    {
        return view('admin.admissions.show', compact('admission'));
    }
    
    public function edit(Admission $admission)
    {
        $courses = Course::where('is_active', true)->get();
        return view('admin.admissions.edit', compact('admission', 'courses'));
    }
    
    public function update(Request $request, Admission $admission)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'course' => 'required|string|max:255',
            'message' => 'nullable|string',
            'status' => 'required|in:pending,approved,rejected',
        ]);
        
        $admission->update($request->all());
        
        return redirect()->route('admin.admissions.index')
            ->with('success', 'Admission application updated successfully!');
    }
    
    public function destroy(Admission $admission)
    {
        $admission->delete();
        
        return redirect()->route('admin.admissions.index')
            ->with('success', 'Admission application deleted successfully!');
    }
    
    public function approve(Admission $admission)
    {
        $admission->update(['status' => 'approved']);
        
        return redirect()->back()
            ->with('success', 'Admission application approved successfully!');
    }
    
    public function reject(Admission $admission)
    {
        $admission->update(['status' => 'rejected']);
        
        return redirect()->back()
            ->with('success', 'Admission application rejected successfully!');
    }
    
    public function pending(Admission $admission)
    {
        $admission->update(['status' => 'pending']);
        
        return redirect()->back()
            ->with('success', 'Admission application status set to pending!');
    }
}
