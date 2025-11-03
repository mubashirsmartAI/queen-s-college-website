<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Notification;
use App\Models\Gallery;
use App\Models\Facility;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::where('is_active', true)->take(6)->get();
        $faculty = Faculty::where('is_active', true)->take(4)->get();
        $notifications = Notification::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('publish_date', 'desc')
            ->take(3)
            ->get();
        $gallery = Gallery::where('is_active', true)
            ->where('category', 'events')
            ->take(6)
            ->get();
        $facilities = Facility::where('is_active', true)->take(6)->get();

        return view('home', compact('courses', 'faculty', 'notifications', 'gallery', 'facilities'));
    }

    public function about()
    {
        return view('about');
    }

    public function principalMessage()
    {
        return view('principal-message');
    }
}
