@extends('layouts.app')

@section('title', 'Contact Us - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'Get in touch with Queen\'s College of Nursing & Allied Health Sciences. Contact information and location details.')

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
                    url('{{ asset('slider/contact-us.jpg') }}') center/cover;
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

    .contact-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        overflow: hidden;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .contact-info-card {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border-radius: 15px;
        padding: 2rem;
        height: 100%;
    }

    .contact-info-card h4 {
        color: white;
        margin-bottom: 2rem;
        font-weight: 600;
    }

    .contact-info-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
        padding: 1rem;
        background: rgba(255,255,255,0.1);
        border-radius: 10px;
        transition: background 0.3s ease;
    }

    .contact-info-item:hover {
        background: rgba(255,255,255,0.2);
    }

    .contact-info-item i {
        font-size: 1.5rem;
        margin-right: 1rem;
        color: #ffd700;
        margin-top: 0.2rem;
    }

    .contact-info-item div h6 {
        color: white;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .contact-info-item div p {
        color: rgba(255,255,255,0.9);
        margin: 0;
        line-height: 1.5;
    }

    .contact-info-item div a {
        color: #ffd700;
        text-decoration: none;
        font-weight: 500;
    }

    .contact-info-item div a:hover {
        color: white;
        text-decoration: underline;
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

    .quick-links-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: none;
        height: 100%;
    }

    .quick-links-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .quick-links-card .card-body {
        padding: 2rem;
        text-align: center;
    }

    .quick-links-card i {
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .quick-links-card h5 {
        color: var(--dark-color);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .quick-links-card p {
        color: #6c757d;
        margin-bottom: 1.5rem;
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

    .map-section {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 4rem 0;
    }

    .map-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .map-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 2rem;
        text-align: center;
    }

    .map-content {
        padding: 3rem;
        text-align: center;
    }

    .map-content i {
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .map-container {
        position: relative;
        width: 100%;
        height: 400px;
        border-radius: 0 0 15px 15px;
        overflow: hidden;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
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
                <h1>Contact Queen's College</h1>
                <p class="lead">Get in Touch with Pakistan's Premier Nursing Education Institution</p>
                <p>We're here to help you with admissions, course information, and any questions about our nursing and allied health programs. Reach out to us through any of the channels below.</p>
                <div class="hero-features mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-phone"></i>
                                <span>24/7 Support</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-envelope"></i>
                                <span>Quick Response</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Visit Campus</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Get in Touch</h2>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="contact-card">
                    <div class="card-body p-5">
                        <h3 class="mb-4">Send us a Message</h3>
                        <p class="text-muted mb-4">Have questions about our courses or admission process? We'd love to hear from you.</p>
                        
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
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
                                    <label for="subject" class="form-label">Subject *</label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" required>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="contact-info-card">
                    <h4>Contact Information</h4>
                    
                    <div class="contact-info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h6>Address</h6>
                            <p>Areesha Colony, 1st Street, Main Civil Hospital Rd, Khairpur, Pakistan</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h6>Phone Numbers</h6>
                            <p>Office: <a href="tel:0243-685370">0243-685370</a></p>
                            <p>Mobile: <a href="tel:0327-3313130">0327-3313130</a></p>
                            <p>Mobile: <a href="tel:0333-2051323">0333-2051323</a></p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h6>Email</h6>
                            <p><a href="mailto:info@queenscollege.edu.pk">info@queenscollege.edu.pk</a></p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h6>Office Hours</h6>
                            <p>Monday - Friday: 9:00 AM - 5:00 PM</p>
                            <p>Saturday: 9:00 AM - 1:00 PM</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <i class="fas fa-user"></i>
                        <div>
                            <h6>Principal</h6>
                            <p>Professor Ghulam Rasool Soomro</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container">
        <h2 class="section-title">Our Location</h2>
        <div class="row">
            <div class="col-12">
                <div class="map-card">
                    <div class="map-header">
                        <h5 class="mb-2">Queen's College of Nursing & Allied Health Sciences</h5>
                        <p class="mb-0">Areesha Colony, 1st Street, Main Civil Hospital Rd, Khairpur, Pakistan</p>
                    </div>
                    <div class="map-content p-0">
                        <div class="map-container">
                            <iframe 
                                src="https://maps.google.com/maps?q=Areesha+Colony+1st+Street+Main+Civil+Hospital+Rd+Khairpur+Pakistan&t=&z=15&ie=UTF8&iwloc=&output=embed"
                                width="100%" 
                                height="400" 
                                style="border:0; border-radius: 0 0 15px 15px;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <div class="p-4 text-center">
                            <a href="https://www.google.com/maps/search/Areesha+Colony+1st+Street+Main+Civil+Hospital+Rd+Khairpur+Pakistan" target="_blank" class="btn btn-primary">View on Google Maps</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Links -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Quick Links</h2>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="quick-links-card">
                    <div class="card-body">
                        <i class="fas fa-graduation-cap fa-3x"></i>
                        <h5>Admission</h5>
                        <p>Apply for admission to our nursing programs.</p>
                        <a href="{{ route('admission.index') }}" class="btn btn-outline-primary">Apply Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="quick-links-card">
                    <div class="card-body">
                        <i class="fas fa-book fa-3x"></i>
                        <h5>Courses</h5>
                        <p>Explore our comprehensive nursing courses.</p>
                        <a href="{{ route('courses.index') }}" class="btn btn-outline-primary">View Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="quick-links-card">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x"></i>
                        <h5>Faculty</h5>
                        <p>Meet our experienced faculty members.</p>
                        <a href="{{ route('faculty.index') }}" class="btn btn-outline-primary">Meet Faculty</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="quick-links-card">
                    <div class="card-body">
                        <i class="fas fa-images fa-3x"></i>
                        <h5>Gallery</h5>
                        <p>View our campus and student life.</p>
                        <a href="{{ route('gallery.index') }}" class="btn btn-outline-primary">View Gallery</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
