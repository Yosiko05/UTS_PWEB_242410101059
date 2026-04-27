<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Task Manager')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #f1f5f9; font-family: 'Segoe UI', sans-serif; }

        /* ── Sidebar ── */
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #0f172a;
            position: fixed;
            top: 0; left: 0;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: transform 0.3s ease;
        }
        .sidebar-brand {
            padding: 20px;
            border-bottom: 1px solid #1e293b;
        }
        .sidebar-brand .brand-icon {
            width: 36px; height: 36px;
            background: #3b82f6;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            margin-right: 10px;
        }
        .brand-name { color: white; font-weight: 700; font-size: 1rem; }
        .brand-sub  { color: #64748b; font-size: 0.75rem; }

        .sidebar-menu { padding: 16px 12px; flex: 1; overflow-y: auto; }
        .menu-label {
            color: #475569;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            padding: 8px 8px 4px;
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #94a3b8;
            text-decoration: none;
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 0.875rem;
            margin-bottom: 2px;
            transition: all 0.2s;
        }
        .sidebar-menu a:hover { background: #1e293b; color: #e2e8f0; }
        .sidebar-menu a.active { background: #3b82f6; color: white; }
        .sidebar-menu a i { font-size: 1rem; width: 18px; }

        .sidebar-footer {
            padding: 16px;
            border-top: 1px solid #1e293b;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-avatar {
            width: 34px; height: 34px;
            background: #3b82f6;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: white; font-weight: 700; font-size: 0.85rem;
        }
        .user-name  { color: #e2e8f0; font-size: 0.85rem; font-weight: 600; }
        .user-role  { color: #64748b; font-size: 0.72rem; }

        /* ── Main Content ── */
        .main-wrapper {
            margin-left: 250px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease;
        }

        /* ── Topbar mobile */
        .topbar {
            display: none;
            background: #0f172a;
            padding: 12px 16px;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }
        .topbar .brand-name { color: white; font-weight: 700; }
        .hamburger {
            background: none;
            border: none;
            color: white;
            font-size: 1.4rem;
            cursor: pointer;
        }

        /* ── Overlay mobile ── */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }
        .sidebar-overlay.show { display: block; }

        /* ── Page Content ── */
        .page-content { padding: 28px; flex: 1; }

        /* ── Cards ── */
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .stat-icon {
            width: 48px; height: 48px;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem;
        }
        .stat-number { font-size: 1.6rem; font-weight: 700; color: #0f172a; line-height: 1; }
        .stat-label  { font-size: 0.78rem; color: #64748b; margin-top: 2px; }

        .content-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
            overflow: hidden;
        }
        .content-card-header {
            padding: 18px 20px;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content-card-header h6 { margin: 0; font-weight: 700; color: #0f172a; }
        .content-card-header small { color: #64748b; }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main-wrapper { margin-left: 0; }
            .topbar { display: flex; }
            .page-content { padding: 16px; }
        }
        /* Login page centering */
        .login-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;
        }
    </style>
    @yield('styles')
</head>
@if(isset($username) && $username !== 'Guest')
    <div class="sidebar-overlay" id="overlay" onclick="closeSidebar()"></div>
    <x-navbar :username="$username ?? 'Guest'" />
    <div class="main-wrapper">
        <div class="topbar">
            <span class="brand-name">Task Manager</span>
            <button class="hamburger" onclick="openSidebar()">
                <i class="bi bi-list"></i>
            </button>
        </div>
        <div class="page-content">
            @yield('content')
        </div>
        <x-footer />
    </div>
@else
    <div class="login-wrapper">
        @yield('content')
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function openSidebar() {
        document.getElementById('sidebar').classList.add('open');
        document.getElementById('overlay').classList.add('show');
    }
    function closeSidebar() {
        document.getElementById('sidebar').classList.remove('open');
        document.getElementById('overlay').classList.remove('show');
    }
</script>
@yield('scripts')
</body>
</html>