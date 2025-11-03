@extends('admin.layout')

@section('title', 'View Facility')
@section('page-title', 'View Facility')

@section('content')
<div class="page-header">
    <h1 class="page-title">Facility Details</h1>
    <p class="page-subtitle">{{ $facility->name }}</p>
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
                    <i class="fas fa-building me-2"></i>Facility Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Facility Name</label>
                        <p class="form-control-plaintext">{{ $facility->name }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-{{ $facility->is_active ? 'success' : 'danger' }}">
                                {{ $facility->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>
                    
                    @if($facility->icon)
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Icon</label>
                        <p class="form-control-plaintext">
                            <i class="{{ $facility->icon }} fa-2x text-primary me-2"></i>
                            <code>{{ $facility->icon }}</code>
                        </p>
                    </div>
                    @endif
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Created Date</label>
                        <p class="form-control-plaintext">{{ $facility->created_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                    
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <div class="form-control-plaintext">
                            {!! nl2br(e($facility->description)) !!}
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Last Updated</label>
                        <p class="form-control-plaintext">{{ $facility->updated_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-image me-2"></i>Facility Image
                </h5>
            </div>
            <div class="card-body text-center">
                @if($facility->image)
                    <img src="{{ asset('storage/' . $facility->image) }}" 
                         alt="{{ $facility->name }}" 
                         class="img-fluid rounded mb-3" 
                         style="max-height: 300px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded mb-3" 
                         style="height: 200px;">
                        <div class="text-center">
                            <i class="fas fa-building fa-3x text-muted mb-2"></i>
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
                    <a href="{{ route('admin.facilities.edit', $facility->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Facility
                    </a>
                    
                    <form action="{{ route('admin.facilities.toggle-status', $facility->id) }}" method="POST" class="d-grid">
                        @csrf
                        <button type="submit" 
                                class="btn btn-{{ $facility->is_active ? 'secondary' : 'success' }}">
                            <i class="fas fa-{{ $facility->is_active ? 'pause' : 'play' }} me-2"></i>
                            {{ $facility->is_active ? 'Deactivate' : 'Activate' }} Facility
                        </button>
                    </form>
                    
                    <form action="{{ route('admin.facilities.destroy', $facility->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this facility? This action cannot be undone.')"
                          class="d-grid">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-2"></i>Delete Facility
                        </button>
                    </form>
                    
                    <a href="{{ route('admin.facilities.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Facilities
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
