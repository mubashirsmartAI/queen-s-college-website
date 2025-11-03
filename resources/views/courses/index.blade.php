@extends('layouts.app')

@section('title', 'Courses - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'Explore our comprehensive nursing and allied health sciences courses at Queen\'s College.')

@section('content')
<style>
    :root {
        --primary-color: #dc3545;
        --secondary-color: #0d6efd;
        --dark-color: #212529;
        --light-bg: #f8f9fa;
    }

    .hero-section {
        background: linear-gradient(135deg, rgba(220, 53, 69, 0.2), rgba(13, 110, 253, 0.2)),
                    url('{{ asset('slider/courses.jpg') }}') center/cover;
        height: 70vh;
        display: flex;
        align-items: center;
        color: white;
        position: relative;
    }

    .hero-content h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .hero-content p {
        font-size: 1.3rem;
        margin-bottom: 30px;
    }

    .hero-features {
        margin: 30px 0;
    }

    .feature-item {
        display: flex;
        align-items: center;
        color: white;
        margin-bottom: 15px;
        font-weight: 500;
    }

    .feature-item i {
        font-size: 24px;
        margin-right: 10px;
        color: #ffd700;
    }

    .feature-item span {
        font-size: 16px;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 3rem;
        text-align: center;
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 2px;
    }

    .course-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        overflow: hidden;
        height: 100%;
    }

    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .course-card img {
        transition: transform 0.3s ease;
    }

    .course-card:hover img {
        transform: scale(1.05);
    }

    .course-card .card-body {
        padding: 2rem;
    }

    .course-card h5 {
        color: var(--dark-color);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .course-card p {
        color: #6c757d;
        margin-bottom: 1.5rem;
    }

    .course-card .row {
        margin-bottom: 1rem;
    }

    .course-card .text-muted {
        font-size: 0.9rem;
        font-weight: 500;
        color: #6c757d !important;
    }

    .course-card .fw-bold {
        color: var(--dark-color);
        font-weight: 600;
    }

    .course-card .text-success {
        color: #28a745 !important;
        font-weight: 600;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
    }

    .cta-section {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 4rem 0;
    }

    .btn-light {
        background: white;
        color: var(--primary-color);
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-light:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255,255,255,0.3);
        color: var(--primary-color);
    }

    .no-courses {
        text-align: center;
        padding: 4rem 0;
    }

    .no-courses i {
        color: var(--primary-color);
        margin-bottom: 2rem;
    }

    .no-courses h3 {
        color: var(--dark-color);
        margin-bottom: 1rem;
    }

    .no-courses p {
        color: #6c757d;
    }

    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 2rem;
        }
        
        .hero-content p {
            font-size: 1.1rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 hero-content">
                <h1>Our Courses</h1>
                <p class="lead">Comprehensive Nursing and Allied Health Sciences Programs</p>
                <p>Explore our accredited programs designed to prepare you for a successful career in healthcare. Our courses combine theoretical knowledge with practical training to ensure you're ready for the challenges of modern healthcare.</p>
                <div class="hero-features mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-graduation-cap"></i>
                                <span>Accredited Programs</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-user-md"></i>
                                <span>Expert Faculty</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-hospital"></i>
                                <span>Clinical Training</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Courses Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Available Courses</h2>
        @if($courses->count() > 0)
        <div class="row">
            @foreach($courses as $course)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="course-card">
                    @if($course->image)
                    <img src="{{ asset($course->image) }}" class="card-img-top" alt="{{ $course->title }}" style="height: 200px; object-fit: cover;">
                    @else
                    <img src="{{ asset('images/nursing-student.jpg') }}" class="card-img-top" alt="{{ $course->title }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5>{{ $course->title }}</h5>
                        <p>{{ Str::limit($course->description, 120) }}</p>
                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted">Duration</small>
                                <div class="fw-bold">{{ $course->duration }}</div>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Fee</small>
                                <div class="fw-bold text-success">Rs. {{ number_format($course->fee) }}</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Eligibility</small>
                            <div class="small">{{ $course->eligibility }}</div>
                        </div>
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary btn-sm w-100">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="no-courses">
            <i class="fas fa-graduation-cap fa-5x"></i>
            <h3>No Courses Available</h3>
            <p>Please check back later for course information.</p>
        </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-4">Ready to Apply?</h2>
                <p class="lead">Start your journey in nursing and healthcare with Queen's College.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admission.index') }}" class="btn btn-light btn-lg">Apply Now</a>
            </div>
        </div>
    </div>
</section>
@endsection
