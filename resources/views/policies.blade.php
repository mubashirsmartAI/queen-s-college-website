@extends('layouts.app')

@section('title', 'Policies - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'View our institutional policies, rules, and regulations at Queen\'s College of Nursing & Allied Health Sciences.')

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
                    url('{{ asset('slider/policies.jpg') }}') center/cover;
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

    .policy-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .policy-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .policy-card .card-body {
        padding: 2rem;
    }

    .policy-card h5 {
        color: var(--dark-color);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .policy-card p {
        color: #6c757d;
        margin-bottom: 1.5rem;
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
                <h1>Institutional Policies</h1>
                <p class="lead">Transparent Rules and Regulations for Academic Excellence</p>
                <p>Queen's College of Nursing & Allied Health Sciences maintains clear policies and procedures to ensure a conducive learning environment and uphold the highest standards of academic integrity.</p>
                <div class="hero-features mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-gavel"></i>
                                <span>Clear Guidelines</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt"></i>
                                <span>Student Rights</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-balance-scale"></i>
                                <span>Fair Practices</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Policies Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Our Policies</h2>
        
        <div class="row">
            <div class="col-lg-6">
                <div class="policy-card">
                    <div class="card-body">
                        <h5>Academic Policies</h5>
                        <p>Comprehensive guidelines for academic performance, attendance, examinations, and grading systems.</p>
                        <a href="#" class="btn btn-primary">View Policy</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="policy-card">
                    <div class="card-body">
                        <h5>Student Code of Conduct</h5>
                        <p>Expected behavior standards, disciplinary procedures, and student rights and responsibilities.</p>
                        <a href="#" class="btn btn-primary">View Policy</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="policy-card">
                    <div class="card-body">
                        <h5>Admission Policies</h5>
                        <p>Clear guidelines for admission procedures, eligibility criteria, and selection processes.</p>
                        <a href="#" class="btn btn-primary">View Policy</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="policy-card">
                    <div class="card-body">
                        <h5>Fee and Payment Policies</h5>
                        <p>Transparent fee structure, payment schedules, refund policies, and financial assistance guidelines.</p>
                        <a href="#" class="btn btn-primary">View Policy</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="policy-card">
                    <div class="card-body">
                        <h5>Examination Policies</h5>
                        <p>Examination rules, grading criteria, re-examination procedures, and academic integrity policies.</p>
                        <a href="#" class="btn btn-primary">View Policy</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="policy-card">
                    <div class="card-body">
                        <h5>Grievance Redressal</h5>
                        <p>Procedures for addressing student concerns, complaints, and dispute resolution mechanisms.</p>
                        <a href="#" class="btn btn-primary">View Policy</a>
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
                <h2 class="mb-4">Questions About Our Policies?</h2>
                <p class="lead">Contact our administration office for clarification on any policy or procedure.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Contact Us</a>
            </div>
        </div>
    </div>
</section>
@endsection
