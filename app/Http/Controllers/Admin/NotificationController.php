<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::latest()->paginate(10);
        return view('admin.notifications.index', compact('notifications'));
    }
    
    public function create()
    {
        return view('admin.notifications.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|string|max:255',
            'publish_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:publish_date',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);
        
        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        $data['is_featured'] = $request->has('is_featured');
        
        Notification::create($data);
        
        return redirect()->route('admin.notifications.index')
            ->with('success', 'Notification created successfully!');
    }
    
    public function show(Notification $notification)
    {
        return view('admin.notifications.show', compact('notification'));
    }
    
    public function edit(Notification $notification)
    {
        return view('admin.notifications.edit', compact('notification'));
    }
    
    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|string|max:255',
            'publish_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:publish_date',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);
        
        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        $data['is_featured'] = $request->has('is_featured');
        
        $notification->update($data);
        
        return redirect()->route('admin.notifications.index')
            ->with('success', 'Notification updated successfully!');
    }
    
    public function destroy(Notification $notification)
    {
        $notification->delete();
        
        return redirect()->route('admin.notifications.index')
            ->with('success', 'Notification deleted successfully!');
    }
    
    public function toggleStatus(Notification $notification)
    {
        $notification->update(['is_active' => !$notification->is_active]);
        
        $status = $notification->is_active ? 'activated' : 'deactivated';
        
        return redirect()->back()
            ->with('success', "Notification {$status} successfully!");
    }
    
    public function toggleFeatured(Notification $notification)
    {
        $notification->update(['is_featured' => !$notification->is_featured]);
        
        $status = $notification->is_featured ? 'featured' : 'unfeatured';
        
        return redirect()->back()
            ->with('success', "Notification {$status} successfully!");
    }
}
