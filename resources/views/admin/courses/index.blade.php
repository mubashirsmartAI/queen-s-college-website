@extends('admin.layout')

@section('title', 'Courses Management')
@section('page-title', 'Courses Management')

@section('content')
<div class="page-header">
    <h1 class="page-title">Courses Management</h1>
    <p class="page-subtitle">Manage all courses offered by Queen's College</p>
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
                <i class="fas fa-graduation-cap me-2"></i>All Courses
            </h5>
            <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Course
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table" id="coursesTable">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Duration</th>
                        <th>Fee</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                    <tr>
                        <td>
                            @if($course->image)
                                <img src="{{ $course->image_url }}" 
                                     alt="{{ $course->title }}" 
                                     style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px; border-radius: 8px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div>
                                <strong>{{ $course->title }}</strong>
                                <br>
                                <small class="text-muted">{{ Str::limit($course->description, 50) }}</small>
                            </div>
                        </td>
                        <td>{{ $course->duration }}</td>
                        <td>Rs. {{ number_format($course->fee) }}</td>
                        <td>
                            <span class="badge bg-{{ $course->is_active ? 'success' : 'danger' }}">
                                {{ $course->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $course->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.courses.show', $course->id) }}" 
                                   class="action-btn btn-info" 
                                   title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.courses.edit', $course->id) }}" 
                                   class="action-btn btn-warning" 
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.courses.toggle-status', $course->id) }}" 
                                      method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" 
                                            class="action-btn btn-{{ $course->is_active ? 'secondary' : 'success' }}" 
                                            title="{{ $course->is_active ? 'Deactivate' : 'Activate' }}">
                                        <i class="fas fa-{{ $course->is_active ? 'pause' : 'play' }}"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.courses.destroy', $course->id) }}" 
                                      method="POST" style="display: inline;" 
                                      onsubmit="return confirm('Are you sure you want to delete this course?')">
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
                        <td colspan="7" class="text-center text-muted py-4">
                            <i class="fas fa-graduation-cap fa-3x mb-3 d-block"></i>
                            No courses found. <a href="{{ route('admin.courses.create') }}">Create the first course</a>.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
