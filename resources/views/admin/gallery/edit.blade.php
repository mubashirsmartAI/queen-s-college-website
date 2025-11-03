@extends('admin.layout')

@section('title', 'Edit Gallery Item')
@section('page-title', 'Edit Gallery Item')

@section('content')
<div class="page-header">
    <h1 class="page-title">Edit Gallery Item</h1>
    <p class="page-subtitle">Update information for {{ $gallery->title }}</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-edit me-2"></i>Gallery Information
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

                <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="title" class="form-label">
                                <i class="fas fa-heading me-2"></i>Image Title *
                            </label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $gallery->title) }}" 
                                   placeholder="e.g., College Campus View, Medical Lab, Student Activities"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">
                                <i class="fas fa-align-left me-2"></i>Description
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="3" 
                                      placeholder="Describe the image content, location, or event...">{{ old('description', $gallery->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">
                                <i class="fas fa-tags me-2"></i>Category *
                            </label>
                            <select class="form-select @error('category') is-invalid @enderror" 
                                    id="category" 
                                    name="category" 
                                    required>
                                <option value="">Select Category</option>
                                <option value="general" {{ old('category', $gallery->category) == 'general' ? 'selected' : '' }}>General</option>
                                <option value="events" {{ old('category', $gallery->category) == 'events' ? 'selected' : '' }}>Events</option>
                                <option value="facilities" {{ old('category', $gallery->category) == 'facilities' ? 'selected' : '' }}>Facilities</option>
                                <option value="campus" {{ old('category', $gallery->category) == 'campus' ? 'selected' : '' }}>Campus</option>
                                <option value="students" {{ old('category', $gallery->category) == 'students' ? 'selected' : '' }}>Students</option>
                                <option value="faculty" {{ old('category', $gallery->category) == 'faculty' ? 'selected' : '' }}>Faculty</option>
                                <option value="activities" {{ old('category', $gallery->category) == 'activities' ? 'selected' : '' }}>Activities</option>
                                <option value="awards" {{ old('category', $gallery->category) == 'awards' ? 'selected' : '' }}>Awards</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">
                                <i class="fas fa-camera me-2"></i>Image File
                            </label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*">
                            <div class="form-text">Leave empty to keep current image. Supported formats: JPEG, PNG, JPG, GIF, WebP (Max: 5MB)</div>
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
                                       {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    <i class="fas fa-toggle-on me-2"></i>Active Gallery Item
                                </label>
                                <div class="form-text">Uncheck to hide this image from the website gallery</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.gallery.show', $gallery->id) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Gallery Item
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Gallery Item
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
                @if($gallery->image)
                    <img src="{{ asset('storage/' . $gallery->image) }}" 
                         alt="{{ $gallery->title }}" 
                         class="img-fluid rounded mb-3" 
                         style="max-height: 200px; object-fit: cover;">
                    <p class="text-muted small">Current gallery image</p>
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded mb-3" 
                         style="height: 150px;">
                        <div class="text-center">
                            <i class="fas fa-image fa-2x text-muted mb-2"></i>
                            <p class="text-muted small">No image currently set</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-info-circle me-2"></i>Gallery Statistics
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Status:</span>
                        <span class="badge bg-{{ $gallery->is_active ? 'success' : 'danger' }}">
                            {{ $gallery->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Category:</span>
                        <span class="badge bg-info">{{ ucfirst($gallery->category) }}</span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Created:</span>
                        <span class="text-muted">{{ $gallery->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Last Updated:</span>
                        <span class="text-muted">{{ $gallery->updated_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
