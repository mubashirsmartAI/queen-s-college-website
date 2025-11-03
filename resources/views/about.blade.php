@extends('layouts.app')

@section('title', 'About Us - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'Learn about Queen\'s College of Nursing & Allied Health Sciences, founded by Professor Ghulam Rasool Soomro in Khairpur.')

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
                    url('{{ asset('slider/slide3.jpg') }}') center/cover;
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
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 4px;
        background: var(--primary-color);
    }

    .about-card {
        background: white;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }

    .founder-section {
        background: var(--light-bg);
        padding: 60px 0;
    }

    .founder-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .stats-section {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 60px 0;
    }

    .stat-box {
        text-align: center;
        padding: 20px;
    }

    .stat-box i {
        font-size: 50px;
        margin-bottom: 15px;
    }

    .stat-box h2 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 10px;
    }


    .value-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        padding: 15px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .value-item i {
        font-size: 24px;
        color: var(--primary-color);
        margin-right: 15px;
        width: 40px;
    }

    /* Footer */
    .footer {
        background: var(--dark-color);
        color: white;
        padding: 60px 0 20px;
    }

    .footer h5 {
        color: var(--primary-color);
        margin-bottom: 20px;
        font-weight: 600;
    }

    .footer ul {
        list-style: none;
        padding: 0;
    }

    .footer ul li {
        margin-bottom: 10px;
    }

    .footer ul li a {
        color: #adb5bd;
        text-decoration: none;
        transition: all 0.3s;
    }

    .footer ul li a:hover {
        color: white;
        padding-left: 5px;
    }

    .social-icons a {
        width: 40px;
        height: 40px;
        background: rgba(255,255,255,0.1);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin-right: 10px;
        color: white;
        transition: all 0.3s;
    }

    .social-icons a:hover {
        background: var(--primary-color);
        transform: translateY(-3px);
    }

    .copyright {
        text-align: center;
        padding-top: 30px;
        margin-top: 30px;
        border-top: 1px solid rgba(255,255,255,0.1);
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 hero-content">
                <h1>About Queen's College of Nursing & Allied Health Sciences</h1>
                <p class="lead">Excellence in Nursing Education & Healthcare Training Since Foundation</p>
                <p>Founded by Professor Ghulam Rasool Soomro, Queen's College is a premier institution dedicated to producing highly skilled healthcare professionals who serve communities across Pakistan with dedication, compassion, and expertise.</p>
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
                                <i class="fas fa-hospital"></i>
                                <span>Clinical Training</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-award"></i>
                                <span>Expert Faculty</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="about-card">
                    <h2 class="section-title">Our Story</h2>
                    <p class="lead">Queen's College of Nursing & Allied Health Sciences is a premier institution dedicated to providing exceptional nursing education and healthcare training in Pakistan.</p>
                    <p>Founded with a vision to revolutionize healthcare education in Pakistan, Queen's College has been at the forefront of producing highly skilled nursing professionals who serve communities across the country with dedication, compassion, and expertise.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Founder Section -->
<section class="founder-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="founder-card">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('college-logo.jpg') }}" alt="Professor Ghulam Rasool Soomro" class="img-fluid rounded-circle shadow" style="width: 200px; height: 200px; object-fit: cover;">
                        </div>
                        <div class="col-md-8">
                            <h3 class="mb-3">Our Founder</h3>
                            <h4 class="text-primary">Professor Ghulam Rasool Soomro</h4>
                            <p class="text-muted mb-3">Founder & Principal</p>
                            <p>Professor Ghulam Rasool Soomro established Queen's College with a vision to provide quality nursing education and produce competent healthcare professionals who can serve the community with dedication and excellence. His leadership and commitment to healthcare education have made Queen's College a trusted name in nursing education across Pakistan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission, Vision, Values -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="about-card text-center">
                    <i class="fas fa-bullseye fa-3x text-primary mb-3"></i>
                    <h3>Our Mission</h3>
                    <p>To provide comprehensive nursing education that combines theoretical knowledge with practical skills, preparing students to become competent, compassionate, and professional healthcare providers who serve communities with excellence.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="about-card text-center">
                    <i class="fas fa-eye fa-3x text-primary mb-3"></i>
                    <h3>Our Vision</h3>
                    <p>To be a leading institution in nursing education, recognized for excellence in teaching, research, and community service, contributing to the advancement of healthcare in Pakistan and beyond.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="about-card text-center">
                    <i class="fas fa-heart fa-3x text-primary mb-3"></i>
                    <h3>Our Values</h3>
                    <p>We uphold the highest standards of professional integrity, compassionate care, continuous learning, and ethical practice in all our educational and healthcare activities.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-center">Our Core Values</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="value-item">
                            <i class="fas fa-graduation-cap"></i>
                            <div>
                                <h5>Excellence in Education</h5>
                                <p class="mb-0">Committed to providing the highest quality nursing education</p>
                            </div>
                        </div>
                        <div class="value-item">
                            <i class="fas fa-user-shield"></i>
                            <div>
                                <h5>Professional Integrity</h5>
                                <p class="mb-0">Maintaining the highest ethical standards in healthcare practice</p>
                            </div>
                        </div>
                        <div class="value-item">
                            <i class="fas fa-hands-helping"></i>
                            <div>
                                <h5>Compassionate Care</h5>
                                <p class="mb-0">Serving patients and communities with empathy and kindness</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="value-item">
                            <i class="fas fa-book-open"></i>
                            <div>
                                <h5>Continuous Learning</h5>
                                <p class="mb-0">Fostering a culture of lifelong learning and professional development</p>
                            </div>
                        </div>
                        <div class="value-item">
                            <i class="fas fa-users"></i>
                            <div>
                                <h5>Community Service</h5>
                                <p class="mb-0">Dedicated to serving and improving community health</p>
                            </div>
                        </div>
                        <div class="value-item">
                            <i class="fas fa-balance-scale"></i>
                            <div>
                                <h5>Ethical Practice</h5>
                                <p class="mb-0">Upholding moral principles in all healthcare activities</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Campus Location -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="about-card">
                    <h2 class="section-title text-center">Campus Location</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-3"></i>
                                <div>
                                    <h5>Address</h5>
                                    <p class="mb-0">Professor's Colony Near KMC Girl's Hostel, Khairpur</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-phone fa-2x text-primary me-3"></i>
                                <div>
                                    <h5>Office Phone</h5>
                                    <p class="mb-0">0243-685370</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-mobile-alt fa-2x text-primary me-3"></i>
                                <div>
                                    <h5>Mobile Numbers</h5>
                                    <p class="mb-0">0327-3313130, 0333-2051323</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-envelope fa-2x text-primary me-3"></i>
                                <div>
                                    <h5>Email</h5>
                                    <p class="mb-0">info@queenscollege.edu.pk</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6">
                <div class="stat-box">
                    <i class="fas fa-graduation-cap"></i>
                    <h2>500+</h2>
                    <p>Students Graduated</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-box">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h2>30+</h2>
                    <p>Expert Faculty</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-box">
                    <i class="fas fa-book-medical"></i>
                    <h2>10+</h2>
                    <p>Programs Offered</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-box">
                    <i class="fas fa-award"></i>
                    <h2>95%</h2>
                    <p>Success Rate</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5>Queen's College</h5>
                <p>Queen's College of Nursing & Allied Health Sciences is committed to producing world-class healthcare professionals.</p>
                <div class="social-icons mt-3">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('courses.index') }}">Programs</a></li>
                    <li><a href="{{ route('admission.index') }}">Admission</a></li>
                    <li><a href="{{ route('facilities') }}">Facilities</a></li>
                    <li><a href="{{ route('gallery.index') }}">Gallery</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5>Programs</h5>
                <ul>
                    <li><a href="{{ route('courses.index') }}">Diploma in Nursing</a></li>
                    <li><a href="{{ route('courses.index') }}">Medical Lab Tech</a></li>
                    <li><a href="{{ route('courses.index') }}">Allied Health Sciences</a></li>
                    <li><a href="{{ route('courses.index') }}">Pharmacy</a></li>
                    <li><a href="{{ route('courses.index') }}">All Programs</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5>Contact Info</h5>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Professor's Colony Near KMC Girl's Hostel, Khairpur</li>
                    <li><i class="fas fa-phone"></i> 0243-685370</li>
                    <li><i class="fas fa-mobile"></i> 0327-3313130</li>
                    <li><i class="fas fa-mobile"></i> 0333-2051323</li>
                    <li><i class="fas fa-envelope"></i> info@queenscollege.edu.pk</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2024 Queen's College of Nursing & Allied Health Sciences. Founded by Professor Ghulam Rasool Soomro. All Rights Reserved.</p>
        </div>
    </div>
</footer>
@endsection

