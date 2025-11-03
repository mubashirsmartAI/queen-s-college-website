<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Queen\'s College of Nursing & Allied Health Sciences')</title>
    <meta name="description" content="@yield('description', 'Queen\'s College of Nursing & Allied Health Sciences - Khairpur Campus. Founded by Professor Ghulam Rasool Soomro.')">
    <meta name="keywords" content="nursing college, healthcare education, nursing courses, medical training, Khairpur, Sindh, Pakistan, Professor Ghulam Rasool Soomro">
    <meta name="author" content="Queen's College of Nursing & Allied Health Sciences">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="theme-color" content="#dc3545">
    <meta name="msapplication-TileColor" content="#dc3545">
    <meta name="msapplication-TileImage" content="{{ asset('college-logo.jpg') }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('college-logo.jpg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('college-logo.jpg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('college-logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('college-logo.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('college-logo.jpg') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta property="og:title" content="@yield('title', 'Queen\'s College of Nursing & Allied Health Sciences')">
    <meta property="og:description" content="@yield('description', 'Queen\'s College of Nursing & Allied Health Sciences - Khairpur Campus. Founded by Professor Ghulam Rasool Soomro.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('college-logo.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Queen\'s College of Nursing & Allied Health Sciences')">
    <meta name="twitter:description" content="@yield('description', 'Queen\'s College of Nursing & Allied Health Sciences - Khairpur Campus. Founded by Professor Ghulam Rasool Soomro.')">
    <meta name="twitter:image" content="{{ asset('college-logo.jpg') }}">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #dc3545;
            --secondary-color: #0d6efd;
            --dark-color: #212529;
            --light-bg: #f8f9fa;
        }

        /* Top Bar */
        .top-bar {
            background: var(--dark-color);
            color: white;
            padding: 10px 0;
            font-size: 14px;
        }

        .top-bar a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
        }

        .top-bar i {
            margin-right: 5px;
        }

        /* Navigation */
        .navbar {
            background: white !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-img {
            width: 60px;
            height: 60px;
        }

        .brand-text h4 {
            margin: 0;
            color: var(--primary-color);
            font-weight: 700;
            font-size: 18px;
        }

        .brand-text p {
            margin: 0;
            color: var(--secondary-color);
            font-size: 12px;
        }

        .navbar-nav .nav-link {
            color: var(--dark-color) !important;
            font-weight: 500;
            padding: 8px 15px !important;
            transition: all 0.3s;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--primary-color) !important;
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span><i class="fas fa-phone"></i> 0243-685370 | 0327-3313130</span>
                </div>
                <div class="col-md-6 text-end">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('college-logo.jpg') }}" alt="Queen's College Logo" class="logo-img rounded-circle">
                <div class="brand-text">
                    <h4>QUEEN'S COLLEGE</h4>
                    <p>OF NURSING & ALLIED HEALTH SCIENCES</p>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAcademics" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Academics
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownAcademics">
                            <li><a class="dropdown-item" href="{{ route('courses.index') }}">Courses</a></li>
                            <li><a class="dropdown-item" href="{{ route('faculty.index') }}">Faculty</a></li>
                            <li><a class="dropdown-item" href="{{ route('facilities') }}">Facilities</a></li>
                            <li><a class="dropdown-item" href="{{ route('fee-structure') }}">Fee Structure</a></li>
                            <li><a class="dropdown-item" href="{{ route('scholarships') }}">Scholarships</a></li>
                            <li><a class="dropdown-item" href="{{ route('prospectus') }}">Prospectus</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownInfo" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Information
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownInfo">
                            <li><a class="dropdown-item" href="{{ route('notifications') }}">Notifications</a></li>
                            <li><a class="dropdown-item" href="{{ route('policies') }}">Policies</a></li>
                            <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li>
                            <li><a class="dropdown-item" href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('admission.index') ? 'active' : '' }}" href="{{ route('admission.index') }}">Admission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('gallery.index') ? 'active' : '' }}" href="{{ route('gallery.index') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>


    <!-- Scroll to Top Button -->
    <button class="scroll-to-top" id="scrollToTop" style="display: none;">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Scroll to top functionality
        window.addEventListener('scroll', function() {
            const scrollToTop = document.getElementById('scrollToTop');
            if (window.pageYOffset > 300) {
                scrollToTop.style.display = 'block';
            } else {
                scrollToTop.style.display = 'none';
            }
        });

        document.getElementById('scrollToTop').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Add fade-in animation to cards
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);

        // Observe all cards
        document.querySelectorAll('.card').forEach(card => {
            observer.observe(card);
        });

        // Hero Slider Enhancements
        const heroSlider = document.getElementById('heroSlider');
        console.log('Hero slider element:', heroSlider);
        
        if (heroSlider) {
            // Debug: Check if images are loading
            const slides = heroSlider.querySelectorAll('.hero-slide');
            console.log('Number of slides found:', slides.length);
            
            slides.forEach((slide, index) => {
                console.log(`Slide ${index + 1} element:`, slide);
                console.log(`Slide ${index + 1} background image:`, slide.style.backgroundImage);
                
                const img = new Image();
                img.onload = function() {
                    console.log(`Slide ${index + 1} image loaded successfully`);
                };
                img.onerror = function() {
                    console.error(`Slide ${index + 1} image failed to load`);
                };
                const bgImage = slide.style.backgroundImage;
                if (bgImage) {
                    const url = bgImage.replace(/url\(['"]?([^'"]*)['"]?\)/, '$1');
                    console.log(`Loading image for slide ${index + 1}:`, url);
                    img.src = url;
                }
            });
            
            // Pause slider on hover
            heroSlider.addEventListener('mouseenter', function() {
                this.pause();
            });
            
            heroSlider.addEventListener('mouseleave', function() {
                this.cycle();
            });
            
            // Force carousel initialization
            console.log('Initializing carousel...');
            const carousel = new bootstrap.Carousel(heroSlider, {
                interval: 5000,
                wrap: true,
                touch: true
            });
            console.log('Carousel initialized:', carousel);
            
            // Force first slide to be active
            const firstSlide = heroSlider.querySelector('.carousel-item.active');
            if (firstSlide) {
                console.log('First slide found:', firstSlide);
                firstSlide.style.display = 'block';
                firstSlide.style.opacity = '1';
                firstSlide.style.visibility = 'visible';
            }
            
            // Force all slides to be visible for testing
            const allSlides = heroSlider.querySelectorAll('.carousel-item');
            allSlides.forEach((slide, index) => {
                console.log(`Slide ${index + 1} visibility:`, slide.style.display, slide.style.opacity);
                slide.style.display = 'block';
                if (index === 0) {
                    slide.style.opacity = '1';
                } else {
                    slide.style.opacity = '0';
                }
            });
            
            // Add keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowLeft') {
                    carousel.prev();
                } else if (e.key === 'ArrowRight') {
                    carousel.next();
                }
            });
        }
    </script>
    
    @yield('scripts')
</body>
</html>
