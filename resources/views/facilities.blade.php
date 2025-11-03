@extends('layouts.app')

@section('title', 'Facilities - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'Explore our state-of-the-art facilities at Queen\'s College of Nursing & Allied Health Sciences.')

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
                    url('{{ asset('slider/slide1.jpg') }}') center/cover;
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

    .facility-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        overflow: hidden;
        height: 100%;
    }

    .facility-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .facility-card .card-body {
        padding: 2rem;
        text-align: center;
    }

    .facility-card i {
        color: var(--primary-color);
        margin-bottom: 1.5rem;
        transition: transform 0.3s ease;
    }

    .facility-card:hover i {
        transform: scale(1.1);
    }

    .facility-card h5 {
        color: var(--dark-color);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .facility-card p {
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
                <h1>Our Facilities</h1>
                <p class="lead">State-of-the-Art Infrastructure for Quality Education</p>
                <p>Queen's College of Nursing & Allied Health Sciences is equipped with modern facilities and cutting-edge technology to provide students with the best possible learning environment. Our infrastructure supports both theoretical knowledge and practical training.</p>
                <div class="hero-features mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-building"></i>
                                <span>Modern Infrastructure</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-laptop"></i>
                                <span>Latest Technology</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-graduation-cap"></i>
                                <span>Quality Education</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Facilities Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Our Facilities</h2>
        
        @if($facilities->count() > 0)
        <div class="row">
            @foreach($facilities as $facility)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="facility-card">
                    @if($facility->image)
                    <img src="{{ asset('storage/' . $facility->image) }}" 
                         class="card-img-top" 
                         alt="{{ $facility->name }}" 
                         style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <i class="{{ $facility->icon }} fa-3x"></i>
                        <h5>{{ $facility->name }}</h5>
                        <p>{{ $facility->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-building fa-4x text-muted mb-3"></i>
            <h4 class="text-muted">No facilities information available yet.</h4>
            <p class="text-muted">Check back soon for updates!</p>
        </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-4">Experience Our Facilities</h2>
                <p class="lead">Visit our campus and see our world-class facilities for yourself.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Schedule a Visit</a>
            </div>
        </div>
    </div>
</section>
@endsection
