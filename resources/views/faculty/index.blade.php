@extends('layouts.app')

@section('title', 'Faculty - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'Meet our experienced and qualified faculty members at Queen\'s College of Nursing & Allied Health Sciences.')

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
                    url('{{ asset('slider/faculty.jpg') }}') center/cover;
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

    .faculty-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        overflow: hidden;
        height: 100%;
    }

    .faculty-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .faculty-card .card-body {
        padding: 2rem;
        text-align: center;
    }

    .faculty-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 1.5rem;
        border: 4px solid var(--primary-color);
        transition: transform 0.3s ease;
    }

    .faculty-card:hover .faculty-image {
        transform: scale(1.05);
    }

    .faculty-placeholder {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        margin: 0 auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 4px solid var(--primary-color);
    }

    .faculty-placeholder i {
        font-size: 3rem;
        color: white;
    }

    .faculty-card h5 {
        color: var(--dark-color);
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .faculty-card .designation {
        color: var(--primary-color);
        font-weight: 500;
        margin-bottom: 1rem;
    }

    .faculty-card .specialization {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }

    .faculty-card .qualification,
    .faculty-card .experience {
        margin-bottom: 1rem;
    }

    .faculty-card .qualification h6,
    .faculty-card .experience h6 {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .faculty-card .qualification p,
    .faculty-card .experience p {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 0;
    }

    .btn-outline-primary {
        border-color: var(--primary-color);
        color: var(--primary-color);
        border-radius: 10px;
        padding: 8px 16px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
        transform: translateY(-2px);
    }

    .btn-outline-success {
        border-color: #28a745;
        color: #28a745;
        border-radius: 10px;
        padding: 8px 16px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-outline-success:hover {
        background: #28a745;
        border-color: #28a745;
        transform: translateY(-2px);
    }

    .stats-section {
        background: linear-gradient(135deg, var(--light-bg), #e9ecef);
        padding: 4rem 0;
    }

    .stat-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .stat-card .card-body {
        padding: 2rem;
        text-align: center;
    }

    .stat-card i {
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .stat-card h3 {
        color: var(--dark-color);
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .stat-card p {
        color: #6c757d;
        margin-bottom: 0;
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

    .no-faculty {
        text-align: center;
        padding: 4rem 0;
    }

    .no-faculty i {
        color: var(--primary-color);
        margin-bottom: 2rem;
    }

    .no-faculty h3 {
        color: var(--dark-color);
        margin-bottom: 1rem;
    }

    .no-faculty p {
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
                <h1>Our Faculty</h1>
                <p class="lead">Experienced and Qualified Healthcare Professionals</p>
                <p>Meet our dedicated team of nursing educators and healthcare professionals who bring years of clinical experience and academic excellence to Queen's College. Our faculty is committed to providing the highest quality education and mentorship.</p>
                <div class="hero-features mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-graduation-cap"></i>
                                <span>Expert Educators</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-user-md"></i>
                                <span>Clinical Experience</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-award"></i>
                                <span>Professional Excellence</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Faculty Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Our Faculty Members</h2>
        @if($faculty->count() > 0)
        <div class="row">
            @foreach($faculty as $member)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="faculty-card">
                    <div class="card-body">
                        @if($member->image)
                        <img src="{{ asset('storage/' . $member->image) }}" class="faculty-image" alt="{{ $member->name }}">
                        @else
                        <div class="faculty-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                        @endif
                        <h5>{{ $member->name }}</h5>
                        <p class="designation">{{ $member->designation }}</p>
                        <p class="specialization">{{ $member->specialization }}</p>
                        
                        <div class="qualification">
                            <h6>Qualifications</h6>
                            <p>{{ $member->qualification }}</p>
                        </div>
                        
                        <div class="experience">
                            <h6>Experience</h6>
                            <p>{{ $member->experience }}</p>
                        </div>
                        
                        @if($member->email || $member->phone)
                        <div class="mt-3">
                            @if($member->email)
                            <a href="mailto:{{ $member->email }}" class="btn btn-outline-primary btn-sm me-2">
                                <i class="fas fa-envelope me-1"></i>Email
                            </a>
                            @endif
                            @if($member->phone)
                            <a href="tel:{{ $member->phone }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-phone me-1"></i>Call
                            </a>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="no-faculty">
            <i class="fas fa-users fa-5x"></i>
            <h3>Faculty Information Coming Soon</h3>
            <p>We are updating our faculty information. Please check back later.</p>
        </div>
        @endif
    </div>
</section>

<!-- Faculty Statistics -->
<section class="stats-section">
    <div class="container">
        <h2 class="section-title">Faculty Excellence</h2>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card">
                    <div class="card-body">
                        <i class="fas fa-graduation-cap fa-3x"></i>
                        <h3>50+</h3>
                        <p>Expert Faculty</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card">
                    <div class="card-body">
                        <i class="fas fa-award fa-3x"></i>
                        <h3>15+</h3>
                        <p>Years Experience</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card">
                    <div class="card-body">
                        <i class="fas fa-certificate fa-3x"></i>
                        <h3>100%</h3>
                        <p>Qualified Staff</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card">
                    <div class="card-body">
                        <i class="fas fa-heart fa-3x"></i>
                        <h3>95%</h3>
                        <p>Student Satisfaction</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-4">Learn from the Best</h2>
                <p class="lead">Our experienced faculty is dedicated to your success in nursing and healthcare.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admission.index') }}" class="btn btn-light btn-lg">Apply Now</a>
            </div>
        </div>
    </div>
</section>
@endsection
