@extends('admin.layout')

@section('title', 'Add New Notification')
@section('page-title', 'Add New Notification')

@section('content')
<div class="page-header">
    <h1 class="page-title">Add New Notification</h1>
    <p class="page-subtitle">Create a new notification or announcement for Queen's College</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-bell me-2"></i>Notification Information
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

                <form action="{{ route('admin.notifications.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="title" class="form-label">
                                <i class="fas fa-heading me-2"></i>Notification Title *
                            </label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}" 
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
                                      required>{{ old('content') }}</textarea>
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
                                <option value="general" {{ old('type') == 'general' ? 'selected' : '' }}>General</option>
                                <option value="admission" {{ old('type') == 'admission' ? 'selected' : '' }}>Admission</option>
                                <option value="exam" {{ old('type') == 'exam' ? 'selected' : '' }}>Exam</option>
                                <option value="event" {{ old('type') == 'event' ? 'selected' : '' }}>Event</option>
                                <option value="holiday" {{ old('type') == 'holiday' ? 'selected' : '' }}>Holiday</option>
                                <option value="academic" {{ old('type') == 'academic' ? 'selected' : '' }}>Academic</option>
                                <option value="fee" {{ old('type') == 'fee' ? 'selected' : '' }}>Fee</option>
                                <option value="result" {{ old('type') == 'result' ? 'selected' : '' }}>Result</option>
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
                                   value="{{ old('publish_date', date('Y-m-d')) }}" 
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
                                   value="{{ old('expiry_date') }}">
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
                                       {{ old('is_active', true) ? 'checked' : '' }}>
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
                                       {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    <i class="fas fa-star me-2"></i>Featured Notification
                                </label>
                                <div class="form-text">Check to display this notification prominently on the website</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.notifications.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Notifications
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Create Notification
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
                    <i class="fas fa-info-circle me-2"></i>Notification Guidelines
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6><i class="fas fa-lightbulb me-2"></i>Title Tips</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• Keep titles clear and concise</li>
                        <li>• Use action words when appropriate</li>
                        <li>• Include important dates or deadlines</li>
                        <li>• Make it attention-grabbing</li>
                    </ul>
                </div>
                
                <div class="mb-3">
                    <h6><i class="fas fa-tags me-2"></i>Type Guidelines</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• <strong>General:</strong> General announcements</li>
                        <li>• <strong>Admission:</strong> Admission-related news</li>
                        <li>• <strong>Exam:</strong> Exam schedules, results</li>
                        <li>• <strong>Event:</strong> College events, functions</li>
                        <li>• <strong>Holiday:</strong> Holiday announcements</li>
                        <li>• <strong>Academic:</strong> Academic updates</li>
                        <li>• <strong>Fee:</strong> Fee-related information</li>
                        <li>• <strong>Result:</strong> Result announcements</li>
                    </ul>
                </div>
                
                <div class="mb-3">
                    <h6><i class="fas fa-star me-2"></i>Featured Notifications</h6>
                    <ul class="list-unstyled small text-muted">
                        <li>• Featured notifications appear prominently</li>
                        <li>• Use for important announcements</li>
                        <li>• Limit to 3-5 featured items maximum</li>
                        <li>• Update regularly to keep content fresh</li>
                    </ul>
                </div>
                
                <div class="alert alert-info">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Note:</strong> All fields marked with * are required. Set appropriate publish and expiry dates for better notification management.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
