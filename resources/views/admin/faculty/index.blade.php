@extends('admin.layout')

@section('title', 'Faculty Management')
@section('page-title', 'Faculty Management')

@section('content')
<div class="page-header">
    <h1 class="page-title">Faculty Management</h1>
    <p class="page-subtitle">Manage all faculty members of Queen's College</p>
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
                <i class="fas fa-chalkboard-teacher me-2"></i>All Faculty Members
            </h5>
            <a href="{{ route('admin.faculty.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Faculty Member
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table" id="facultyTable">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name & Designation</th>
                        <th>Qualification</th>
                        <th>Experience</th>
                        <th>Specialization</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($faculty as $member)
                    <tr>
                        <td>
                            @if($member->image)
                                <img src="{{ asset('storage/' . $member->image) }}" 
                                     alt="{{ $member->name }}" 
                                     style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px; border-radius: 8px;">
                                    <i class="fas fa-user text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div>
                                <strong>{{ $member->name }}</strong>
                                <br>
                                <small class="text-muted">{{ $member->designation }}</small>
                            </div>
                        </td>
                        <td>{{ Str::limit($member->qualification, 30) }}</td>
                        <td>{{ $member->experience }}</td>
                        <td>{{ $member->specialization }}</td>
                        <td>
                            <span class="badge bg-{{ $member->is_active ? 'success' : 'danger' }}">
                                {{ $member->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $member->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.faculty.show', $member->id) }}" 
                                   class="action-btn btn-info" 
                                   title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.faculty.edit', $member->id) }}" 
                                   class="action-btn btn-warning" 
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.faculty.toggle-status', $member->id) }}" 
                                      method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" 
                                            class="action-btn btn-{{ $member->is_active ? 'secondary' : 'success' }}" 
                                            title="{{ $member->is_active ? 'Deactivate' : 'Activate' }}">
                                        <i class="fas fa-{{ $member->is_active ? 'pause' : 'play' }}"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.faculty.destroy', $member->id) }}" 
                                      method="POST" style="display: inline;" 
                                      onsubmit="return confirm('Are you sure you want to delete this faculty member?')">
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
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="fas fa-chalkboard-teacher fa-3x mb-3 d-block"></i>
                            No faculty members found. <a href="{{ route('admin.faculty.create') }}">Add the first faculty member</a>.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
