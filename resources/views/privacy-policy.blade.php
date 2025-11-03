@extends('layouts.app')

@section('title', 'Privacy Policy - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'Read our privacy policy to understand how Queen\'s College of Nursing & Allied Health Sciences collects, uses, and protects your personal information.')

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
                    url('{{ asset('slider/privacy.jpg') }}') center/cover;
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

    .policy-content {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        padding: 3rem;
        margin-bottom: 2rem;
    }

    .policy-content h3 {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 1.5rem;
        margin-top: 2rem;
    }

    .policy-content h3:first-child {
        margin-top: 0;
    }

    .policy-content p {
        color: #6c757d;
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }

    .policy-content ul {
        color: #6c757d;
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }

    .policy-content li {
        margin-bottom: 0.5rem;
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
        
        .policy-content {
            padding: 2rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 hero-content">
                <h1>Privacy Policy</h1>
                <p class="lead">Your Privacy and Data Protection</p>
                <p>Queen's College of Nursing & Allied Health Sciences is committed to protecting your privacy and ensuring the security of your personal information. This policy outlines how we collect, use, and safeguard your data.</p>
                <div class="hero-features mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt"></i>
                                <span>Data Protection</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-lock"></i>
                                <span>Secure Information</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-user-shield"></i>
                                <span>Your Rights</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Privacy Policy Content -->
<section class="py-5">
    <div class="container">
        <div class="policy-content">
            <h3>Information We Collect</h3>
            <p>We collect information that you provide directly to us, such as when you:</p>
            <ul>
                <li>Fill out admission applications</li>
                <li>Contact us through our website or phone</li>
                <li>Register for events or programs</li>
                <li>Subscribe to our newsletter</li>
            </ul>
            <p>The information we collect may include your name, email address, phone number, educational background, and other relevant details necessary for our services.</p>

            <h3>How We Use Your Information</h3>
            <p>We use the information we collect to:</p>
            <ul>
                <li>Process your admission applications</li>
                <li>Provide educational services and support</li>
                <li>Send you important updates and notifications</li>
                <li>Improve our programs and services</li>
                <li>Comply with legal and regulatory requirements</li>
            </ul>

            <h3>Information Sharing</h3>
            <p>We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except:</p>
            <ul>
                <li>When required by law or legal process</li>
                <li>To protect our rights and property</li>
                <li>With trusted service providers who assist in our operations</li>
                <li>In case of emergency to protect health and safety</li>
            </ul>

            <h3>Data Security</h3>
            <p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. This includes:</p>
            <ul>
                <li>Secure data transmission and storage</li>
                <li>Regular security assessments and updates</li>
                <li>Limited access to personal information</li>
                <li>Staff training on data protection</li>
            </ul>

            <h3>Your Rights</h3>
            <p>You have the right to:</p>
            <ul>
                <li>Access your personal information</li>
                <li>Correct inaccurate information</li>
                <li>Request deletion of your information</li>
                <li>Opt-out of communications</li>
                <li>Withdraw consent for data processing</li>
            </ul>

            <h3>Cookies and Tracking</h3>
            <p>Our website may use cookies to enhance your browsing experience and collect anonymous usage statistics. You can disable cookies in your browser settings, but this may affect website functionality.</p>

            <h3>Third-Party Links</h3>
            <p>Our website may contain links to third-party websites. We are not responsible for the privacy practices of these external sites. We encourage you to review their privacy policies.</p>

            <h3>Updates to This Policy</h3>
            <p>We may update this privacy policy from time to time. We will notify you of any significant changes by posting the new policy on our website and updating the "Last Updated" date.</p>

            <h3>Contact Us</h3>
            <p>If you have any questions about this privacy policy or our data practices, please contact us at:</p>
            <ul>
                <li>Email: info@queenscollege.edu.pk</li>
                <li>Phone: 0243-685370</li>
                <li>Address: Areesha Colony, 1st Street, Main Civil Hospital Rd, Khairpur, Pakistan</li>
            </ul>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-4">Questions About Our Privacy Policy?</h2>
                <p class="lead">Contact us if you have any concerns or questions about how we handle your personal information.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Contact Us</a>
            </div>
        </div>
    </div>
</section>
@endsection
