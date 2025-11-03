@extends('admin.layout')

@section('title', 'View Admission Application')
@section('page-title', 'View Admission Application')

@section('content')
<div class="page-header">
    <h1 class="page-title">Admission Application Details</h1>
    <p class="page-subtitle">{{ $admission->name }}</p>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-user-plus me-2"></i>Application Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Applicant Name</label>
                        <p class="form-control-plaintext">{{ $admission->name }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Email Address</label>
                        <p class="form-control-plaintext">
                            <a href="mailto:{{ $admission->email }}" class="text-decoration-none">
                                <i class="fas fa-envelope me-2"></i>{{ $admission->email }}
                            </a>
                        </p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Phone Number</label>
                        <p class="form-control-plaintext">
                            <a href="tel:{{ $admission->phone }}" class="text-decoration-none">
                                <i class="fas fa-phone me-2"></i>{{ $admission->phone }}
                            </a>
                        </p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Applied Course</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-info fs-6">{{ $admission->course }}</span>
                        </p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Application Status</label>
                        <p class="form-control-plaintext">
                            @if($admission->status === 'approved')
                                <span class="badge bg-success fs-6">
                                    <i class="fas fa-check me-1"></i>Approved
                                </span>
                            @elseif($admission->status === 'rejected')
                                <span class="badge bg-danger fs-6">
                                    <i class="fas fa-times me-1"></i>Rejected
                                </span>
                            @else
                                <span class="badge bg-warning fs-6">
                                    <i class="fas fa-clock me-1"></i>Pending
                                </span>
                            @endif
                        </p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Application Date</label>
                        <p class="form-control-plaintext">{{ $admission->created_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                    
                    @if($admission->message)
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold">Additional Message</label>
                        <div class="form-control-plaintext">
                            {!! nl2br(e($admission->message)) !!}
                        </div>
                    </div>
                    @endif
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Last Updated</label>
                        <p class="form-control-plaintext">{{ $admission->updated_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-tools me-2"></i>Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.admissions.edit', $admission->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Application
                    </a>
                    
                    @if($admission->status === 'pending')
                        <form action="{{ route('admin.admissions.approve', $admission->id) }}" method="POST" class="d-grid">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check me-2"></i>Approve Application
                            </button>
                        </form>
                        <form action="{{ route('admin.admissions.reject', $admission->id) }}" method="POST" class="d-grid">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-times me-2"></i>Reject Application
                            </button>
                        </form>
                    @elseif($admission->status === 'approved')
                        <form action="{{ route('admin.admissions.pending', $admission->id) }}" method="POST" class="d-grid">
                            @csrf
                            <button type="submit" class="btn btn-secondary">
                                <i class="fas fa-clock me-2"></i>Set to Pending
                            </button>
                        </form>
                    @elseif($admission->status === 'rejected')
                        <form action="{{ route('admin.admissions.approve', $admission->id) }}" method="POST" class="d-grid">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check me-2"></i>Approve Application
                            </button>
                        </form>
                    @endif
                    
                    <form action="{{ route('admin.admissions.destroy', $admission->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this admission application? This action cannot be undone.')"
                          class="d-grid">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-2"></i>Delete Application
                        </button>
                    </form>
                    
                    <a href="{{ route('admin.admissions.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Applications
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-info-circle me-2"></i>Application Statistics
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Status:</span>
                        @if($admission->status === 'approved')
                            <span class="badge bg-success">Approved</span>
                        @elseif($admission->status === 'rejected')
                            <span class="badge bg-danger">Rejected</span>
                        @else
                            <span class="badge bg-warning">Pending</span>
                        @endif
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Course:</span>
                        <span class="badge bg-info">{{ $admission->course }}</span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Applied:</span>
                        <span class="text-muted">{{ $admission->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Last Updated:</span>
                        <span class="text-muted">{{ $admission->updated_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
