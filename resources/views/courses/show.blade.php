@extends('layouts.app')

@section('title', $course->title . ' - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', $course->description)

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">{{ $course->title }}</h1>
                <p class="lead">Comprehensive Nursing Education Program</p>
            </div>
        </div>
    </div>
</section>

<!-- Course Details -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body p-5">
                        @if($course->image)
                        <img src="{{ asset($course->image) }}" class="img-fluid rounded mb-4" alt="{{ $course->title }}">
                        @else
                        <img src="{{ asset('images/nursing-student.jpg') }}" class="img-fluid rounded mb-4" alt="{{ $course->title }}">
                        @endif
                        
                        <h2 class="mb-4">Course Overview</h2>
                        <p class="lead">{{ $course->description }}</p>

                        <h3 class="mt-5 mb-3">Course Details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-clock text-primary me-2"></i>Duration</h5>
                                        <p class="card-text">{{ $course->duration }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-dollar-sign text-primary me-2"></i>Fee</h5>
                                        <p class="card-text fw-bold text-success">Rs. {{ number_format($course->fee) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="mt-5 mb-3">Eligibility Requirements</h3>
                        <div class="card bg-light">
                            <div class="card-body">
                                <p>{{ $course->eligibility }}</p>
                            </div>
                        </div>

                        <h3 class="mt-5 mb-3">What You'll Learn</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Fundamental Nursing Principles</li>
                                    <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Patient Care Techniques</li>
                                    <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Medical Terminology</li>
                                    <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Anatomy and Physiology</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Clinical Practice</li>
                                    <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Healthcare Ethics</li>
                                    <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Emergency Care</li>
                                    <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Professional Development</li>
                                </ul>
                            </div>
                        </div>

                        <h3 class="mt-5 mb-3">Career Opportunities</h3>
                        <p>Upon completion of this course, graduates can pursue careers in:</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-hospital text-primary me-2"></i>Hospitals</li>
                                    <li class="mb-2"><i class="fas fa-clinic-medical text-primary me-2"></i>Clinics</li>
                                    <li class="mb-2"><i class="fas fa-home text-primary me-2"></i>Home Healthcare</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-school text-primary me-2"></i>Educational Institutions</li>
                                    <li class="mb-2"><i class="fas fa-ambulance text-primary me-2"></i>Emergency Services</li>
                                    <li class="mb-2"><i class="fas fa-user-md text-primary me-2"></i>Private Practice</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm sticky-top" style="top: 100px;">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4">Apply for This Course</h4>
                        <div class="mb-3">
                            <h5 class="text-primary">Rs. {{ number_format($course->fee) }}</h5>
                            <small class="text-muted">Total Course Fee</small>
                        </div>
                        <div class="mb-3">
                            <h6>Duration: {{ $course->duration }}</h6>
                        </div>
                        <a href="{{ route('admission.index') }}" class="btn btn-primary btn-lg w-100 mb-3">Apply Now</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary w-100">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Courses -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Other Courses</h2>
        <div class="row">
            @php
                $otherCourses = \App\Models\Course::where('is_active', true)->where('id', '!=', $course->id)->take(3)->get();
            @endphp
            @foreach($otherCourses as $otherCourse)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($otherCourse->image)
                    <img src="{{ asset($otherCourse->image) }}" class="card-img-top" alt="{{ $otherCourse->title }}" style="height: 200px; object-fit: cover;">
                    @else
                    <img src="{{ asset('images/nursing-student.jpg') }}" class="card-img-top" alt="{{ $otherCourse->title }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $otherCourse->title }}</h5>
                        <p class="card-text">{{ Str::limit($otherCourse->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-primary">{{ $otherCourse->duration }}</span>
                            <span class="fw-bold text-success">Rs. {{ number_format($otherCourse->fee) }}</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('courses.show', $otherCourse->id) }}" class="btn btn-outline-primary btn-sm">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('courses.index') }}" class="btn btn-primary btn-lg">View All Courses</a>
        </div>
    </div>
</section>
@endsection
