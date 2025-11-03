@extends('layouts.app')

@section('title', 'Principal Message - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'Message from Professor Ghulam Rasool Soomro, Founder and Principal of Queen\'s College of Nursing & Allied Health Sciences.')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">Principal's Message</h1>
                <p class="lead">Words from our Founder and Principal</p>
            </div>
        </div>
    </div>
</section>

<!-- Principal Message -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body p-5">
                        <div class="row mb-4">
                            <div class="col-md-4 text-center">
                                <img src="{{ asset('college-logo.jpg') }}" alt="Professor Ghulam Rasool Soomro" class="img-fluid rounded shadow mb-3" style="max-height: 200px;">
                                <h4>Professor Ghulam Rasool Soomro</h4>
                                <p class="text-muted">Founder & Principal</p>
                            </div>
                            <div class="col-md-8">
                                <h2 class="mb-4">A Message from the Principal</h2>
                                <p class="lead">Welcome to Queen's College of Nursing & Allied Health Sciences</p>
                            </div>
                        </div>

                        <div class="message-content">
                            <p>Dear Students, Parents, and Community Members,</p>
                            
                            <p>It is with great pleasure and pride that I welcome you to Queen's College of Nursing & Allied Health Sciences. As the founder and principal of this esteemed institution, I am honored to share our vision and commitment to excellence in nursing education.</p>

                            <p>Our college was established with a clear mission: to provide world-class nursing education that combines theoretical knowledge with practical skills, preparing our students to become competent, compassionate, and professional healthcare providers.</p>

                            <h4 class="mt-4 mb-3">Our Commitment to Excellence</h4>
                            <p>At Queen's College, we believe that nursing is not just a profession but a calling. Our curriculum is designed to instill in our students the values of compassion, integrity, and professional excellence. We are committed to providing:</p>

                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Comprehensive theoretical knowledge in nursing sciences</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Hands-on clinical training in modern healthcare facilities</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Professional development and leadership skills</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Ethical practice and patient-centered care</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Research and evidence-based practice</li>
                            </ul>

                            <h4 class="mt-4 mb-3">Our Faculty and Facilities</h4>
                            <p>We are proud to have a team of highly qualified and experienced faculty members who are dedicated to student success. Our state-of-the-art facilities include modern classrooms, well-equipped laboratories, and clinical training areas that provide students with the best possible learning environment.</p>

                            <h4 class="mt-4 mb-3">Community Impact</h4>
                            <p>Our graduates are making a significant impact in healthcare settings across Pakistan and beyond. They are known for their clinical competence, professional integrity, and compassionate care. We take pride in the fact that our alumni are serving in hospitals, clinics, and healthcare organizations, making a difference in the lives of countless patients.</p>

                            <h4 class="mt-4 mb-3">Looking Forward</h4>
                            <p>As we continue to grow and evolve, we remain committed to maintaining the highest standards of education and training. We are constantly updating our curriculum to reflect the latest developments in nursing practice and healthcare technology.</p>

                            <p>I invite you to join us in this journey of excellence. Whether you are a prospective student, parent, or community member, I encourage you to explore what Queen's College has to offer.</p>

                            <p>Together, we can build a healthier future for our communities through quality nursing education and professional healthcare services.</p>

                            <div class="mt-5 pt-4 border-top">
                                <p class="mb-1"><strong>Professor Ghulam Rasool Soomro</strong></p>
                                <p class="mb-1">Founder & Principal</p>
                                <p class="mb-0">Queen's College of Nursing & Allied Health Sciences</p>
                                <p class="mb-0">Khairpur Campus</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="mb-4">Ready to Start Your Nursing Journey?</h2>
                <p class="lead mb-4">Join Queen's College and become part of our community of healthcare professionals.</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('admission.index') }}" class="btn btn-primary btn-lg">Apply Now</a>
                    <a href="{{ route('courses.index') }}" class="btn btn-outline-primary btn-lg">View Courses</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
