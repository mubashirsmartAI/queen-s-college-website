@extends('admin.layout')

@section('title', 'Add New Course')
@section('page-title', 'Add New Course')

@section('content')
<div class="page-header">
    <h1 class="page-title">Add New Course</h1>
    <p class="page-subtitle">Create a new course for Queen's College</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-plus me-2"></i>Course Information
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

                <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="title" class="form-label">
                                <i class="fas fa-graduation-cap me-2"></i>Course Title *
                            </label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}" 
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
                                      required>{{ old('description') }}</textarea>
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
                                   value="{{ old('duration') }}" 
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
                                   value="{{ old('fee') }}" 
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
                                   value="{{ old('eligibility') }}" 
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
                            <div class="form-text">Recommended size: 400x300px. Supported formats: JPEG, PNG, JPG, GIF, WebP (Max: 2MB)</div>
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
                                    <i class="fas fa-toggle-on me-2"></i>Active Course
                                </label>
                                <div class="form-text">Uncheck to hide this course from the website</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Courses
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Create Course
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
                    <i class="fas fa-info-circle me-2"></i>Course Guidelines
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6><i class="fas fa-lightbulb me-2"></i>Title Tips</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• Use clear, descriptive titles</li>
                        <li>• Include the qualification level</li>
                        <li>• Keep it concise but informative</li>
                    </ul>
                </div>
                
                <div class="mb-3">
                    <h6><i class="fas fa-edit me-2"></i>Description Best Practices</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• Explain what students will learn</li>
                        <li>• Mention career opportunities</li>
                        <li>• Include key subjects/topics</li>
                        <li>• Keep it engaging and informative</li>
                    </ul>
                </div>
                
                <div class="mb-3">
                    <h6><i class="fas fa-camera me-2"></i>Image Guidelines</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• Use high-quality images</li>
                        <li>• Show relevant nursing/medical content</li>
                        <li>• Maintain consistent style</li>
                        <li>• Optimize for web (under 2MB)</li>
                    </ul>
                </div>
                
                <div class="alert alert-info">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Note:</strong> All fields marked with * are required. Make sure to provide accurate information as it will be displayed on the website.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
