<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Gallery;
use App\Models\Notification;
use App\Models\Facility;
use App\Models\Admission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get statistics
        $stats = [
            'courses' => Course::count(),
            'faculty' => Faculty::count(),
            'gallery' => Gallery::count(),
            'admissions' => Admission::count(),
            'active_courses' => Course::where('is_active', true)->count(),
            'featured_notifications' => Notification::where('is_featured', true)->count(),
            'pending_admissions' => Admission::where('status', 'pending')->count(),
        ];
        
        // Get recent activity (last 10 items)
        $recentActivity = collect();
        
        // Recent courses
        $recentCourses = Course::latest()->take(3)->get();
        foreach ($recentCourses as $course) {
            $recentActivity->push([
                'type' => 'course',
                'title' => $course->title,
                'status' => $course->is_active ? 'active' : 'inactive',
                'date' => $course->created_at->format('M d, Y'),
                'edit_url' => route('admin.courses.edit', $course->id),
            ]);
        }
        
        // Recent faculty
        $recentFaculty = Faculty::latest()->take(3)->get();
        foreach ($recentFaculty as $faculty) {
            $recentActivity->push([
                'type' => 'faculty',
                'title' => $faculty->name,
                'status' => $faculty->is_active ? 'active' : 'inactive',
                'date' => $faculty->created_at->format('M d, Y'),
                'edit_url' => route('admin.faculty.edit', $faculty->id),
            ]);
        }
        
        // Recent gallery
        $recentGallery = Gallery::latest()->take(3)->get();
        foreach ($recentGallery as $gallery) {
            $recentActivity->push([
                'type' => 'gallery',
                'title' => $gallery->title,
                'status' => $gallery->is_active ? 'active' : 'inactive',
                'date' => $gallery->created_at->format('M d, Y'),
                'edit_url' => route('admin.gallery.edit', $gallery->id),
            ]);
        }
        
        // Recent facilities
        $recentFacilities = Facility::latest()->take(3)->get();
        foreach ($recentFacilities as $facility) {
            $recentActivity->push([
                'type' => 'facility',
                'title' => $facility->name,
                'status' => $facility->is_active ? 'active' : 'inactive',
                'date' => $facility->created_at->format('M d, Y'),
                'edit_url' => route('admin.facilities.edit', $facility->id),
            ]);
        }
        
        // Recent notifications
        $recentNotifications = Notification::latest()->take(3)->get();
        foreach ($recentNotifications as $notification) {
            $recentActivity->push([
                'type' => 'notification',
                'title' => $notification->title,
                'status' => $notification->is_active ? 'active' : 'inactive',
                'date' => $notification->created_at->format('M d, Y'),
                'edit_url' => route('admin.notifications.edit', $notification->id),
            ]);
        }
        
        // Sort by date and take 10 most recent
        $recentActivity = $recentActivity->sortByDesc('date')->take(10);
        
        // Get recent admissions
        $recentAdmissions = Admission::latest()->take(10)->get();
        
        return view('admin.dashboard', compact('stats', 'recentActivity', 'recentAdmissions'));
    }
}
