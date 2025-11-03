<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::where('is_active', true)
                             ->orderBy('created_at', 'desc')
                             ->get();
        return view('facilities', compact('facilities'));
    }

    public function show($id)
    {
        $facility = Facility::findOrFail($id);
        return view('facility.show', compact('facility'));
    }
}

