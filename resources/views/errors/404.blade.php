@extends('layouts.app')

@section('title', 'Page Not Found - Queen\'s College of Nursing & Allied Health Sciences')
@section('description', 'The page you are looking for could not be found.')

@section('content')
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-1 fw-bold mb-4">404</h1>
                <h2 class="display-4 mb-4">Page Not Found</h2>
                <p class="lead mb-4">The page you are looking for could not be found.</p>
                <a href="{{ route('home') }}" class="btn btn-light btn-lg">Go Home</a>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="card shadow-sm">
                    <div class="card-body p-5">
                        <i class="fas fa-search fa-5x text-muted mb-4"></i>
                        <h3 class="mb-4">What can you do?</h3>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="fas fa-home fa-2x text-primary mb-3"></i>
                                        <h5>Go Home</h5>
                                        <p class="small">Return to our homepage</p>
                                        <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm">Home</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="fas fa-book fa-2x text-primary mb-3"></i>
                                        <h5>Browse Courses</h5>
                                        <p class="small">Explore our programs</p>
                                        <a href="{{ route('courses.index') }}" class="btn btn-outline-primary btn-sm">Courses</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="fas fa-envelope fa-2x text-primary mb-3"></i>
                                        <h5>Contact Us</h5>
                                        <p class="small">Get in touch</p>
                                        <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-sm">Contact</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
