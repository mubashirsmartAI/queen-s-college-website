@extends('admin.layout')

@section('title', 'Notifications Management')
@section('page-title', 'Notifications Management')

@section('content')
<div class="page-header">
    <h1 class="page-title">Notifications Management</h1>
    <p class="page-subtitle">Manage all notifications and announcements of Queen's College</p>
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
                <i class="fas fa-bell me-2"></i>All Notifications
            </h5>
            <a href="{{ route('admin.notifications.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Notification
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table" id="notificationsTable">
                <thead>
                    <tr>
                        <th>Title & Content</th>
                        <th>Type</th>
                        <th>Publish Date</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($notifications as $notification)
                    <tr>
                        <td>
                            <div>
                                <strong>{{ $notification->title }}</strong>
                                <br>
                                <small class="text-muted">{{ Str::limit($notification->content, 60) }}</small>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-{{ $notification->type === 'general' ? 'primary' : ($notification->type === 'admission' ? 'success' : ($notification->type === 'exam' ? 'warning' : 'info')) }}">
                                {{ ucfirst($notification->type) }}
                            </span>
                        </td>
                        <td>{{ $notification->publish_date->format('M d, Y') }}</td>
                        <td>
                            @if($notification->expiry_date)
                                {{ $notification->expiry_date->format('M d, Y') }}
                            @else
                                <span class="text-muted">No expiry</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-{{ $notification->is_active ? 'success' : 'danger' }}">
                                {{ $notification->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            @if($notification->is_featured)
                                <span class="badge bg-warning">
                                    <i class="fas fa-star me-1"></i>Featured
                                </span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $notification->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.notifications.show', $notification->id) }}" 
                                   class="action-btn btn-info" 
                                   title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.notifications.edit', $notification->id) }}" 
                                   class="action-btn btn-warning" 
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.notifications.toggle-status', $notification->id) }}" 
                                      method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" 
                                            class="action-btn btn-{{ $notification->is_active ? 'secondary' : 'success' }}" 
                                            title="{{ $notification->is_active ? 'Deactivate' : 'Activate' }}">
                                        <i class="fas fa-{{ $notification->is_active ? 'pause' : 'play' }}"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.notifications.toggle-featured', $notification->id) }}" 
                                      method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" 
                                            class="action-btn btn-{{ $notification->is_featured ? 'secondary' : 'warning' }}" 
                                            title="{{ $notification->is_featured ? 'Remove from Featured' : 'Add to Featured' }}">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.notifications.destroy', $notification->id) }}" 
                                      method="POST" style="display: inline;" 
                                      onsubmit="return confirm('Are you sure you want to delete this notification?')">
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
                            <i class="fas fa-bell fa-3x mb-3 d-block"></i>
                            No notifications found. <a href="{{ route('admin.notifications.create') }}">Add the first notification</a>.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
