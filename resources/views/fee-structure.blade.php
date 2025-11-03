@extends('layouts.app')

@section('title', 'Fee Structure - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'View our comprehensive fee structure for all nursing and allied health programs at Queen\'s College.')

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
                    url('{{ asset('slider/slide2.jpg') }}') center/cover;
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

    .fee-table {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .fee-table table {
        margin-bottom: 0;
    }

    .fee-table thead {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
    }

    .fee-table th {
        border: none;
        padding: 1.5rem;
        font-weight: 600;
        text-align: center;
    }

    .fee-table td {
        border: none;
        padding: 1.5rem;
        text-align: center;
        vertical-align: middle;
    }

    .fee-table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .fee-table tbody tr:hover {
        background-color: #e9ecef;
    }

    .course-name {
        font-weight: 600;
        color: var(--dark-color);
    }

    .fee-amount {
        font-weight: 700;
        color: var(--primary-color);
        font-size: 1.1rem;
    }

    .duration {
        color: #6c757d;
        font-weight: 500;
    }

    .info-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .info-card h5 {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .info-card p {
        color: #6c757d;
        margin-bottom: 0;
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
        
        .fee-table th,
        .fee-table td {
            padding: 1rem 0.5rem;
            font-size: 0.9rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 hero-content">
                <h1>Fee Structure</h1>
                <p class="lead">Transparent and Affordable Education for All</p>
                <p>Queen's College of Nursing & Allied Health Sciences offers competitive and transparent fee structures for all our programs. We believe in making quality healthcare education accessible to deserving students.</p>
                <div class="hero-features mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-dollar-sign"></i>
                                <span>Affordable Fees</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-graduation-cap"></i>
                                <span>Quality Education</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <i class="fas fa-hand-holding-heart"></i>
                                <span>Scholarships Available</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fee Structure Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Program Fees</h2>
        
        <div class="fee-table">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Program</th>
                        <th>Duration</th>
                        <th>Total Fee</th>
                        <th>Installments</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                    <tr>
                        <td class="course-name">{{ $course->title }}</td>
                        <td class="duration">{{ $course->duration }}</td>
                        <td class="fee-amount">Rs. {{ number_format($course->fee) }}</td>
                        <td>
                            @php
                                // Calculate installments based on duration
                                // Extract number from duration string (e.g., "3 Years" -> 3)
                                preg_match('/(\d+)/', $course->duration, $matches);
                                $years = isset($matches[1]) ? (int)$matches[1] : 1;
                                $installments = $years * 2; // 2 semesters per year
                            @endphp
                            {{ $installments }} Semesters
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            <i class="fas fa-info-circle me-2"></i>No courses available at the moment.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="info-card">
                    <h5><i class="fas fa-info-circle me-2"></i>Payment Information</h5>
                    <p>Fees can be paid in installments as per the semester schedule. We accept bank transfers, cash payments, and other convenient payment methods.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-card">
                    <h5><i class="fas fa-gift me-2"></i>Scholarships & Financial Aid</h5>
                    <p>Merit-based scholarships and financial aid are available for deserving students. Contact our admissions office for more information.</p>
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
                <h2 class="mb-4">Ready to Start Your Journey?</h2>
                <p class="lead">Apply now and take the first step towards a rewarding career in healthcare.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admission.index') }}" class="btn btn-light btn-lg">Apply Now</a>
            </div>
        </div>
    </div>
</section>
@endsection
