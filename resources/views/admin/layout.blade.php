<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Queen's College</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('college-logo.jpg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('college-logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('college-logo.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('college-logo.jpg') }}">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .sidebar {
            background: linear-gradient(135deg, #dc3545, #0d6efd);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar.collapsed {
            width: 70px;
        }
        
        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 10px;
            object-fit: cover;
        }
        
        .sidebar-title {
            color: white;
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0;
        }
        
        .sidebar-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.8rem;
            margin: 0;
        }
        
        .sidebar-menu {
            padding: 20px 0;
        }
        
        .menu-item {
            display: block;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .menu-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: white;
        }
        
        .menu-item.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border-left-color: white;
        }
        
        .menu-item i {
            width: 20px;
            margin-right: 10px;
        }
        
        .menu-text {
            display: inline-block;
        }
        
        /* Logout button specific styling */
        form .menu-item:hover {
            background: rgba(255, 255, 255, 0.1) !important;
            color: white !important;
            border-left-color: white !important;
        }
        
        .sidebar.collapsed .menu-text {
            display: none;
        }
        
        .main-content {
            margin-left: 250px;
            transition: all 0.3s ease;
            min-height: 100vh;
        }
        
        .main-content.expanded {
            margin-left: 70px;
        }
        
        .top-navbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333;
        }
        
        .navbar-brand img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .navbar-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin: 0;
        }
        
        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .btn-toggle {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #666;
            cursor: pointer;
            padding: 8px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .btn-toggle:hover {
            background: #f8f9fa;
            color: #333;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(135deg, #dc3545, #0d6efd);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        .content-area {
            padding: 30px;
        }
        
        .page-header {
            margin-bottom: 30px;
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin: 0;
        }
        
        .page-subtitle {
            color: #666;
            margin: 5px 0 0 0;
        }
        
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 15px;
        }
        
        .stats-icon.courses {
            background: linear-gradient(135deg, #dc3545, #ff6b6b);
        }
        
        .stats-icon.faculty {
            background: linear-gradient(135deg, #0d6efd, #4dabf7);
        }
        
        .stats-icon.gallery {
            background: linear-gradient(135deg, #198754, #51cf66);
        }
        
        .stats-icon.admissions {
            background: linear-gradient(135deg, #fd7e14, #ffa94d);
        }
        
        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin: 0;
        }
        
        .stats-label {
            color: #666;
            font-size: 0.9rem;
            margin: 5px 0 0 0;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        .card-header {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-bottom: 1px solid #e9ecef;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px 25px;
        }
        
        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin: 0;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #dc3545, #0d6efd);
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #198754, #51cf66);
            border: none;
            border-radius: 10px;
            padding: 8px 15px;
            font-weight: 600;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #fd7e14, #ffa94d);
            border: none;
            border-radius: 10px;
            padding: 8px 15px;
            font-weight: 600;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #dc3545, #ff6b6b);
            border: none;
            border-radius: 10px;
            padding: 8px 15px;
            font-weight: 600;
        }
        
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        
        .table thead th {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border: none;
            font-weight: 600;
            color: #333;
            padding: 15px;
        }
        
        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            border-color: #f8f9fa;
        }
        
        .badge {
            border-radius: 20px;
            padding: 6px 12px;
            font-weight: 500;
        }
        
        .badge.bg-success {
            background: linear-gradient(135deg, #198754, #51cf66) !important;
        }
        
        .badge.bg-warning {
            background: linear-gradient(135deg, #fd7e14, #ffa94d) !important;
        }
        
        .badge.bg-danger {
            background: linear-gradient(135deg, #dc3545, #ff6b6b) !important;
        }
        
        /* Action Buttons Styling */
        .action-buttons {
            display: flex;
            gap: 4px;
            flex-wrap: wrap;
        }
        
        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: none;
            font-size: 0.875rem;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        
        .action-btn.btn-info {
            background: linear-gradient(135deg, #17a2b8, #138496);
            color: white;
        }
        
        .action-btn.btn-warning {
            background: linear-gradient(135deg, #ffc107, #e0a800);
            color: #212529;
        }
        
        .action-btn.btn-success {
            background: linear-gradient(135deg, #28a745, #1e7e34);
            color: white;
        }
        
        .action-btn.btn-secondary {
            background: linear-gradient(135deg, #6c757d, #545b62);
            color: white;
        }
        
        .action-btn.btn-danger {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }
            
            .main-content {
                margin-left: 70px;
            }
            
            .sidebar .menu-text {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('college-logo.jpg') }}" alt="Queen's College Logo" class="sidebar-logo">
            <h4 class="sidebar-title">Admin Panel</h4>
            <p class="sidebar-subtitle">Queen's College</p>
        </div>
        
        <nav class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}" class="menu-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                <span class="menu-text">Dashboard</span>
            </a>
            
            <a href="{{ route('admin.courses.index') }}" class="menu-item {{ Request::routeIs('admin.courses.*') ? 'active' : '' }}">
                <i class="fas fa-graduation-cap"></i>
                <span class="menu-text">Courses</span>
            </a>
            
            <a href="{{ route('admin.faculty.index') }}" class="menu-item {{ request()->routeIs('admin.faculty.*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher"></i>
                <span class="menu-text">Faculty</span>
            </a>
            
            <a href="{{ route('admin.gallery.index') }}" class="menu-item {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <i class="fas fa-images"></i>
                <span class="menu-text">Gallery</span>
            </a>
            
            <a href="{{ route('admin.notifications.index') }}" class="menu-item {{ request()->routeIs('admin.notifications.*') ? 'active' : '' }}">
                <i class="fas fa-bell"></i>
                <span class="menu-text">Notifications</span>
            </a>
            
            <a href="{{ route('admin.facilities.index') }}" class="menu-item {{ request()->routeIs('admin.facilities.*') ? 'active' : '' }}">
                <i class="fas fa-building"></i>
                <span class="menu-text">Facilities</span>
            </a>
            
            <a href="{{ route('admin.admissions.index') }}" class="menu-item {{ request()->routeIs('admin.admissions.*') ? 'active' : '' }}">
                <i class="fas fa-user-plus"></i>
                <span class="menu-text">Admissions</span>
            </a>
            
            <a href="{{ route('home') }}" class="menu-item">
                <i class="fas fa-external-link-alt"></i>
                <span class="menu-text">View Website</span>
            </a>
            
            <form action="{{ route('admin.logout') }}" method="POST" style="display: contents;">
                @csrf
                <button type="submit" class="menu-item" onclick="return confirm('Are you sure you want to logout?')" style="background: none; border: none; width: 100%; text-align: left; padding: 12px 20px; color: rgba(255, 255, 255, 0.9); font-size: inherit; cursor: pointer; display: block; text-decoration: none; transition: all 0.3s ease; border-left: 3px solid transparent;">
                    <i class="fas fa-sign-out-alt" style="width: 20px; margin-right: 10px;"></i>
                    <span class="menu-text">Logout</span>
                </button>
            </form>
        </nav>
    </div>
    
    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <div class="navbar-brand">
                <img src="{{ asset('college-logo.jpg') }}" alt="Queen's College Logo">
                <h5 class="navbar-title">@yield('page-title', 'Admin Panel')</h5>
            </div>
            
            <div class="navbar-actions">
                <button class="btn-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="user-info">
                    <div class="user-avatar">
                        {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div>
                        <div style="font-weight: 600; color: #333;">{{ auth()->user()->name ?? 'Admin' }}</div>
                        <div style="font-size: 0.8rem; color: #666;">Administrator</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Content Area -->
        <div class="content-area">
            @yield('content')
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        // Sidebar toggle functionality
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });
        
        // Initialize DataTables
    $(document).ready(function() {
        // Initialize DataTables for all tables except admissions and facilities
        var tableIds = ['coursesTable', 'facultyTable', 'notificationsTable', 'recentActivityTable'];
        
        tableIds.forEach(function(tableId) {
            if ($('#' + tableId).length > 0) {
                // Destroy existing DataTable if it exists
                if ($.fn.DataTable.isDataTable('#' + tableId)) {
                    $('#' + tableId).DataTable().destroy();
                }
                
                $('#' + tableId).DataTable({
                    responsive: true,
                    pageLength: 10,
                    order: [[0, 'desc']],
                    language: {
                        search: "Search:",
                        lengthMenu: "Show _MENU_ entries",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries",
                        paginate: {
                            first: "First",
                            last: "Last",
                            next: "Next",
                            previous: "Previous"
                        }
                    }
                });
            }
        });
        
        // Special configuration for facilities table
        if ($('#facilitiesTable').length > 0) {
            // Destroy existing DataTable if it exists
            if ($.fn.DataTable.isDataTable('#facilitiesTable')) {
                $('#facilitiesTable').DataTable().destroy();
            }
            
            $('#facilitiesTable').DataTable({
                responsive: true,
                pageLength: 10,
                order: [[4, 'desc']], // Sort by Created Date
                columnDefs: [
                    { orderable: false, targets: [5] } // Disable sorting on Actions column
                ],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });
        }
        
        // Special configuration for gallery table
        if ($('#galleryTable').length > 0) {
            // Destroy existing DataTable if it exists
            if ($.fn.DataTable.isDataTable('#galleryTable')) {
                $('#galleryTable').DataTable().destroy();
            }
            
            $('#galleryTable').DataTable({
                responsive: true,
                pageLength: 10,
                order: [[4, 'desc']], // Sort by Created Date
                columnDefs: [
                    { orderable: false, targets: [5] } // Disable sorting on Actions column
                ],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });
        }
        
        // Special configuration for admissions table
        if ($('#admissionsTable').length > 0) {
            // Destroy existing DataTable if it exists
            if ($.fn.DataTable.isDataTable('#admissionsTable')) {
                $('#admissionsTable').DataTable().destroy();
            }
            
            $('#admissionsTable').DataTable({
                responsive: true,
                pageLength: 10,
                order: [[3, 'desc']], // Sort by Applied Date
                columnDefs: [
                    { orderable: false, targets: [4] } // Disable sorting on Actions column
                ],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });
        }
    });
        
        // Auto-hide alerts
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>
    
    @yield('scripts')
</body>
</html>
