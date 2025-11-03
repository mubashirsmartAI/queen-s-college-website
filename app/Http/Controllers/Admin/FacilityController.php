<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::latest()->paginate(10);
        return view('admin.facilities.index', compact('facilities'));
    }
    
    public function create()
    {
        return view('admin.facilities.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'is_active' => 'boolean',
        ]);
        
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('facilities', 'public');
        }
        
        $data['is_active'] = $request->has('is_active');
        
        Facility::create($data);
        
        return redirect()->route('admin.facilities.index')
            ->with('success', 'Facility created successfully!');
    }
    
    public function show(Facility $facility)
    {
        return view('admin.facilities.show', compact('facility'));
    }
    
    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }
    
    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'is_active' => 'boolean',
        ]);
        
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($facility->image) {
                Storage::disk('public')->delete($facility->image);
            }
            $data['image'] = $request->file('image')->store('facilities', 'public');
        }
        
        $data['is_active'] = $request->has('is_active');
        
        $facility->update($data);
        
        return redirect()->route('admin.facilities.index')
            ->with('success', 'Facility updated successfully!');
    }
    
    public function destroy(Facility $facility)
    {
        if ($facility->image) {
            Storage::disk('public')->delete($facility->image);
        }
        
        $facility->delete();
        
        return redirect()->route('admin.facilities.index')
            ->with('success', 'Facility deleted successfully!');
    }
    
    public function toggleStatus(Facility $facility)
    {
        $facility->update(['is_active' => !$facility->is_active]);
        
        $status = $facility->is_active ? 'activated' : 'deactivated';
        
        return redirect()->back()
            ->with('success', "Facility {$status} successfully!");
    }
}
