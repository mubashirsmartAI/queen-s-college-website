@extends('admin.layout')

@section('title', 'Edit Facility')
@section('page-title', 'Edit Facility')

@section('content')
<div class="page-header">
    <h1 class="page-title">Edit Facility</h1>
    <p class="page-subtitle">Update information for {{ $facility->name }}</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-edit me-2"></i>Facility Information
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

                <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-building me-2"></i>Facility Name *
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $facility->name) }}" 
                                   placeholder="e.g., Modern Library, Computer Lab, Medical Lab, Sports Complex"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">
                                <i class="fas fa-align-left me-2"></i>Facility Description *
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      placeholder="Describe the facility, its features, capacity, and benefits to students..."
                                      required>{{ old('description', $facility->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="icon" class="form-label">
                                <i class="fas fa-icons me-2"></i>Icon Class
                            </label>
                            <input type="text" 
                                   class="form-control @error('icon') is-invalid @enderror" 
                                   id="icon" 
                                   name="icon" 
                                   value="{{ old('icon', $facility->icon) }}" 
                                   placeholder="e.g., fas fa-book, fas fa-laptop, fas fa-microscope">
                            <div class="form-text">FontAwesome icon class (e.g., fas fa-book, fas fa-laptop)</div>
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">
                                <i class="fas fa-image me-2"></i>Facility Image
                            </label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*">
                            <div class="form-text">Leave empty to keep current image. Recommended size: 800x600px. Supported formats: JPEG, PNG, JPG, GIF, WebP (Max: 5MB)</div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="is_active" 
                                       name="is_active" 
                                       value="1" 
                                       {{ old('is_active', $facility->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    <i class="fas fa-toggle-on me-2"></i>Active Facility
                                </label>
                                <div class="form-text">Uncheck to hide this facility from the website</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.facilities.show', $facility->id) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Facility
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Facility
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
                    <i class="fas fa-image me-2"></i>Current Image
                </h5>
            </div>
            <div class="card-body text-center">
                @if($facility->image)
                    <img src="{{ asset('storage/' . $facility->image) }}" 
                         alt="{{ $facility->name }}" 
                         class="img-fluid rounded mb-3" 
                         style="max-height: 200px; object-fit: cover;">
                    <p class="text-muted small">Current facility image</p>
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded mb-3" 
                         style="height: 150px;">
                        <div class="text-center">
                            <i class="fas fa-building fa-2x text-muted mb-2"></i>
                            <p class="text-muted small">No image currently set</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-info-circle me-2"></i>Facility Statistics
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Status:</span>
                        <span class="badge bg-{{ $facility->is_active ? 'success' : 'danger' }}">
                            {{ $facility->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
                
                @if($facility->icon)
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Icon:</span>
                        <div>
                            <i class="{{ $facility->icon }} text-primary me-2"></i>
                            <code class="small">{{ $facility->icon }}</code>
                        </div>
                    </div>
                </div>
                @endif
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Created:</span>
                        <span class="text-muted">{{ $facility->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Last Updated:</span>
                        <span class="text-muted">{{ $facility->updated_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
