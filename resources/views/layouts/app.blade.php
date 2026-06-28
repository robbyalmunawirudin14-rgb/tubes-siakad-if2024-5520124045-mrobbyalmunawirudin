<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --green-dark:   #1a6b3c;
            --green-main:   #28a745;
            --green-light:  #d4edda;
            --green-accent: #20c65a;
            --sidebar-w:    240px;
            --navbar-h:     60px;
        }

        * { box-sizing: border-box; }

        body {
            background: #f0f7f2;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
        }

        /* ── NAVBAR ── */
        .top-navbar {
            background: linear-gradient(135deg, var(--green-dark), var(--green-main));
            padding: 0 20px;
            height: var(--navbar-h);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 200;
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
        }

        .top-navbar .brand {
            color: white;
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-decoration: none;
        }

        .top-navbar .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .top-navbar .user-name {
            color: rgba(255,255,255,0.9);
            font-size: 0.85rem;
        }

        .btn-logout {
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.4);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.82rem;
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
        }
        .btn-logout:hover { background: rgba(255,255,255,0.3); color: white; }

        /* Hamburger */
        .hamburger {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.4rem;
            cursor: pointer;
            padding: 4px 8px;
            margin-right: 8px;
            line-height: 1;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            position: fixed;
            top: var(--navbar-h);
            left: 0;
            width: var(--sidebar-w);
            height: calc(100vh - var(--navbar-h));
            background: white;
            border-right: 1px solid #e0ede5;
            padding: 20px 12px;
            overflow-y: auto;
            box-shadow: 2px 0 8px rgba(0,0,0,0.05);
            z-index: 150;
            transition: transform 0.3s ease;
        }

        .sidebar .menu-label {
            font-size: 0.7rem;
            font-weight: 700;
            color: #aaa;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin: 16px 8px 8px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #444;
            text-decoration: none;
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 0.9rem;
            margin-bottom: 2px;
            transition: all 0.2s;
        }
        .sidebar a:hover { background: var(--green-light); color: var(--green-dark); }
        .sidebar a.active { background: var(--green-main); color: white; font-weight: 600; }
        .sidebar a i { font-size: 1rem; width: 20px; text-align: center; }

        /* Overlay gelap saat sidebar terbuka di mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.4);
            z-index: 140;
        }
        .sidebar-overlay.show { display: block; }

        /* ── MAIN CONTENT ── */
        .main-content {
            margin-left: var(--sidebar-w);
            margin-top: var(--navbar-h);
            padding: 28px;
            min-height: calc(100vh - var(--navbar-h));
        }

        /* ── CARDS ── */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        }
        .card-header {
            background: white;
            border-bottom: 1px solid #eee;
            border-radius: 12px 12px 0 0 !important;
            padding: 16px 20px;
            font-weight: 600;
            color: #333;
        }

        /* ── STAT CARDS ── */
        .stat-card {
            border-radius: 12px;
            padding: 20px;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .stat-card .stat-icon {
            font-size: 2.5rem;
            opacity: 0.25;
            position: absolute;
            right: 16px;
            bottom: 10px;
        }
        .stat-card h6 { font-size: 0.8rem; opacity: 0.85; margin-bottom: 6px; }
        .stat-card p  { font-size: 2rem; font-weight: 700; margin: 0; }

        /* ── TABLES ── */
        .table-responsive { border-radius: 8px; }
        .table thead th {
            background: #f8fdf9;
            color: var(--green-dark);
            font-weight: 600;
            font-size: 0.85rem;
            border-bottom: 2px solid var(--green-light);
        }
        .table tbody tr:hover { background: #f5fbf7; }

        /* ── BUTTONS ── */
        .btn-primary { background: var(--green-main); border-color: var(--green-main); }
        .btn-primary:hover { background: var(--green-dark); border-color: var(--green-dark); }
        .btn-success { background: #20c65a; border-color: #20c65a; }

        /* ── FORMS ── */
        .form-control:focus, .form-select:focus {
            border-color: var(--green-main);
            box-shadow: 0 0 0 0.2rem rgba(40,167,69,0.2);
        }
        label { font-weight: 500; font-size: 0.88rem; color: #555; margin-bottom: 4px; }

        /* ── PAGE TITLE ── */
        .page-title { font-size: 1.4rem; font-weight: 700; color: #1a3d2b; margin-bottom: 20px; }

        /* ── ALERTS ── */
        .alert-success { background: #d4edda; border-color: #c3e6cb; color: #155724; border-radius: 10px; }
        .alert-danger  { border-radius: 10px; }

        /* ── RESPONSIVE ── */
        @media (max-width: 991.98px) {
            .hamburger { display: block; }
            .top-navbar .user-name { display: none; } /* hemat space di HP */

            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 16px;
            }
        }

        @media (max-width: 575.98px) {
            .stat-card p { font-size: 1.5rem; }
            .page-title  { font-size: 1.1rem; }
            .main-content { padding: 12px; }
        }
    </style>
</head>
<body>

{{-- NAVBAR --}}
<nav class="top-navbar">
    <div class="d-flex align-items-center">
        <button class="hamburger" id="sidebarToggle" aria-label="Toggle menu">
            <i class="bi bi-list"></i>
        </button>
        <a class="brand" href="{{ route('dashboard') }}">SIAKAD</a>
    </div>

    <div class="user-info">
        <span class="user-name">
            <i class="bi bi-person-circle"></i>
            {{ auth()->user()->name }}
        </span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">
                <i class="bi bi-box-arrow-right"></i>
                <span class="d-none d-sm-inline">Logout</span>
            </button>
        </form>
    </div>
</nav>

{{-- OVERLAY --}}
<div class="sidebar-overlay" id="sidebarOverlay"></div>

{{-- SIDEBAR --}}
<div class="sidebar" id="sidebar">
    @auth
        <div class="menu-label">Menu</div>

        @if(auth()->user()->role == 'admin')
            <a href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
            <a href="{{ route('dosen.index') }}"><i class="bi bi-person-badge"></i> Data Dosen</a>
            <a href="{{ route('mahasiswa.index') }}"><i class="bi bi-people"></i> Data Mahasiswa</a>
            <a href="{{ route('matakuliah.index') }}"><i class="bi bi-book"></i> Data Mata Kuliah</a>
            <a href="{{ route('jadwal.index') }}"><i class="bi bi-calendar3"></i> Data Jadwal</a>
            <a href="{{ route('admin.krs') }}"><i class="bi bi-card-list"></i> Data KRS</a>
        @endif

        @if(auth()->user()->role == 'mahasiswa')
            <a href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
            <a href="{{ route('jadwal.mahasiswa') }}"><i class="bi bi-calendar3"></i> Jadwal Kuliah</a>
            <a href="{{ route('krs.index') }}"><i class="bi bi-card-list"></i> Ambil KRS</a>
        @endif
    @endauth
</div>

{{-- CONTENT --}}
<div class="main-content">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {

    // DataTable
    $('.datatable').DataTable({ responsive: true });

    // Active menu
    const currentUrl = window.location.href;
    document.querySelectorAll('.sidebar a').forEach(link => {
        if (currentUrl === link.href) link.classList.add('active');
    });

    // Sidebar toggle
    const sidebar  = document.getElementById('sidebar');
    const overlay  = document.getElementById('sidebarOverlay');
    const toggle   = document.getElementById('sidebarToggle');

    function openSidebar() {
        sidebar.classList.add('open');
        overlay.classList.add('show');
    }

    function closeSidebar() {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
    }

    toggle.addEventListener('click', () => {
        sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
    });

    overlay.addEventListener('click', closeSidebar);

    // Tutup sidebar otomatis saat klik menu (mobile)
    document.querySelectorAll('.sidebar a').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 992) closeSidebar();
        });
    });
});
</script>

</body>
</html>
