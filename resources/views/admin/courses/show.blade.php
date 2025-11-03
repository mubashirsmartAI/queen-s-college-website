@extends('admin.layout')

@section('title', 'View Course')
@section('page-title', 'View Course')

@section('content')
<div class="page-header">
    <h1 class="page-title">Course Details</h1>
    <p class="page-subtitle">{{ $course->title }}</p>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-graduation-cap me-2"></i>Course Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Course Title</label>
                        <p class="form-control-plaintext">{{ $course->title }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Duration</label>
                        <p class="form-control-plaintext">{{ $course->duration }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Course Fee</label>
                        <p class="form-control-plaintext">Rs. {{ number_format($course->fee) }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-{{ $course->is_active ? 'success' : 'danger' }}">
                                {{ $course->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>
                    
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold">Eligibility Criteria</label>
                        <p class="form-control-plaintext">{{ $course->eligibility }}</p>
                    </div>
                    
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold">Course Description</label>
                        <div class="form-control-plaintext">
                            {!! nl2br(e($course->description)) !!}
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Created Date</label>
                        <p class="form-control-plaintext">{{ $course->created_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Last Updated</label>
                        <p class="form-control-plaintext">{{ $course->updated_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-image me-2"></i>Course Image
                </h5>
            </div>
            <div class="card-body text-center">
                @if($course->image)
                    <img src="{{ $course->image_url }}" 
                         alt="{{ $course->title }}" 
                         class="img-fluid rounded mb-3" 
                         style="max-height: 300px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded mb-3" 
                         style="height: 200px;">
                        <div class="text-center">
                            <i class="fas fa-image fa-3x text-muted mb-2"></i>
                            <p class="text-muted">No image available</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-tools me-2"></i>Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Course
                    </a>
                    
                    <form action="{{ route('admin.courses.toggle-status', $course->id) }}" method="POST" class="d-grid">
                        @csrf
                        <button type="submit" 
                                class="btn btn-{{ $course->is_active ? 'secondary' : 'success' }}">
                            <i class="fas fa-{{ $course->is_active ? 'pause' : 'play' }} me-2"></i>
                            {{ $course->is_active ? 'Deactivate' : 'Activate' }} Course
                        </button>
                    </form>
                    
                    <form action="{{ route('admin.courses.destroy', $course->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this course? This action cannot be undone.')"
                          class="d-grid">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-2"></i>Delete Course
                        </button>
                    </form>
                    
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Courses
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
