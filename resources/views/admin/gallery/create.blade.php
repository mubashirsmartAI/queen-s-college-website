@extends('admin.layout')

@section('title', 'Add New Gallery Item')
@section('page-title', 'Add New Gallery Item')

@section('content')
<div class="page-header">
    <h1 class="page-title">Add New Gallery Item</h1>
    <p class="page-subtitle">Add a new image to Queen's College gallery</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-image me-2"></i>Gallery Information
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

                <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="title" class="form-label">
                                <i class="fas fa-heading me-2"></i>Image Title *
                            </label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}" 
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
                                      placeholder="Describe the image content, location, or event...">{{ old('description') }}</textarea>
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
                                <option value="general" {{ old('category') == 'general' ? 'selected' : '' }}>General</option>
                                <option value="events" {{ old('category') == 'events' ? 'selected' : '' }}>Events</option>
                                <option value="facilities" {{ old('category') == 'facilities' ? 'selected' : '' }}>Facilities</option>
                                <option value="campus" {{ old('category') == 'campus' ? 'selected' : '' }}>Campus</option>
                                <option value="students" {{ old('category') == 'students' ? 'selected' : '' }}>Students</option>
                                <option value="faculty" {{ old('category') == 'faculty' ? 'selected' : '' }}>Faculty</option>
                                <option value="activities" {{ old('category') == 'activities' ? 'selected' : '' }}>Activities</option>
                                <option value="awards" {{ old('category') == 'awards' ? 'selected' : '' }}>Awards</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">
                                <i class="fas fa-camera me-2"></i>Image File *
                            </label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*"
                                   required>
                            <div class="form-text">Supported formats: JPEG, PNG, JPG, GIF, WebP (Max: 5MB)</div>
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
                                       {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    <i class="fas fa-toggle-on me-2"></i>Active Gallery Item
                                </label>
                                <div class="form-text">Uncheck to hide this image from the website gallery</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Gallery
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Add Gallery Item
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
                    <i class="fas fa-info-circle me-2"></i>Gallery Guidelines
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6><i class="fas fa-lightbulb me-2"></i>Image Tips</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• Use high-quality, clear images</li>
                        <li>• Ensure good lighting and composition</li>
                        <li>• Keep file sizes under 5MB</li>
                        <li>• Use descriptive titles</li>
                    </ul>
                </div>
                
                <div class="mb-3">
                    <h6><i class="fas fa-tags me-2"></i>Category Guidelines</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• <strong>General:</strong> General college images</li>
                        <li>• <strong>Events:</strong> Ceremonies, celebrations</li>
                        <li>• <strong>Facilities:</strong> Labs, classrooms, library</li>
                        <li>• <strong>Campus:</strong> Building exteriors, grounds</li>
                        <li>• <strong>Students:</strong> Student activities, groups</li>
                        <li>• <strong>Faculty:</strong> Faculty members, teaching</li>
                        <li>• <strong>Activities:</strong> Sports, clubs, events</li>
                        <li>• <strong>Awards:</strong> Achievements, recognitions</li>
                    </ul>
                </div>
                
                <div class="mb-3">
                    <h6><i class="fas fa-camera me-2"></i>Photo Best Practices</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• Use professional photography when possible</li>
                        <li>• Maintain consistent style and quality</li>
                        <li>• Include diverse representation</li>
                        <li>• Show college life and activities</li>
                    </ul>
                </div>
                
                <div class="alert alert-info">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Note:</strong> All fields marked with * are required. Choose appropriate categories to help organize the gallery effectively.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
