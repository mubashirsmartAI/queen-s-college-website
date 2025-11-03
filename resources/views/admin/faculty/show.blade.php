@extends('admin.layout')

@section('title', 'View Faculty Member')
@section('page-title', 'View Faculty Member')

@section('content')
<div class="page-header">
    <h1 class="page-title">Faculty Details</h1>
    <p class="page-subtitle">{{ $faculty->name }}</p>
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
                    <i class="fas fa-chalkboard-teacher me-2"></i>Faculty Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Full Name</label>
                        <p class="form-control-plaintext">{{ $faculty->name }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Designation</label>
                        <p class="form-control-plaintext">{{ $faculty->designation }}</p>
                    </div>
                    
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold">Qualification</label>
                        <div class="form-control-plaintext">
                            {!! nl2br(e($faculty->qualification)) !!}
                        </div>
                    </div>
                    
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold">Experience</label>
                        <div class="form-control-plaintext">
                            {!! nl2br(e($faculty->experience)) !!}
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Specialization</label>
                        <p class="form-control-plaintext">{{ $faculty->specialization }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-{{ $faculty->is_active ? 'success' : 'danger' }}">
                                {{ $faculty->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>
                    
                    @if($faculty->email)
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Email Address</label>
                        <p class="form-control-plaintext">
                            <a href="mailto:{{ $faculty->email }}" class="text-decoration-none">
                                <i class="fas fa-envelope me-2"></i>{{ $faculty->email }}
                            </a>
                        </p>
                    </div>
                    @endif
                    
                    @if($faculty->phone)
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Phone Number</label>
                        <p class="form-control-plaintext">
                            <a href="tel:{{ $faculty->phone }}" class="text-decoration-none">
                                <i class="fas fa-phone me-2"></i>{{ $faculty->phone }}
                            </a>
                        </p>
                    </div>
                    @endif
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Created Date</label>
                        <p class="form-control-plaintext">{{ $faculty->created_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Last Updated</label>
                        <p class="form-control-plaintext">{{ $faculty->updated_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-image me-2"></i>Profile Photo
                </h5>
            </div>
            <div class="card-body text-center">
                @if($faculty->image)
                    <img src="{{ asset('storage/' . $faculty->image) }}" 
                         alt="{{ $faculty->name }}" 
                         class="img-fluid rounded mb-3" 
                         style="max-height: 300px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded mb-3" 
                         style="height: 200px;">
                        <div class="text-center">
                            <i class="fas fa-user fa-3x text-muted mb-2"></i>
                            <p class="text-muted">No photo available</p>
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
                    <a href="{{ route('admin.faculty.edit', $faculty->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Faculty Member
                    </a>
                    
                    <form action="{{ route('admin.faculty.toggle-status', $faculty->id) }}" method="POST" class="d-grid">
                        @csrf
                        <button type="submit" 
                                class="btn btn-{{ $faculty->is_active ? 'secondary' : 'success' }}">
                            <i class="fas fa-{{ $faculty->is_active ? 'pause' : 'play' }} me-2"></i>
                            {{ $faculty->is_active ? 'Deactivate' : 'Activate' }} Faculty Member
                        </button>
                    </form>
                    
                    <form action="{{ route('admin.faculty.destroy', $faculty->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this faculty member? This action cannot be undone.')"
                          class="d-grid">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-2"></i>Delete Faculty Member
                        </button>
                    </form>
                    
                    <a href="{{ route('admin.faculty.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Faculty
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
