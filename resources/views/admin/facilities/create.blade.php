@extends('admin.layout')

@section('title', 'Add New Facility')
@section('page-title', 'Add New Facility')

@section('content')
<div class="page-header">
    <h1 class="page-title">Add New Facility</h1>
    <p class="page-subtitle">Add a new facility or amenity to Queen's College</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-building me-2"></i>Facility Information
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

                <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-building me-2"></i>Facility Name *
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
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
                                      required>{{ old('description') }}</textarea>
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
                                   value="{{ old('icon') }}" 
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
                            <div class="form-text">Recommended size: 800x600px. Supported formats: JPEG, PNG, JPG, GIF, WebP (Max: 5MB)</div>
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
                                    <i class="fas fa-toggle-on me-2"></i>Active Facility
                                </label>
                                <div class="form-text">Uncheck to hide this facility from the website</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.facilities.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Facilities
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Add Facility
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
                    <i class="fas fa-info-circle me-2"></i>Facility Guidelines
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6><i class="fas fa-lightbulb me-2"></i>Name Tips</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• Use clear, descriptive names</li>
                        <li>• Include facility type (Lab, Library, etc.)</li>
                        <li>• Keep it professional and concise</li>
                        <li>• Make it easily recognizable</li>
                    </ul>
                </div>
                
                <div class="mb-3">
                    <h6><i class="fas fa-icons me-2"></i>Icon Guidelines</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• Use FontAwesome icon classes</li>
                        <li>• Choose relevant icons for facility type</li>
                        <li>• Examples: fas fa-book, fas fa-laptop</li>
                        <li>• fas fa-microscope, fas fa-dumbbell</li>
                        <li>• fas fa-hospital, fas fa-graduation-cap</li>
                    </ul>
                </div>
                
                <div class="mb-3">
                    <h6><i class="fas fa-camera me-2"></i>Image Best Practices</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• Use high-quality, clear images</li>
                        <li>• Show the facility in use if possible</li>
                        <li>• Maintain consistent style and lighting</li>
                        <li>• Optimize for web (under 5MB)</li>
                    </ul>
                </div>
                
                <div class="alert alert-info">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Note:</strong> All fields marked with * are required. Choose appropriate icons and provide detailed descriptions to showcase the facility effectively.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
