@extends('admin.layout')

@section('title', 'View Gallery Item')
@section('page-title', 'View Gallery Item')

@section('content')
<div class="page-header">
    <h1 class="page-title">Gallery Details</h1>
    <p class="page-subtitle">{{ $gallery->title }}</p>
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
                    <i class="fas fa-image me-2"></i>Gallery Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Image Title</label>
                        <p class="form-control-plaintext">{{ $gallery->title }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Category</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-info">{{ ucfirst($gallery->category) }}</span>
                        </p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-{{ $gallery->is_active ? 'success' : 'danger' }}">
                                {{ $gallery->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Created Date</label>
                        <p class="form-control-plaintext">{{ $gallery->created_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                    
                    @if($gallery->description)
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <div class="form-control-plaintext">
                            {!! nl2br(e($gallery->description)) !!}
                        </div>
                    </div>
                    @endif
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Last Updated</label>
                        <p class="form-control-plaintext">{{ $gallery->updated_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-image me-2"></i>Gallery Image
                </h5>
            </div>
            <div class="card-body text-center">
                @if($gallery->image)
                    <img src="{{ asset('storage/' . $gallery->image) }}" 
                         alt="{{ $gallery->title }}" 
                         class="img-fluid rounded mb-3" 
                         style="max-height: 400px; object-fit: cover;">
                    <p class="text-muted small">{{ $gallery->title }}</p>
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
                    <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Gallery Item
                    </a>
                    
                    <form action="{{ route('admin.gallery.toggle-status', $gallery->id) }}" method="POST" class="d-grid">
                        @csrf
                        <button type="submit" 
                                class="btn btn-{{ $gallery->is_active ? 'secondary' : 'success' }}">
                            <i class="fas fa-{{ $gallery->is_active ? 'pause' : 'play' }} me-2"></i>
                            {{ $gallery->is_active ? 'Deactivate' : 'Activate' }} Gallery Item
                        </button>
                    </form>
                    
                    <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this gallery item? This action cannot be undone.')"
                          class="d-grid">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-2"></i>Delete Gallery Item
                        </button>
                    </form>
                    
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Gallery
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
