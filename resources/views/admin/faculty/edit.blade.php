@extends('admin.layout')

@section('title', 'Edit Faculty Member')
@section('page-title', 'Edit Faculty Member')

@section('content')
<div class="page-header">
    <h1 class="page-title">Edit Faculty Member</h1>
    <p class="page-subtitle">Update information for {{ $faculty->name }}</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-edit me-2"></i>Faculty Information
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

                <form action="{{ route('admin.faculty.update', $faculty->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-user me-2"></i>Full Name *
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $faculty->name) }}" 
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
                                   value="{{ old('designation', $faculty->designation) }}" 
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
                                      required>{{ old('qualification', $faculty->qualification) }}</textarea>
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
                                      required>{{ old('experience', $faculty->experience) }}</textarea>
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
                                   value="{{ old('specialization', $faculty->specialization) }}" 
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
                                   value="{{ old('email', $faculty->email) }}" 
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
                                   value="{{ old('phone', $faculty->phone) }}" 
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
                            <div class="form-text">Leave empty to keep current photo. Recommended size: 400x400px. Supported formats: JPEG, PNG, JPG, GIF, WebP (Max: 2MB)</div>
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
                                       {{ old('is_active', $faculty->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    <i class="fas fa-toggle-on me-2"></i>Active Faculty Member
                                </label>
                                <div class="form-text">Uncheck to hide this faculty member from the website</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.faculty.show', $faculty->id) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Faculty Member
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Faculty Member
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
                    <i class="fas fa-image me-2"></i>Current Photo
                </h5>
            </div>
            <div class="card-body text-center">
                @if($faculty->image)
                    <img src="{{ asset('storage/' . $faculty->image) }}" 
                         alt="{{ $faculty->name }}" 
                         class="img-fluid rounded mb-3" 
                         style="max-height: 200px; object-fit: cover;">
                    <p class="text-muted small">Current profile photo</p>
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded mb-3" 
                         style="height: 150px;">
                        <div class="text-center">
                            <i class="fas fa-user fa-2x text-muted mb-2"></i>
                            <p class="text-muted small">No photo currently set</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-info-circle me-2"></i>Faculty Statistics
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Status:</span>
                        <span class="badge bg-{{ $faculty->is_active ? 'success' : 'danger' }}">
                            {{ $faculty->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Created:</span>
                        <span class="text-muted">{{ $faculty->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Last Updated:</span>
                        <span class="text-muted">{{ $faculty->updated_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
