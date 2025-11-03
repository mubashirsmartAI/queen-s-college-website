@extends('layouts.app')

@section('title', 'FAQ - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'Find answers to frequently asked questions about Queen\'s College of Nursing & Allied Health Sciences programs, admission, and facilities.')

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
                    url('{{ asset('slider/faq.jpg') }}') center/cover;
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

    .faq-item {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-bottom: 1.5rem;
        overflow: hidden;
    }

    .faq-question {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 1.5rem;
        margin: 0;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .faq-question:hover {
        background: linear-gradient(135deg, #c82333, #0b5ed7);
    }

    .faq-answer {
        padding: 1.5rem;
        color: #6c757d;
        margin: 0;
        border-top: 1px solid #e9ecef;
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
                <h1>Frequently Asked Questions</h1>
                <p class="lead">Get Answers to Your Questions</p>
                <p>Find answers to the most commonly asked questions about our programs, admission process, facilities, and student life at Queen's College of Nursing & Allied Health Sciences.</p>
                <div class="hero-features mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-question-circle"></i>
                                <span>Quick Answers</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-info-circle"></i>
                                <span>Detailed Information</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-phone"></i>
                                <span>Personal Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Common Questions</h2>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="faq-item">
                    <h5 class="faq-question">What are the admission requirements for nursing programs?</h5>
                    <p class="faq-answer">For Diploma in General Nursing, you need Matriculation (10th Grade) with minimum 50% marks. For BSN, you need Intermediate (12th Grade) with Science subjects and minimum 60% marks. All programs require passing our entrance examination.</p>
                </div>
                
                <div class="faq-item">
                    <h5 class="faq-question">What is the duration of the nursing programs?</h5>
                    <p class="faq-answer">Diploma in General Nursing is 3 years, BSN is 4 years, Post Graduate Diploma is 1 year, Community Health Nursing and Midwifery are 2 years each, and Critical Care Nursing is 1 year.</p>
                </div>
                
                <div class="faq-item">
                    <h5 class="faq-question">Are scholarships available for students?</h5>
                    <p class="faq-answer">Yes, we offer merit-based scholarships (up to 50% fee waiver), need-based scholarships (up to 75% fee waiver), sports scholarships (up to 30% fee waiver), and excellence scholarships (100% fee waiver) for deserving students.</p>
                </div>
                
                <div class="faq-item">
                    <h5 class="faq-question">What facilities are available at the college?</h5>
                    <p class="faq-answer">We have a well-stocked library, modern laboratories, computer lab, clinical training facilities, smart classrooms, and emergency training facilities with state-of-the-art equipment.</p>
                </div>
                
                <div class="faq-item">
                    <h5 class="faq-question">Is the college recognized by relevant authorities?</h5>
                    <p class="faq-answer">Yes, Queen's College is recognized by the Pakistan Nursing Council (PNC) and follows all regulatory requirements for nursing education in Pakistan.</p>
                </div>
                
                <div class="faq-item">
                    <h5 class="faq-question">What are the career opportunities after graduation?</h5>
                    <p class="faq-answer">Graduates can work in hospitals, clinics, home healthcare, educational institutions, emergency services, and private practice. They can also pursue higher education and specialized training.</p>
                </div>
                
                <div class="faq-item">
                    <h5 class="faq-question">How can I apply for admission?</h5>
                    <p class="faq-answer">You can apply online through our website, visit our campus, or contact our admissions office. The application process includes filling out the form, submitting required documents, and appearing for the entrance examination.</p>
                </div>
                
                <div class="faq-item">
                    <h5 class="faq-question">What is the fee structure for different programs?</h5>
                    <p class="faq-answer">Fees range from Rs. 80,000 for Critical Care Nursing to Rs. 200,000 for BSN. All fees can be paid in installments as per the semester schedule. Detailed fee structure is available in our prospectus.</p>
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
                <h2 class="mb-4">Still Have Questions?</h2>
                <p class="lead">Contact our admissions office for personalized assistance and detailed information.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Contact Us</a>
            </div>
        </div>
    </div>
</section>
@endsection
