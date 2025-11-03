@extends('admin.layout')

@section('title', 'Admissions Management')
@section('page-title', 'Admissions Management')

@section('content')
<div class="page-header">
    <h1 class="page-title">Admissions Management</h1>
    <p class="page-subtitle">Manage all admission applications of Queen's College</p>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title">
                <i class="fas fa-user-plus me-2"></i>All Admission Applications
            </h5>
            <div class="btn-group">
                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-filter me-2"></i>Filter by Status
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('admin.admissions.index') }}">All Applications</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.admissions.index', ['status' => 'pending']) }}">Pending</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.admissions.index', ['status' => 'approved']) }}">Approved</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.admissions.index', ['status' => 'rejected']) }}">Rejected</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table" id="admissionsTable">
                <thead>
                    <tr>
                        <th>Name & Contact</th>
                        <th>Course</th>
                        <th>Status</th>
                        <th>Applied Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admissions as $admission)
                    <tr>
                        <td>
                            <div>
                                <strong>{{ $admission->name }}</strong>
                                <br>
                                <small class="text-muted">
                                    <i class="fas fa-envelope me-1"></i>{{ $admission->email }}
                                    <br>
                                    <i class="fas fa-phone me-1"></i>{{ $admission->phone }}
                                </small>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $admission->course }}</span>
                        </td>
                        <td>
                            @if($admission->status === 'approved')
                                <span class="badge bg-success">
                                    <i class="fas fa-check me-1"></i>Approved
                                </span>
                            @elseif($admission->status === 'rejected')
                                <span class="badge bg-danger">
                                    <i class="fas fa-times me-1"></i>Rejected
                                </span>
                            @else
                                <span class="badge bg-warning">
                                    <i class="fas fa-clock me-1"></i>Pending
                                </span>
                            @endif
                        </td>
                        <td>{{ $admission->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.admissions.show', $admission->id) }}" 
                                   class="action-btn btn-info" 
                                   title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.admissions.edit', $admission->id) }}" 
                                   class="action-btn btn-warning" 
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                @if($admission->status === 'pending')
                                    <form action="{{ route('admin.admissions.approve', $admission->id) }}" 
                                          method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" 
                                                class="action-btn btn-success" 
                                                title="Approve Application">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.admissions.reject', $admission->id) }}" 
                                          method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" 
                                                class="action-btn btn-danger" 
                                                title="Reject Application">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                @elseif($admission->status === 'approved')
                                    <form action="{{ route('admin.admissions.pending', $admission->id) }}" 
                                          method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" 
                                                class="action-btn btn-secondary" 
                                                title="Set to Pending">
                                            <i class="fas fa-clock"></i>
                                        </button>
                                    </form>
                                @elseif($admission->status === 'rejected')
                                    <form action="{{ route('admin.admissions.approve', $admission->id) }}" 
                                          method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" 
                                                class="action-btn btn-success" 
                                                title="Approve Application">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                @endif
                                
                                <form action="{{ route('admin.admissions.destroy', $admission->id) }}" 
                                      method="POST" style="display: inline;" 
                                      onsubmit="return confirm('Are you sure you want to delete this admission application?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="action-btn btn-danger" 
                                            title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            <i class="fas fa-user-plus fa-3x mb-3 d-block"></i>
                            No admission applications found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
