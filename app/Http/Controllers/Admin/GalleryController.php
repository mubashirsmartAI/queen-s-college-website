<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('admin.gallery.index', compact('galleries'));
    }
    
    public function create()
    {
        return view('admin.gallery.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'category' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);
        
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }
        
        $data['is_active'] = $request->has('is_active');
        
        Gallery::create($data);
        
        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item created successfully!');
    }
    
    public function show(Gallery $gallery)
    {
        return view('admin.gallery.show', compact('gallery'));
    }
    
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }
    
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'category' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);
        
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }
        
        $data['is_active'] = $request->has('is_active');
        
        $gallery->update($data);
        
        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item updated successfully!');
    }
    
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        
        $gallery->delete();
        
        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item deleted successfully!');
    }
    
    public function toggleStatus(Gallery $gallery)
    {
        $gallery->update(['is_active' => !$gallery->is_active]);
        
        $status = $gallery->is_active ? 'activated' : 'deactivated';
        
        return redirect()->back()
            ->with('success', "Gallery item {$status} successfully!");
    }
}
