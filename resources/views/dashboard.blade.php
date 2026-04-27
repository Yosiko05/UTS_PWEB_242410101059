@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

{{-- Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0" style="color:#0f172a">Dashboard</h4>
        <small class="text-muted">Selamat datang, <strong>{{ $username }}</strong>!</small>
    </div>
    <div style="font-size:0.85rem; color:#64748b;">
        <i class="bi bi-calendar3 me-1"></i>{{ date('d M Y') }}
    </div>
</div>
{{-- Cards --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#eff6ff; color:#3b82f6;">
                <i class="bi bi-list-task"></i>
            </div>
            <div>
                <div class="stat-number">{{ $total }}</div>
                <div class="stat-label">Total Tugas</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#f0fdf4; color:#22c55e;">
                <i class="bi bi-check-circle"></i>
            </div>
            <div>
                <div class="stat-number">{{ $selesai }}</div>
                <div class="stat-label">Selesai</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#fff7ed; color:#f59e0b;">
                <i class="bi bi-arrow-repeat"></i>
            </div>
            <div>
                <div class="stat-number">{{ $berlangsung }}</div>
                <div class="stat-label">Berlangsung</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#fef2f2; color:#ef4444;">
                <i class="bi bi-clock"></i>
            </div>
            <div>
                <div class="stat-number">{{ $pending }}</div>
                <div class="stat-label">Pending</div>
            </div>
        </div>
    </div>
</div>

{{-- Tabel --}}
<div class="content-card">
    <div class="content-card-header">
        <div>
            <h6>Tugas Terbaru</h6>
            <small>Daftar tugas aktif kamu</small>
        </div>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}"
           style="font-size:0.85rem; color:#3b82f6; text-decoration:none;">
            Lihat semua →
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0" style="font-size:0.875rem;">
            <thead style="background:#f8fafc;">
                <tr>
                    <th class="px-4 py-3" style="color:#64748b; font-weight:600;">Tugas</th>
                    <th class="py-3" style="color:#64748b; font-weight:600;">Prioritas</th>
                    <th class="py-3" style="color:#64748b; font-weight:600;">Status</th>
                    <th class="py-3" style="color:#64748b; font-weight:600;">Deadline</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tugas as $item)
                <tr>
                    <td class="px-4 py-3 fw-semibold">{{ $item['judul'] }}</td>
                    <td>
                        <span class="badge" style="
                            background: {{ $item['prioritas'] === 'Tinggi' ? '#fef2f2' : ($item['prioritas'] === 'Sedang' ? '#fff7ed' : '#f0fdf4') }};
                            color: {{ $item['prioritas'] === 'Tinggi' ? '#ef4444' : ($item['prioritas'] === 'Sedang' ? '#f59e0b' : '#22c55e') }};">
                            {{ $item['prioritas'] }}
                        </span>
                    </td>
                    <td>
                        <span class="badge" style="
                            background: {{ $item['status'] === 'Selesai' ? '#f0fdf4' : ($item['status'] === 'Berlangsung' ? '#eff6ff' : '#f8fafc') }};
                            color: {{ $item['status'] === 'Selesai' ? '#22c55e' : ($item['status'] === 'Berlangsung' ? '#3b82f6' : '#64748b') }};">
                            {{ $item['status'] }}
                        </span>
                    </td>
                    <td>{{ $item['deadline'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection