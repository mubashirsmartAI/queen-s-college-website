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

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border: none;
        border-radius: 10px;
        padding: 12px 40px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
    }

    .btn-outline-secondary {
        border: 2px solid var(--secondary-color);
        color: var(--secondary-color);
        border-radius: 10px;
        padding: 12px 40px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-outline-secondary:hover {
        background: var(--secondary-color);
        color: white;
        transform: translateY(-2px);
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
        
        @if($galleries->count() > 0)
        <div class="row" id="galleryContainer">
            @foreach($galleries as $index => $gallery)
            <div class="col-lg-4 col-md-6 mb-4 gallery-item" data-index="{{ $index }}" style="{{ $index >= 6 ? 'display: none;' : '' }}">
                <div class="gallery-card">
                    <img src="{{ asset('storage/' . $gallery->image) }}" 
                         class="card-img-top" 
                         alt="{{ $gallery->title }}" 
                         style="height: 250px; object-fit: cover; cursor: pointer;" 
                         data-bs-toggle="modal" 
                         data-bs-target="#galleryModal{{ $gallery->id }}">
                    <div class="card-body">
                        <h5>{{ $gallery->title }}</h5>
                        <p>{{ Str::limit($gallery->description, 80) }}</p>
                        <span class="badge">{{ ucfirst($gallery->category) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($galleries->count() > 6)
        <div class="text-center mt-4">
            <button id="loadMoreBtn" class="btn btn-primary btn-lg px-5">
                <i class="fas fa-images me-2"></i>Load More
            </button>
            <button id="showLessBtn" class="btn btn-outline-secondary btn-lg px-5" style="display: none;">
                <i class="fas fa-chevron-up me-2"></i>Show Less
            </button>
        </div>
        @endif

        <!-- Modals -->
        @foreach($galleries as $gallery)
        <div class="modal fade" id="galleryModal{{ $gallery->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $gallery->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('storage/' . $gallery->image) }}" class="img-fluid" alt="{{ $gallery->title }}">
                        @if($gallery->description)
                        <p class="mt-3">{{ $gallery->description }}</p>
                        @endif
                        <div class="mt-3">
                            <span class="badge">{{ ucfirst($gallery->category) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="text-center py-5">
            <i class="fas fa-images fa-4x text-muted mb-3"></i>
            <h4 class="text-muted">No gallery items available yet.</h4>
            <p class="text-muted">Check back soon for updates!</p>
        </div>
        @endif
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    const showLessBtn = document.getElementById('showLessBtn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    let currentlyShown = 6;

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            galleryItems.forEach((item, index) => {
                if (index < currentlyShown + 6) {
                    item.style.display = 'block';
                }
            });
            currentlyShown += 6;
            
            if (currentlyShown >= galleryItems.length) {
                loadMoreBtn.style.display = 'none';
            }
            
            showLessBtn.style.display = 'inline-block';
            
            // Smooth scroll to new items
            window.scrollBy({
                top: 300,
                behavior: 'smooth'
            });
        });
    }

    if (showLessBtn) {
        showLessBtn.addEventListener('click', function() {
            galleryItems.forEach((item, index) => {
                if (index >= 6) {
                    item.style.display = 'none';
                }
            });
            currentlyShown = 6;
            loadMoreBtn.style.display = 'inline-block';
            showLessBtn.style.display = 'none';
            
            // Scroll to gallery section
            document.querySelector('#galleryContainer').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    }
});
</script>

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
