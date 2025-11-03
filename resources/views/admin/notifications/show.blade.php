@extends('admin.layout')

@section('title', 'View Notification')
@section('page-title', 'View Notification')

@section('content')
<div class="page-header">
    <h1 class="page-title">Notification Details</h1>
    <p class="page-subtitle">{{ $notification->title }}</p>
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
                    <i class="fas fa-bell me-2"></i>Notification Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Notification Title</label>
                        <p class="form-control-plaintext">{{ $notification->title }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Type</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-{{ $notification->type === 'general' ? 'primary' : ($notification->type === 'admission' ? 'success' : ($notification->type === 'exam' ? 'warning' : 'info')) }}">
                                {{ ucfirst($notification->type) }}
                            </span>
                        </p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Publish Date</label>
                        <p class="form-control-plaintext">{{ $notification->publish_date->format('M d, Y') }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Expiry Date</label>
                        <p class="form-control-plaintext">
                            @if($notification->expiry_date)
                                {{ $notification->expiry_date->format('M d, Y') }}
                            @else
                                <span class="text-muted">No expiry date set</span>
                            @endif
                        </p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-{{ $notification->is_active ? 'success' : 'danger' }}">
                                {{ $notification->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Featured</label>
                        <p class="form-control-plaintext">
                            @if($notification->is_featured)
                                <span class="badge bg-warning">
                                    <i class="fas fa-star me-1"></i>Featured
                                </span>
                            @else
                                <span class="text-muted">Not featured</span>
                            @endif
                        </p>
                    </div>
                    
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold">Content</label>
                        <div class="form-control-plaintext">
                            {!! nl2br(e($notification->content)) !!}
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Created Date</label>
                        <p class="form-control-plaintext">{{ $notification->created_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Last Updated</label>
                        <p class="form-control-plaintext">{{ $notification->updated_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-info-circle me-2"></i>Notification Status
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Status:</span>
                        <span class="badge bg-{{ $notification->is_active ? 'success' : 'danger' }}">
                            {{ $notification->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Featured:</span>
                        @if($notification->is_featured)
                            <span class="badge bg-warning">
                                <i class="fas fa-star me-1"></i>Featured
                            </span>
                        @else
                            <span class="text-muted">Not featured</span>
                        @endif
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Type:</span>
                        <span class="badge bg-{{ $notification->type === 'general' ? 'primary' : ($notification->type === 'admission' ? 'success' : ($notification->type === 'exam' ? 'warning' : 'info')) }}">
                            {{ ucfirst($notification->type) }}
                        </span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Published:</span>
                        <span class="text-muted">{{ $notification->publish_date->format('M d, Y') }}</span>
                    </div>
                </div>
                
                @if($notification->expiry_date)
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Expires:</span>
                        <span class="text-muted">{{ $notification->expiry_date->format('M d, Y') }}</span>
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
                    <a href="{{ route('admin.notifications.edit', $notification->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Notification
                    </a>
                    
                    <form action="{{ route('admin.notifications.toggle-status', $notification->id) }}" method="POST" class="d-grid">
                        @csrf
                        <button type="submit" 
                                class="btn btn-{{ $notification->is_active ? 'secondary' : 'success' }}">
                            <i class="fas fa-{{ $notification->is_active ? 'pause' : 'play' }} me-2"></i>
                            {{ $notification->is_active ? 'Deactivate' : 'Activate' }} Notification
                        </button>
                    </form>
                    
                    <form action="{{ route('admin.notifications.toggle-featured', $notification->id) }}" method="POST" class="d-grid">
                        @csrf
                        <button type="submit" 
                                class="btn btn-{{ $notification->is_featured ? 'secondary' : 'warning' }}">
                            <i class="fas fa-star me-2"></i>
                            {{ $notification->is_featured ? 'Remove from Featured' : 'Add to Featured' }}
                        </button>
                    </form>
                    
                    <form action="{{ route('admin.notifications.destroy', $notification->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this notification? This action cannot be undone.')"
                          class="d-grid">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-2"></i>Delete Notification
                        </button>
                    </form>
                    
                    <a href="{{ route('admin.notifications.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Notifications
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
