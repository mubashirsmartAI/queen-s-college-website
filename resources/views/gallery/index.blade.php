@extends('layouts.app')

@section('title', 'Gallery - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'Explore our campus life, facilities, and events through our photo gallery at Queen\'s College.')

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

    .gallery-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        overflow: hidden;
        height: 100%;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .gallery-card img {
        transition: transform 0.3s ease;
    }

    .gallery-card:hover img {
        transform: scale(1.05);
    }

    .gallery-card .card-body {
        padding: 1.5rem;
    }

    .gallery-card h5 {
        color: var(--dark-color);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .gallery-card p {
        color: #6c757d;
        margin-bottom: 1rem;
    }

    .badge {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border: none;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 500;
    }

    .campus-life-section {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 4rem 0;
    }

    .campus-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: none;
        height: 100%;
    }

    .campus-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .campus-card .card-body {
        padding: 2rem;
        text-align: center;
    }

    .campus-card i {
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .campus-card h5 {
        color: var(--dark-color);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .campus-card p {
        color: #6c757d;
    }

    .facilities-section {
        padding: 4rem 0;
    }

    .facility-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: none;
        height: 100%;
    }

    .facility-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .facility-card .card-body {
        padding: 2rem;
        text-align: center;
    }

    .facility-card i {
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .facility-card h5 {
        color: var(--dark-color);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .facility-card p {
        color: #6c757d;
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
                <h1>Gallery</h1>
                <p class="lead">Explore Life at Queen's College of Nursing & Allied Health Sciences</p>
                <p>Discover our modern campus, state-of-the-art facilities, and vibrant student life through our comprehensive photo gallery.</p>
                <div class="hero-features mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-camera"></i>
                                <span>Campus Life</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-building"></i>
                                <span>Modern Facilities</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-users"></i>
                                <span>Student Activities</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Photo Gallery</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="gallery-card">
                    <img src="{{ asset('images/college-campus.jpg') }}" class="card-img-top" alt="College Campus" style="height: 250px; object-fit: cover;" data-bs-toggle="modal" data-bs-target="#galleryModal1">
                    <div class="card-body">
                        <h5>Modern Campus</h5>
                        <p>State-of-the-art facilities for quality education and training.</p>
                        <span class="badge">Campus</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="gallery-card">
                    <img src="{{ asset('images/medical-lab.jpg') }}" class="card-img-top" alt="Medical Laboratory" style="height: 250px; object-fit: cover;" data-bs-toggle="modal" data-bs-target="#galleryModal2">
                    <div class="card-body">
                        <h5>Medical Laboratory</h5>
                        <p>Well-equipped laboratories for practical training and research.</p>
                        <span class="badge">Facilities</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="gallery-card">
                    <img src="{{ asset('images/clinical-training.jpg') }}" class="card-img-top" alt="Clinical Training" style="height: 250px; object-fit: cover;" data-bs-toggle="modal" data-bs-target="#galleryModal3">
                    <div class="card-body">
                        <h5>Clinical Training</h5>
                        <p>Hands-on clinical experience in modern healthcare settings.</p>
                        <span class="badge">Training</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="gallery-card">
                    <img src="{{ asset('images/library.jpg') }}" class="card-img-top" alt="College Library" style="height: 250px; object-fit: cover;" data-bs-toggle="modal" data-bs-target="#galleryModal4">
                    <div class="card-body">
                        <h5>College Library</h5>
                        <p>Extensive collection of medical and nursing resources.</p>
                        <span class="badge">Library</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="gallery-card">
                    <img src="{{ asset('images/nursing-student.jpg') }}" class="card-img-top" alt="Nursing Students" style="height: 250px; object-fit: cover;" data-bs-toggle="modal" data-bs-target="#galleryModal5">
                    <div class="card-body">
                        <h5>Student Life</h5>
                        <p>Active student community with various activities and events.</p>
                        <span class="badge">Students</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="gallery-card">
                    <img src="{{ asset('images/medical-lab.jpg') }}" class="card-img-top" alt="Healthcare Training" style="height: 250px; object-fit: cover;" data-bs-toggle="modal" data-bs-target="#galleryModal6">
                    <div class="card-body">
                        <h5>Healthcare Training</h5>
                        <p>Professional training for future healthcare providers.</p>
                        <span class="badge">Healthcare</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals -->
        <div class="modal fade" id="galleryModal1" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modern Campus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('images/college-campus.jpg') }}" class="img-fluid" alt="College Campus">
                        <p class="mt-3">Our modern campus provides state-of-the-art facilities for quality education and training in nursing and allied health sciences.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="galleryModal2" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Medical Laboratory</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('images/medical-lab.jpg') }}" class="img-fluid" alt="Medical Laboratory">
                        <p class="mt-3">Well-equipped laboratories with latest equipment for practical training and research in medical sciences.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="galleryModal3" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Clinical Training</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('images/clinical-training.jpg') }}" class="img-fluid" alt="Clinical Training">
                        <p class="mt-3">Hands-on clinical experience in modern healthcare settings to prepare students for real-world nursing practice.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="galleryModal4" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">College Library</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('images/library.jpg') }}" class="img-fluid" alt="College Library">
                        <p class="mt-3">Extensive collection of medical and nursing resources including books, journals, and digital materials.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="galleryModal5" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Student Life</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('images/nursing-student.jpg') }}" class="img-fluid" alt="Nursing Students">
                        <p class="mt-3">Active student community with various activities, events, and opportunities for professional development.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="galleryModal6" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Healthcare Training</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('images/medical-lab.jpg') }}" class="img-fluid" alt="Healthcare Training">
                        <p class="mt-3">Professional training programs designed to prepare future healthcare providers with the skills and knowledge needed for success.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Campus Life Section -->
<section class="campus-life-section">
    <div class="container">
        <h2 class="section-title">Campus Life</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="campus-card">
                    <div class="card-body">
                        <i class="fas fa-graduation-cap fa-3x"></i>
                        <h5>Academic Excellence</h5>
                        <p>State-of-the-art classrooms and laboratories for quality education.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="campus-card">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x"></i>
                        <h5>Student Community</h5>
                        <p>Active student community with various clubs and activities.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="campus-card">
                    <div class="card-body">
                        <i class="fas fa-calendar-alt fa-3x"></i>
                        <h5>Events & Activities</h5>
                        <p>Regular events, workshops, and extracurricular activities.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Facilities Preview -->
<section class="facilities-section">
    <div class="container">
        <h2 class="section-title">Our Facilities</h2>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="facility-card">
                    <div class="card-body">
                        <i class="fas fa-book fa-3x"></i>
                        <h5>Library</h5>
                        <p>Well-stocked library with medical and nursing books.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="facility-card">
                    <div class="card-body">
                        <i class="fas fa-flask fa-3x"></i>
                        <h5>Laboratories</h5>
                        <p>Modern laboratories for practical training.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="facility-card">
                    <div class="card-body">
                        <i class="fas fa-laptop fa-3x"></i>
                        <h5>Computer Lab</h5>
                        <p>Computer lab with latest technology.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="facility-card">
                    <div class="card-body">
                        <i class="fas fa-heartbeat fa-3x"></i>
                        <h5>Clinical Training</h5>
                        <p>Clinical training facilities for hands-on experience.</p>
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
                <h2 class="mb-4">Experience Campus Life</h2>
                <p class="lead">Join Queen's College and become part of our vibrant community.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admission.index') }}" class="btn btn-light btn-lg">Apply Now</a>
            </div>
        </div>
    </div>
</section>
@endsection
