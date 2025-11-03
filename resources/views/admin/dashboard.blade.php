@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <p class="page-subtitle">Welcome to Queen's College Admin Panel</p>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="stats-icon courses">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <h3 class="stats-number">{{ $stats['courses'] ?? 0 }}</h3>
            <p class="stats-label">Total Courses</p>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="stats-icon faculty">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <h3 class="stats-number">{{ $stats['faculty'] ?? 0 }}</h3>
            <p class="stats-label">Faculty Members</p>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="stats-icon gallery">
                <i class="fas fa-images"></i>
            </div>
            <h3 class="stats-number">{{ $stats['gallery'] ?? 0 }}</h3>
            <p class="stats-label">Gallery Items</p>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="stats-icon admissions">
                <i class="fas fa-user-plus"></i>
            </div>
            <h3 class="stats-number">{{ $stats['admissions'] ?? 0 }}</h3>
            <p class="stats-label">Admission Applications</p>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-clock me-2"></i>Recent Activity
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover data-table" id="recentActivityTable">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentActivity as $activity)
                            <tr>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ ucfirst($activity['type']) }}
                                    </span>
                                </td>
                                <td>{{ $activity['title'] }}</td>
                                <td>
                                    <span class="badge bg-{{ $activity['status'] === 'active' ? 'success' : 'warning' }}">
                                        {{ ucfirst($activity['status']) }}
                                    </span>
                                </td>
                                <td>{{ $activity['date'] }}</td>
                                <td>
                                    @if($activity['edit_url'] !== '#')
                                        <a href="{{ $activity['edit_url'] }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @else
                                        <span class="btn btn-secondary btn-sm disabled">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No recent activity</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-chart-pie me-2"></i>Quick Stats
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Active Courses</span>
                        <span class="fw-bold">{{ $stats['active_courses'] ?? 0 }}</span>
                    </div>
                    <div class="progress mt-1" style="height: 6px;">
                        <div class="progress-bar bg-success" style="width: {{ $stats['active_courses'] ?? 0 }}%"></div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Featured Notifications</span>
                        <span class="fw-bold">{{ $stats['featured_notifications'] ?? 0 }}</span>
                    </div>
                    <div class="progress mt-1" style="height: 6px;">
                        <div class="progress-bar bg-info" style="width: {{ $stats['featured_notifications'] ?? 0 }}%"></div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Pending Admissions</span>
                        <span class="fw-bold">{{ $stats['pending_admissions'] ?? 0 }}</span>
                    </div>
                    <div class="progress mt-1" style="height: 6px;">
                        <div class="progress-bar bg-warning" style="width: {{ $stats['pending_admissions'] ?? 0 }}%"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-tools me-2"></i>Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Course
                    </a>
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-success">
                        <i class="fas fa-list me-2"></i>Manage Courses
                    </a>
                    <a href="{{ route('admin.faculty.create') }}" class="btn btn-primary">
                        <i class="fas fa-user-plus me-2"></i>Add Faculty Member
                    </a>
                    <a href="{{ route('admin.faculty.index') }}" class="btn btn-success">
                        <i class="fas fa-list me-2"></i>Manage Faculty
                    </a>
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                        <i class="fas fa-image me-2"></i>Add Gallery Item
                    </a>
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-success">
                        <i class="fas fa-list me-2"></i>Manage Gallery
                    </a>
                    <a href="{{ route('admin.notifications.create') }}" class="btn btn-primary">
                        <i class="fas fa-bell me-2"></i>Create Notification
                    </a>
                    <a href="{{ route('admin.notifications.index') }}" class="btn btn-success">
                        <i class="fas fa-list me-2"></i>Manage Notifications
                    </a>
                    <a href="{{ route('admin.facilities.create') }}" class="btn btn-primary">
                        <i class="fas fa-building me-2"></i>Add Facility
                    </a>
                    <a href="{{ route('admin.facilities.index') }}" class="btn btn-success">
                        <i class="fas fa-list me-2"></i>Manage Facilities
                    </a>
                    <a href="{{ route('admin.admissions.index') }}" class="btn btn-primary">
                        <i class="fas fa-user-plus me-2"></i>View Applications
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Admissions -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-user-plus me-2"></i>Recent Admission Applications
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Status</th>
                                <th>Applied Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentAdmissions as $admission)
                            <tr>
                                <td>{{ $admission->name }}</td>
                                <td>{{ $admission->email }}</td>
                                <td>{{ $admission->course }}</td>
                                <td>
                                    <span class="badge bg-{{ $admission->status === 'pending' ? 'warning' : ($admission->status === 'approved' ? 'success' : 'danger') }}">
                                        {{ ucfirst($admission->status) }}
                                    </span>
                                </td>
                                <td>{{ $admission->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.admissions.show', $admission->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.admissions.edit', $admission->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No admission applications yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
