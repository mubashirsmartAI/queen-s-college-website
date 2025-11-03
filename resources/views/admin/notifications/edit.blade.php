@extends('admin.layout')

@section('title', 'Edit Notification')
@section('page-title', 'Edit Notification')

@section('content')
<div class="page-header">
    <h1 class="page-title">Edit Notification</h1>
    <p class="page-subtitle">Update information for {{ $notification->title }}</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-edit me-2"></i>Notification Information
                </h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h6><i class="fas fa-exclamation-triangle me-2"></i>Please fix the following errors:</h6>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.notifications.update', $notification->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="title" class="form-label">
                                <i class="fas fa-heading me-2"></i>Notification Title *
                            </label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $notification->title) }}" 
                                   placeholder="e.g., Admission Open for Spring 2024, Exam Schedule Released"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="content" class="form-label">
                                <i class="fas fa-align-left me-2"></i>Notification Content *
                            </label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" 
                                      name="content" 
                                      rows="5" 
                                      placeholder="Enter the detailed content of the notification..."
                                      required>{{ old('content', $notification->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="type" class="form-label">
                                <i class="fas fa-tags me-2"></i>Notification Type *
                            </label>
                            <select class="form-select @error('type') is-invalid @enderror" 
                                    id="type" 
                                    name="type" 
                                    required>
                                <option value="">Select Type</option>
                                <option value="general" {{ old('type', $notification->type) == 'general' ? 'selected' : '' }}>General</option>
                                <option value="admission" {{ old('type', $notification->type) == 'admission' ? 'selected' : '' }}>Admission</option>
                                <option value="exam" {{ old('type', $notification->type) == 'exam' ? 'selected' : '' }}>Exam</option>
                                <option value="event" {{ old('type', $notification->type) == 'event' ? 'selected' : '' }}>Event</option>
                                <option value="holiday" {{ old('type', $notification->type) == 'holiday' ? 'selected' : '' }}>Holiday</option>
                                <option value="academic" {{ old('type', $notification->type) == 'academic' ? 'selected' : '' }}>Academic</option>
                                <option value="fee" {{ old('type', $notification->type) == 'fee' ? 'selected' : '' }}>Fee</option>
                                <option value="result" {{ old('type', $notification->type) == 'result' ? 'selected' : '' }}>Result</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="publish_date" class="form-label">
                                <i class="fas fa-calendar me-2"></i>Publish Date *
                            </label>
                            <input type="date" 
                                   class="form-control @error('publish_date') is-invalid @enderror" 
                                   id="publish_date" 
                                   name="publish_date" 
                                   value="{{ old('publish_date', $notification->publish_date->format('Y-m-d')) }}" 
                                   required>
                            @error('publish_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="expiry_date" class="form-label">
                                <i class="fas fa-calendar-times me-2"></i>Expiry Date
                            </label>
                            <input type="date" 
                                   class="form-control @error('expiry_date') is-invalid @enderror" 
                                   id="expiry_date" 
                                   name="expiry_date" 
                                   value="{{ old('expiry_date', $notification->expiry_date ? $notification->expiry_date->format('Y-m-d') : '') }}">
                            <div class="form-text">Leave empty for no expiry date</div>
                            @error('expiry_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="is_active" 
                                       name="is_active" 
                                       value="1" 
                                       {{ old('is_active', $notification->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    <i class="fas fa-toggle-on me-2"></i>Active Notification
                                </label>
                                <div class="form-text">Uncheck to hide this notification from the website</div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="is_featured" 
                                       name="is_featured" 
                                       value="1" 
                                       {{ old('is_featured', $notification->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    <i class="fas fa-star me-2"></i>Featured Notification
                                </label>
                                <div class="form-text">Check to display this notification prominently on the website</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.notifications.show', $notification->id) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Notification
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Notification
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-info-circle me-2"></i>Notification Statistics
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
                        <span>Created:</span>
                        <span class="text-muted">{{ $notification->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Last Updated:</span>
                        <span class="text-muted">{{ $notification->updated_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
