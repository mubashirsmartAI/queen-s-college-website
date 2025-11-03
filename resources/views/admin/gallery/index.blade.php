@extends('admin.layout')

@section('title', 'Gallery Management')
@section('page-title', 'Gallery Management')

@section('content')
<div class="page-header">
    <h1 class="page-title">Gallery Management</h1>
    <p class="page-subtitle">Manage all gallery images and media of Queen's College</p>
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
                <i class="fas fa-images me-2"></i>All Gallery Items
            </h5>
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Gallery Item
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table" id="galleryTable">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title & Description</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleries as $gallery)
                    <tr>
                        <td>
                            @if($gallery->image)
                                <img src="{{ asset('storage/' . $gallery->image) }}" 
                                     alt="{{ $gallery->title }}" 
                                     style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                     style="width: 60px; height: 60px; border-radius: 8px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div>
                                <strong>{{ $gallery->title }}</strong>
                                @if($gallery->description)
                                    <br>
                                    <small class="text-muted">{{ Str::limit($gallery->description, 50) }}</small>
                                @endif
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ ucfirst($gallery->category) }}</span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $gallery->is_active ? 'success' : 'danger' }}">
                                {{ $gallery->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $gallery->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.gallery.show', $gallery->id) }}" 
                                   class="action-btn btn-info" 
                                   title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.gallery.edit', $gallery->id) }}" 
                                   class="action-btn btn-warning" 
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.gallery.toggle-status', $gallery->id) }}" 
                                      method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" 
                                            class="action-btn btn-{{ $gallery->is_active ? 'secondary' : 'success' }}" 
                                            title="{{ $gallery->is_active ? 'Deactivate' : 'Activate' }}">
                                        <i class="fas fa-{{ $gallery->is_active ? 'pause' : 'play' }}"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" 
                                      method="POST" style="display: inline;" 
                                      onsubmit="return confirm('Are you sure you want to delete this gallery item?')">
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
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="fas fa-images fa-3x mb-3 d-block"></i>
                            No gallery items found. <a href="{{ route('admin.gallery.create') }}">Add the first gallery item</a>.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
