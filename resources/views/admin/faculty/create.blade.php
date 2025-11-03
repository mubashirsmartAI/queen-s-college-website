@extends('admin.layout')

@section('title', 'Add New Faculty Member')
@section('page-title', 'Add New Faculty Member')

@section('content')
<div class="page-header">
    <h1 class="page-title">Add New Faculty Member</h1>
    <p class="page-subtitle">Add a new faculty member to Queen's College</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-user-plus me-2"></i>Faculty Information
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

                <form action="{{ route('admin.faculty.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-user me-2"></i>Full Name *
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   placeholder="e.g., Dr. Sarah Ahmed"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="designation" class="form-label">
                                <i class="fas fa-briefcase me-2"></i>Designation *
                            </label>
                            <input type="text" 
                                   class="form-control @error('designation') is-invalid @enderror" 
                                   id="designation" 
                                   name="designation" 
                                   value="{{ old('designation') }}" 
                                   placeholder="e.g., Professor, Associate Professor, Lecturer"
                                   required>
                            @error('designation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="qualification" class="form-label">
                                <i class="fas fa-graduation-cap me-2"></i>Qualification *
                            </label>
                            <textarea class="form-control @error('qualification') is-invalid @enderror" 
                                      id="qualification" 
                                      name="qualification" 
                                      rows="3" 
                                      placeholder="e.g., PhD in Nursing, MSc in Healthcare Management, BSc Nursing"
                                      required>{{ old('qualification') }}</textarea>
                            @error('qualification')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="experience" class="form-label">
                                <i class="fas fa-clock me-2"></i>Experience *
                            </label>
                            <textarea class="form-control @error('experience') is-invalid @enderror" 
                                      id="experience" 
                                      name="experience" 
                                      rows="3" 
                                      placeholder="e.g., 15 years of clinical experience in critical care nursing, 10 years in nursing education"
                                      required>{{ old('experience') }}</textarea>
                            @error('experience')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="specialization" class="form-label">
                                <i class="fas fa-stethoscope me-2"></i>Specialization *
                            </label>
                            <input type="text" 
                                   class="form-control @error('specialization') is-invalid @enderror" 
                                   id="specialization" 
                                   name="specialization" 
                                   value="{{ old('specialization') }}" 
                                   placeholder="e.g., Critical Care Nursing, Medical-Surgical Nursing, Community Health"
                                   required>
                            @error('specialization')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-2"></i>Email Address
                            </label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="sarah.ahmed@queenscollege.edu.pk">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">
                                <i class="fas fa-phone me-2"></i>Phone Number
                            </label>
                            <input type="text" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}" 
                                   placeholder="+92-XXX-XXXXXXX">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="image" class="form-label">
                                <i class="fas fa-image me-2"></i>Profile Photo
                            </label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*">
                            <div class="form-text">Recommended size: 400x400px. Supported formats: JPEG, PNG, JPG, GIF, WebP (Max: 2MB)</div>
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
                                    <i class="fas fa-toggle-on me-2"></i>Active Faculty Member
                                </label>
                                <div class="form-text">Uncheck to hide this faculty member from the website</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.faculty.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Faculty
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Add Faculty Member
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
                    <i class="fas fa-info-circle me-2"></i>Faculty Guidelines
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6><i class="fas fa-lightbulb me-2"></i>Name Tips</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• Use full name with proper titles</li>
                        <li>• Include Dr., Prof., etc. if applicable</li>
                        <li>• Keep it professional and formal</li>
                    </ul>
                </div>
                
                <div class="mb-3">
                    <h6><i class="fas fa-edit me-2"></i>Qualification Best Practices</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• List all relevant degrees</li>
                        <li>• Include institution names</li>
                        <li>• Mention years of completion</li>
                        <li>• Add certifications if relevant</li>
                    </ul>
                </div>
                
                <div class="mb-3">
                    <h6><i class="fas fa-camera me-2"></i>Photo Guidelines</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• Use professional headshots</li>
                        <li>• Ensure good lighting and clarity</li>
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
