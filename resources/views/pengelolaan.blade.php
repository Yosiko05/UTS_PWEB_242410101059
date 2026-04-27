@extends('layouts.app')
@section('title', 'Pengelolaan Tugas')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0" style="color:#0f172a">Pengelolaan Tugas</h4>
    </div>
</div>

{{-- Form Tambah Tugas --}}
<div class="content-card mb-4">
    <div class="content-card-header">
        <h6 class="mb-0">Tambah Tugas Baru</h6>
    </div>
    <div class="p-4">
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label fw-semibold" style="font-size:0.85rem;">Judul Tugas</label>
                <input type="text" class="form-control" placeholder="Tambah Tugas Kamu">
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold" style="font-size:0.85rem;">Prioritas</label>
                <select class="form-select">
                    <option>Tinggi</option>
                    <option selected>Sedang</option>
                    <option>Rendah</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold" style="font-size:0.85rem;">Status</label>
                <select class="form-select">
                    <option selected>Pending</option>
                    <option>Berlangsung</option>
                    <option>Selesai</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold" style="font-size:0.85rem;">Deadline</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button class="btn w-100 fw-semibold"
                        style="background:#3b82f6; color:white; border-radius:8px;"
                    <i class="bi bi-plus-lg me-1"></i> Tambah
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Tabel Tugas --}}
<div class="content-card">
    <div class="content-card-header">
        <div>
            <h6 class="mb-0">Daftar Tugas</h6>
            <small class="text-muted">{{ count($tugas) }} tugas terdaftar</small>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0" style="font-size:0.875rem;">
            <thead style="background:#f8fafc;">
                <tr>
                    <th class="px-4 py-3" style="color:#64748b; font-weight:600;">#</th>
                    <th class="py-3" style="color:#64748b; font-weight:600;">Judul Tugas</th>
                    <th class="py-3" style="color:#64748b; font-weight:600;">Prioritas</th>
                    <th class="py-3" style="color:#64748b; font-weight:600;">Status</th>
                    <th class="py-3" style="color:#64748b; font-weight:600;">Deadline</th>
                </tr>
            </thead> 
            <tbody>
                @foreach($tugas as $item)
                <tr>
                    <td class="px-4 py-3">{{ $item['id'] }}</td>
                    <td class="py-3 fw-semibold">{{ $item['judul'] }}</td>
                    <td class="py-3">
                        <span class="badge" style="
                            background: {{ $item['prioritas'] === 'Tinggi' ? '#fef2f2' : ($item['prioritas'] === 'Sedang' ? '#fff7ed' : '#f0fdf4') }};
                            color: {{ $item['prioritas'] === 'Tinggi' ? '#ef4444' : ($item['prioritas'] === 'Sedang' ? '#f59e0b' : '#22c55e') }};">
                            {{ $item['prioritas'] }}
                        </span>
                    </td>
                    <td class="py-3">
                        <span class="badge" style="
                            background: {{ $item['status'] === 'Selesai' ? '#f0fdf4' : ($item['status'] === 'Berlangsung' ? '#eff6ff' : '#f8fafc') }};
                            color: {{ $item['status'] === 'Selesai' ? '#22c55e' : ($item['status'] === 'Berlangsung' ? '#3b82f6' : '#64748b') }};">
                            {{ $item['status'] }}
                        </span>
                    </td>
                    <td class="py-3">{{ $item['deadline'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection