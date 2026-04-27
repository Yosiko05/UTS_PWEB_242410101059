@extends('layouts.app')
@section('title', 'Profile')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0" style="color:#0f172a">Profile</h4>
    </div>
</div>

<div class="content-card mb-4">
    <div style="position:relative; height:250px; overflow:hidden; border-radius:12px 12px 0 0;">
        <img src="{{ asset('images/sampul.png') }}"
             alt="Sampul"
             style="width:100%; height:100%; object-fit:cover;">
    </div>

    <div style="padding: 0 24px 24px; position:relative;">
        <div style="position:relative; margin-top:-50px; margin-bottom:12px;">
            <img src="{{ asset('images/me.jpg') }}"
                 alt="Foto Profil"
                 style="width:200px; height:200px; border-radius:50%;
                        object-fit:cover; border:4px solid white;
                        box-shadow: 0 2px 8px rgba(0,0,0,0.15);">
        </div>
        <h5 class="fw-bold mb-0" style="color:#0f172a;">Yosico Fathaura Almeivano</h5>
        <small class="text-muted">Sistem Informasi</small>
    </div>
</div>

{{-- Informasi Detail --}}
<div class="content-card p-4">
    <h6 class="fw-bold mb-4" style="color:#0f172a; border-bottom:1px solid #f1f5f9; padding-bottom:12px;">
        <i class="bi bi-person-circle me-2 text-primary"></i>Informasi Pribadi
    </h6>
    <div class="row g-3">
        <div class="col-12">
            <label class="text-muted" style="font-size:0.75rem; text-transform:uppercase; font-weight:600;">Nama Lengkap</label>
            <p class="fw-semibold mb-0" style="color:#0f172a;">Yosico Fathaura Almeivano</p>
        </div>
        <div class="col-12"><hr style="border-color:#f1f5f9; margin:4px 0;"></div>
        <div class="col-md-6">
            <label class="text-muted" style="font-size:0.75rem; text-transform:uppercase; font-weight:600;">NIM</label>
            <p class="fw-semibold mb-0" style="color:#0f172a;">242410101059</p>
        </div>
        <div class="col-md-6">
            <label class="text-muted" style="font-size:0.75rem; text-transform:uppercase; font-weight:600;">Username</label>
            <p class="fw-semibold mb-0" style="color:#0f172a;">{{ $username }}</p>
        </div>
        <div class="col-12"><hr style="border-color:#f1f5f9; margin:4px 0;"></div>
        <div class="col-md-6">
            <label class="text-muted" style="font-size:0.75rem; text-transform:uppercase; font-weight:600;">Program Studi</label>
            <p class="fw-semibold mb-0" style="color:#0f172a;">Sistem Informasi</p>
        </div>
        <div class="col-md-6">
            <label class="text-muted" style="font-size:0.75rem; text-transform:uppercase; font-weight:600;">Fakultas</label>
            <p class="fw-semibold mb-0" style="color:#0f172a;">Ilmu Komputer</p>
        </div>
    </div>
</div>

@endsection