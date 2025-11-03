@extends('layouts.app')

@section('title', 'Admission - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'Apply for admission to Queen\'s College of Nursing & Allied Health Sciences. Start your journey in healthcare education.')

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
                    url('{{ asset('slider/admission.jpg') }}') center/cover;
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

    .admission-form-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        overflow: hidden;
    }

    .admission-form-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .form-select {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
    }

    .requirements-section {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 4rem 0;
    }

    .requirement-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: none;
        height: 100%;
    }

    .requirement-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .requirement-card .card-body {
        padding: 2rem;
    }

    .requirement-card h5 {
        color: var(--dark-color);
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    .requirement-card i {
        color: var(--primary-color);
        margin-right: 10px;
    }

    .requirement-card .list-unstyled li {
        color: #6c757d;
        margin-bottom: 0.5rem;
    }

    .requirement-card .list-unstyled li i {
        color: #28a745;
    }

    .courses-section {
        padding: 4rem 0;
    }

    .course-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: none;
        height: 100%;
    }

    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
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

    .badge {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border: none;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 500;
    }

    .btn-outline-primary {
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        border-radius: 10px;
        padding: 8px 20px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
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
                <h1>Admission</h1>
                <p class="lead">Start Your Journey in Nursing and Healthcare Education</p>
                <p>Join Queen's College of Nursing & Allied Health Sciences and become part of Pakistan's premier healthcare education institution. Apply now for our accredited programs.</p>
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

<!-- Admission Form -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Admission Application</h2>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="admission-form-card">
                    <div class="card-body p-5">
                        <h3 class="mb-4 text-center">Admission Application Form</h3>
                        <p class="text-center text-muted mb-5">Fill out the form below to apply for admission to Queen's College</p>
                        
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        <form action="{{ route('admission.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number *</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="course" class="form-label">Course of Interest *</label>
                                    <select class="form-select @error('course') is-invalid @enderror" id="course" name="course" required>
                                        <option value="">Select a course</option>
                                        @foreach($courses as $course)
                                        <option value="{{ $course->title }}" {{ old('course') == $course->title ? 'selected' : '' }}>{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('course')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Additional Information</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4" placeholder="Tell us about your background, interests, or any questions you have...">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">Submit Application</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Admission Requirements -->
<section class="requirements-section">
    <div class="container">
        <h2 class="section-title">Admission Requirements</h2>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="requirement-card">
                            <div class="card-body">
                                <h5><i class="fas fa-graduation-cap"></i>Educational Requirements</h5>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check"></i>Matriculation (10th Grade)</li>
                                    <li><i class="fas fa-check"></i>Intermediate (12th Grade)</li>
                                    <li><i class="fas fa-check"></i>Minimum 50% marks</li>
                                    <li><i class="fas fa-check"></i>Science subjects preferred</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="requirement-card">
                            <div class="card-body">
                                <h5><i class="fas fa-file-alt"></i>Required Documents</h5>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check"></i>Educational Certificates</li>
                                    <li><i class="fas fa-check"></i>CNIC/B-Form</li>
                                    <li><i class="fas fa-check"></i>Passport Size Photos</li>
                                    <li><i class="fas fa-check"></i>Medical Certificate</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Available Courses -->
<section class="courses-section">
    <div class="container">
        <h2 class="section-title">Available Courses</h2>
        <div class="row">
            @foreach($courses as $course)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="course-card">
                    <div class="card-body">
                        <h5>{{ $course->title }}</h5>
                        <p>{{ Str::limit($course->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge">{{ $course->duration }}</span>
                            <span class="fw-bold text-success">Rs. {{ number_format($course->fee) }}</span>
                        </div>
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-primary btn-sm">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-4">Need Help with Admission?</h2>
                <p class="lead">Our admission team is here to help you with the application process.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Contact Us</a>
            </div>
        </div>
    </div>
</section>
@endsection
