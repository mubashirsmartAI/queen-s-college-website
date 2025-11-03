@extends('layouts.app')

@section('title', 'Scholarships - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'Explore scholarship opportunities and financial aid programs at Queen\'s College of Nursing & Allied Health Sciences.')

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
                    url('{{ asset('slider/scholarship1.jpg') }}') center/cover;
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

    .scholarship-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        overflow: hidden;
        height: 100%;
        margin-bottom: 2rem;
    }

    .scholarship-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .scholarship-card .card-body {
        padding: 2rem;
    }

    .scholarship-card h5 {
        color: var(--dark-color);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .scholarship-card .amount {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }

    .scholarship-card p {
        color: #6c757d;
        margin-bottom: 1rem;
    }

    .scholarship-card .criteria {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 10px;
        margin-bottom: 1rem;
    }

    .scholarship-card .criteria h6 {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .scholarship-card .criteria ul {
        margin-bottom: 0;
        padding-left: 1.5rem;
    }

    .scholarship-card .criteria li {
        color: #6c757d;
        margin-bottom: 0.25rem;
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
                <h1>Scholarships & Financial Aid</h1>
                <p class="lead">Making Quality Healthcare Education Accessible</p>
                <p>Queen's College of Nursing & Allied Health Sciences is committed to providing financial assistance to deserving students. We offer various scholarship programs to ensure that financial constraints don't hinder your educational journey.</p>
                <div class="hero-features mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-graduation-cap"></i>
                                <span>Merit-Based</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-heart"></i>
                                <span>Need-Based</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-award"></i>
                                <span>Excellence Rewards</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Scholarships Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Available Scholarships</h2>
        
        <div class="row">
            <div class="col-lg-6">
                <div class="scholarship-card">
                    <div class="card-body">
                        <h5>Merit Scholarship</h5>
                        <div class="amount">Up to 50% Fee Waiver</div>
                        <p>For students with outstanding academic performance and entrance test scores.</p>
                        <div class="criteria">
                            <h6>Eligibility Criteria:</h6>
                            <ul>
                                <li>Minimum 80% marks in previous education</li>
                                <li>Top 10% in entrance test</li>
                                <li>Maintain 3.5+ GPA throughout the program</li>
                            </ul>
                        </div>
                        <a href="{{ route('admission.index') }}" class="btn btn-primary">Apply Now</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="scholarship-card">
                    <div class="card-body">
                        <h5>Need-Based Scholarship</h5>
                        <div class="amount">Up to 75% Fee Waiver</div>
                        <p>For students from economically disadvantaged backgrounds who demonstrate financial need.</p>
                        <div class="criteria">
                            <h6>Eligibility Criteria:</h6>
                            <ul>
                                <li>Family income below Rs. 50,000/month</li>
                                <li>Minimum 70% marks in previous education</li>
                                <li>Documented financial need</li>
                            </ul>
                        </div>
                        <a href="{{ route('admission.index') }}" class="btn btn-primary">Apply Now</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="scholarship-card">
                    <div class="card-body">
                        <h5>Sports Scholarship</h5>
                        <div class="amount">Up to 30% Fee Waiver</div>
                        <p>For students with exceptional sports achievements at district or provincial level.</p>
                        <div class="criteria">
                            <h6>Eligibility Criteria:</h6>
                            <ul>
                                <li>Represented district/province in sports</li>
                                <li>Minimum 65% marks in previous education</li>
                                <li>Active participation in college sports</li>
                            </ul>
                        </div>
                        <a href="{{ route('admission.index') }}" class="btn btn-primary">Apply Now</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="scholarship-card">
                    <div class="card-body">
                        <h5>Excellence Scholarship</h5>
                        <div class="amount">100% Fee Waiver</div>
                        <p>For exceptional students who demonstrate outstanding potential in healthcare education.</p>
                        <div class="criteria">
                            <h6>Eligibility Criteria:</h6>
                            <ul>
                                <li>Top 5% in entrance test</li>
                                <li>Minimum 90% marks in previous education</li>
                                <li>Exceptional interview performance</li>
                            </ul>
                        </div>
                        <a href="{{ route('admission.index') }}" class="btn btn-primary">Apply Now</a>
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
                <h2 class="mb-4">Apply for Scholarships</h2>
                <p class="lead">Don't let financial constraints stop you from pursuing your dreams in healthcare education.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admission.index') }}" class="btn btn-light btn-lg">Apply Now</a>
            </div>
        </div>
    </div>
</section>
@endsection
