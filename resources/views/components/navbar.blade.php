@props(['username' => 'Guest'])

<div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="d-flex align-items-center">
            <div class="brand-icon"><i class="bi bi-check2-square"></i></div>
            <div>
                <div class="brand-name">EduPlan</div>
                <div class="brand-sub">Manajemen Tugas</div>
            </div>
        </div>
    </div>

    {{-- Menu --}}
    <div class="sidebar-menu">
        <div class="menu-label">Utama</div>
        <a href="{{ route('dashboard', ['username' => $username]) }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <div class="menu-label mt-2">Pengelolaan</div>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}"
           class="{{ request()->routeIs('pengelolaan') ? 'active' : '' }}">
            <i class="bi bi-list-task"></i> Daftar Tugas
        </a>

        <div class="menu-label mt-2">Akun</div>
        <a href="{{ route('profile', ['username' => $username]) }}"
           class="{{ request()->routeIs('profile') ? 'active' : '' }}">
            <i class="bi bi-person-circle"></i> Profile
        </a>
        <a href="{{ route('logout') }}" class="text-danger mt-1"
           style="color:#f87171 !important;">
            <i class="bi bi-box-arrow-left"></i> Logout
        </a>
    </div>

    {{-- User info --}}
    <div class="sidebar-footer">
        <div class="user-info">
            <img src="{{ asset('images/me.jpg') }}"
                alt="Foto Profil"
                style="width:34px; height:34px; border-radius:50%; object-fit:cover; border:1px solid #3b82f6;">
            <div>
                <div class="user-name">{{ $username }}</div>
                <div class="user-role">Member Aktif</div>
            </div>
        </div>
    </div>
</div>