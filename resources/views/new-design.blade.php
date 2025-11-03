<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queen's College of Nursing & Allied Health Sciences - Khairpur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #dc3545;
            --secondary-color: #0d6efd;
            --dark-color: #212529;
            --light-bg: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
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

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.9), rgba(13, 110, 253, 0.9)),
                        url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1600') center/cover;
            min-height: 600px;
            display: flex;
            align-items: center;
            color: white;
            position: relative;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero-content p {
            font-size: 1.3rem;
            margin-bottom: 30px;
        }

        .hero-buttons .btn {
            padding: 12px 35px;
            font-size: 16px;
            margin-right: 15px;
            border-radius: 50px;
            font-weight: 600;
        }

        /* Notice Banner */
        .notice-banner {
            background: linear-gradient(to right, #ff6b6b, #ee5a6f);
            color: white;
            padding: 15px 0;
            overflow: hidden;
        }

        .notice-content {
            display: flex;
            align-items: center;
            animation: scroll 20s linear infinite;
        }

        @keyframes scroll {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        .notice-content:hover {
            animation-play-state: paused;
        }

        /* Welcome Section */
        .welcome-section {
            padding: 80px 0;
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

        /* Programs Section */
        .programs-section {
            background: var(--light-bg);
            padding: 80px 0;
        }

        .program-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            height: 100%;
        }

        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .program-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 35px;
            color: white;
        }

        .program-card h4 {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 15px;
        }

        /* Stats Section */
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

        .stat-box p {
            font-size: 1.1rem;
        }

        /* Why Choose Us */
        .why-choose-section {
            padding: 80px 0;
        }

        .feature-box {
            padding: 30px;
            text-align: center;
            margin-bottom: 30px;
        }

        .feature-box i {
            font-size: 50px;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .feature-box h4 {
            font-weight: 600;
            margin-bottom: 15px;
        }

        /* Testimonials */
        .testimonial-section {
            background: var(--light-bg);
            padding: 80px 0;
        }

        .testimonial-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin: 15px;
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .author-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: 600;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.95), rgba(13, 110, 253, 0.95)),
                        url('https://images.unsplash.com/photo-1551076805-e1869033e561?w=1600') center/cover;
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
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

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2rem;
            }
            
            .hero-content p {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
        }
    </style>
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
            <a class="navbar-brand" href="#">
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
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#programs">Programs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#admission">Admission</a></li>
                    <li class="nav-item"><a class="nav-link" href="#facilities">Facilities</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 hero-content">
                    <h1>Shape Your Future in Healthcare</h1>
                    <p>Join Queen's College of Nursing & Allied Health Sciences for world-class education in healthcare. Founded by Professor Ghulam Rasool Soomro.</p>
                    <div class="hero-buttons">
                        <a href="#admission" class="btn btn-danger btn-lg">Apply Now</a>
                        <a href="#about" class="btn btn-outline-light btn-lg">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Notice Banner -->
    <div class="notice-banner">
        <div class="container-fluid">
            <div class="notice-content">
                <span style="margin-right: 50px;"><strong>📢 ADMISSION OPEN 2024-25</strong> | Limited Seats Available - Apply Today!</span>
                <span style="margin-right: 50px;"><strong>🎓 NEW PROGRAMS</strong> | Diploma in Medical Lab Technology Now Available</span>
                <span style="margin-right: 50px;"><strong>💰 SCHOLARSHIPS</strong> | Merit-based Scholarships for Deserving Students</span>
            </div>
        </div>
    </div>

    <!-- Welcome Section -->
    <section class="welcome-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1584820927498-cfe5211fd8bf?w=800" alt="College Building" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title">Welcome to Queen's College</h2>
                    <p class="lead mt-4">Queen's College of Nursing & Allied Health Sciences, Khairpur, is a premier institution dedicated to excellence in healthcare education.</p>
                    <p>Founded by the visionary Professor Ghulam Rasool Soomro, our college is committed to producing highly skilled healthcare professionals who make a difference in society. Located in Khairpur Campus at Professor's Colony near KMC Girl's Hostel, we offer state-of-the-art facilities and expert faculty.</p>
                    <p>Our mission is to provide quality education, practical training, and ethical values to our students, preparing them for successful careers in the healthcare industry.</p>
                    <a href="#" class="btn btn-danger mt-3">Read More About Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <i class="fas fa-graduation-cap"></i>
                        <h2>500+</h2>
                        <p>Students Enrolled</p>
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

    <!-- Programs Section -->
    <section class="programs-section" id="programs">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Our Programs</h2>
                <p class="lead">Choose from our diverse range of healthcare programs</p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-user-nurse"></i>
                        </div>
                        <h4>Diploma in Nursing</h4>
                        <p>Comprehensive nursing program preparing students for professional healthcare careers with hands-on clinical experience.</p>
                        <a href="#" class="btn btn-outline-danger mt-3">Learn More</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-microscope"></i>
                        </div>
                        <h4>Medical Lab Technology</h4>
                        <p>Advanced training in laboratory diagnostics, pathology, and medical testing techniques.</p>
                        <a href="#" class="btn btn-outline-danger mt-3">Learn More</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h4>Allied Health Sciences</h4>
                        <p>Specialized programs in pharmacy, radiology, physiotherapy, and other healthcare disciplines.</p>
                        <a href="#" class="btn btn-outline-danger mt-3">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-choose-section" id="facilities">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Why Choose Queen's College?</h2>
                <p class="lead">Excellence in healthcare education since establishment</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-hospital"></i>
                        <h4>Clinical Training</h4>
                        <p>Hands-on experience at leading hospitals and healthcare facilities in Khairpur and surrounding areas.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-users"></i>
                        <h4>Expert Faculty</h4>
                        <p>Learn from experienced healthcare professionals and academic experts dedicated to student success.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-building"></i>
                        <h4>Modern Facilities</h4>
                        <p>State-of-the-art laboratories, simulation centers, and learning resources for comprehensive training.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-certificate"></i>
                        <h4>Accredited Programs</h4>
                        <p>All programs are recognized and accredited by relevant healthcare education authorities.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-briefcase"></i>
                        <h4>Career Support</h4>
                        <p>Placement assistance and career guidance to help students secure positions in top healthcare facilities.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-hand-holding-usd"></i>
                        <h4>Scholarships Available</h4>
                        <p>Merit-based and need-based financial assistance for deserving and talented students.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonial-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">What Our Students Say</h2>
                <p class="lead">Hear from our successful alumni and current students</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"Queen's College provided me with excellent education and practical skills. The faculty is supportive and the facilities are top-notch. I'm now working at a prestigious hospital!"</p>
                        <div class="testimonial-author">
                            <div class="author-img">A</div>
                            <div>
                                <strong>Ayesha Khan</strong>
                                <p class="mb-0 text-muted small">Diploma in Nursing, 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"The clinical training and hands-on experience I received at Queen's College was invaluable. It prepared me well for my career in healthcare."</p>
                        <div class="testimonial-author">
                            <div class="author-img">M</div>
                            <div>
                                <strong>Muhammad Ali</strong>
                                <p class="mb-0 text-muted small">Medical Lab Technology, 2022</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"Best decision of my life! The college offers a perfect blend of theoretical knowledge and practical skills. Highly recommend to aspiring healthcare professionals."</p>
                        <div class="testimonial-author">
                            <div class="author-img">S</div>
                            <div>
                                <strong>Sara Ahmed</strong>
                                <p class="mb-0 text-muted small">Current Student, 2024</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="admission">
        <div class="container">
            <h2>Ready to Start Your Healthcare Career?</h2>
            <p class="lead">Join Queen's College and become part of a legacy of excellence in healthcare education</p>
            <a href="#" class="btn btn-light btn-lg mt-3 me-3">Apply Now</a>
            <a href="#contact" class="btn btn-outline-light btn-lg mt-3">Contact Admissions</a>
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
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#programs">Programs</a></li>
                        <li><a href="#admission">Admission</a></li>
                        <li><a href="#facilities">Facilities</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Programs</h5>
                    <ul>
                        <li><a href="#">Diploma in Nursing</a></li>
                        <li><a href="#">Medical Lab Tech</a></li>
                        <li><a href="#">Allied Health Sciences</a></li>
                        <li><a href="#">Pharmacy</a></li>
                        <li><a href="#">All Programs</a></li>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>