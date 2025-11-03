@extends('layouts.app')

@section('title', 'Notifications - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'Stay updated with the latest news, announcements, and important notifications from Queen\'s College of Nursing & Allied Health Sciences.')

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
                    url('{{ asset('slider/slide4.jpg') }}') center/cover;
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

    .notification-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .notification-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .notification-card .card-body {
        padding: 2rem;
    }

    .notification-card h5 {
        color: var(--dark-color);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .notification-card .date {
        color: var(--primary-color);
        font-weight: 500;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .notification-card p {
        color: #6c757d;
        margin-bottom: 0;
    }

    .notification-card .type {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        margin-bottom: 1rem;
    }

    .notification-card .type.admission {
        background: #d4edda;
        color: #155724;
    }

    .notification-card .type.exam {
        background: #fff3cd;
        color: #856404;
    }

    .notification-card .type.general {
        background: #d1ecf1;
        color: #0c5460;
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
                <h1>Notifications & Announcements</h1>
                <p class="lead">Stay Updated with Latest News and Important Information</p>
                <p>Keep yourself informed about the latest announcements, exam schedules, admission updates, and important notices from Queen's College of Nursing & Allied Health Sciences.</p>
                <div class="hero-features mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-bell"></i>
                                <span>Latest Updates</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-calendar"></i>
                                <span>Important Dates</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-info-circle"></i>
                                <span>College News</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Notifications Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Latest Notifications</h2>
        
        <div class="row">
            <div class="col-lg-6">
                <div class="notification-card">
                    <div class="card-body">
                        <span class="type admission">Admission</span>
                        <h5>Admission Open for 2024-25 Session</h5>
                        <div class="date">Published: October 15, 2024</div>
                        <p>Applications are now open for all nursing and allied health programs for the academic year 2024-25. Last date to apply is December 31, 2024.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="notification-card">
                    <div class="card-body">
                        <span class="type exam">Examination</span>
                        <h5>Mid-Term Examinations Schedule</h5>
                        <div class="date">Published: October 10, 2024</div>
                        <p>Mid-term examinations for all programs will be conducted from November 15-25, 2024. Detailed schedule will be shared soon.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="notification-card">
                    <div class="card-body">
                        <span class="type general">General</span>
                        <h5>New Laboratory Equipment Installation</h5>
                        <div class="date">Published: October 5, 2024</div>
                        <p>We are pleased to announce the installation of new state-of-the-art laboratory equipment to enhance practical training for our students.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="notification-card">
                    <div class="card-body">
                        <span class="type admission">Admission</span>
                        <h5>Scholarship Applications Open</h5>
                        <div class="date">Published: October 1, 2024</div>
                        <p>Merit-based and need-based scholarship applications are now open. Apply before November 30, 2024 to be considered for financial assistance.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="notification-card">
                    <div class="card-body">
                        <span class="type general">General</span>
                        <h5>Faculty Development Program</h5>
                        <div class="date">Published: September 28, 2024</div>
                        <p>Our faculty members participated in a comprehensive development program to enhance teaching methodologies and stay updated with latest healthcare practices.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="notification-card">
                    <div class="card-body">
                        <span class="type exam">Examination</span>
                        <h5>Final Year Project Presentations</h5>
                        <div class="date">Published: September 25, 2024</div>
                        <p>Final year project presentations for BSN students will be held from December 1-5, 2024. Students are advised to prepare accordingly.</p>
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
                <h2 class="mb-4">Stay Connected</h2>
                <p class="lead">Follow us on social media and subscribe to our newsletter for regular updates.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Contact Us</a>
            </div>
        </div>
    </div>
</section>
@endsection
