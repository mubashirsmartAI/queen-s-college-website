@extends('admin.layout')

@section('title', 'Edit Course')
@section('page-title', 'Edit Course')

@section('content')
<div class="page-header">
    <h1 class="page-title">Edit Course</h1>
    <p class="page-subtitle">Update course information for {{ $course->title }}</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-edit me-2"></i>Course Information
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

                <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="title" class="form-label">
                                <i class="fas fa-graduation-cap me-2"></i>Course Title *
                            </label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $course->title) }}" 
                                   placeholder="e.g., Diploma in General Nursing"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">
                                <i class="fas fa-align-left me-2"></i>Course Description *
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="5" 
                                      placeholder="Describe the course content, objectives, and what students will learn..."
                                      required>{{ old('description', $course->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="duration" class="form-label">
                                <i class="fas fa-clock me-2"></i>Duration *
                            </label>
                            <input type="text" 
                                   class="form-control @error('duration') is-invalid @enderror" 
                                   id="duration" 
                                   name="duration" 
                                   value="{{ old('duration', $course->duration) }}" 
                                   placeholder="e.g., 3 Years, 2 Years, 1 Year"
                                   required>
                            @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="fee" class="form-label">
                                <i class="fas fa-rupee-sign me-2"></i>Course Fee (PKR) *
                            </label>
                            <input type="number" 
                                   class="form-control @error('fee') is-invalid @enderror" 
                                   id="fee" 
                                   name="fee" 
                                   value="{{ old('fee', $course->fee) }}" 
                                   placeholder="150000"
                                   min="0" 
                                   step="0.01"
                                   required>
                            @error('fee')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="eligibility" class="form-label">
                                <i class="fas fa-user-check me-2"></i>Eligibility Criteria *
                            </label>
                            <input type="text" 
                                   class="form-control @error('eligibility') is-invalid @enderror" 
                                   id="eligibility" 
                                   name="eligibility" 
                                   value="{{ old('eligibility', $course->eligibility) }}" 
                                   placeholder="e.g., Matriculation (10th Grade) with minimum 50% marks"
                                   required>
                            @error('eligibility')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="image" class="form-label">
                                <i class="fas fa-image me-2"></i>Course Image
                            </label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*">
                            <div class="form-text">Leave empty to keep current image. Recommended size: 400x300px. Supported formats: JPEG, PNG, JPG, GIF, WebP (Max: 2MB)</div>
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
                                       {{ old('is_active', $course->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    <i class="fas fa-toggle-on me-2"></i>Active Course
                                </label>
                                <div class="form-text">Uncheck to hide this course from the website</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Course
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Course
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
                @if($course->image)
                    <img src="{{ asset($course->image) }}" 
                         alt="{{ $course->title }}" 
                         class="img-fluid rounded mb-3" 
                         style="max-height: 200px; object-fit: cover;">
                    <p class="text-muted small">Current course image</p>
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
                    <i class="fas fa-info-circle me-2"></i>Course Statistics
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Status:</span>
                        <span class="badge bg-{{ $course->is_active ? 'success' : 'danger' }}">
                            {{ $course->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Created:</span>
                        <span class="text-muted">{{ $course->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Last Updated:</span>
                        <span class="text-muted">{{ $course->updated_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
