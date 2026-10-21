@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-th-large"></i> Dashboard</h2>
    <p>Selamat datang, {{ Auth::user()->name }}! Kelola konten website IKKY LAUNDRYIN COIN di sini.</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-images"></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ $stats['slides'] }}</span>
            <span class="stat-label">Slide Aktif</span>
        </div>
        <a href="{{ route('admin.slides.index') }}" class="stat-link">Kelola →</a>
    </div>
    <div class="stat-card">
        <div class="stat-icon yellow"><i class="fas fa-cogs"></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ $stats['services'] }}</span>
            <span class="stat-label">Layanan</span>
        </div>
        <a href="{{ route('admin.services.index') }}" class="stat-link">Kelola →</a>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-star"></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ $stats['advantages'] }}</span>
            <span class="stat-label">Keunggulan</span>
        </div>
        <a href="{{ route('admin.advantages.index') }}" class="stat-link">Kelola →</a>
    </div>
    <div class="stat-card">
        <div class="stat-icon purple"><i class="fas fa-list-ol"></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ $stats['steps'] }}</span>
            <span class="stat-label">Cara Kerja</span>
        </div>
        <a href="{{ route('admin.steps.index') }}" class="stat-link">Kelola →</a>
    </div>
    <div class="stat-card">
        <div class="stat-icon navy"><i class="fas fa-photo-video"></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ $stats['gallery'] }}</span>
            <span class="stat-label">Foto Galeri</span>
        </div>
        <a href="{{ route('admin.gallery.index') }}" class="stat-link">Kelola →</a>
    </div>
</div>

<div class="quick-actions">
    <h3>Aksi Cepat</h3>
    <div class="quick-grid">
        <a href="{{ route('admin.profile.edit') }}" class="quick-btn">
            <i class="fas fa-store"></i>
            <span>Edit Profil Bisnis</span>
        </a>
        <a href="{{ route('admin.slides.create') }}" class="quick-btn">
            <i class="fas fa-plus"></i>
            <span>Tambah Slide</span>
        </a>
        <a href="{{ route('admin.gallery.create') }}" class="quick-btn">
            <i class="fas fa-camera"></i>
            <span>Upload Foto Galeri</span>
        </a>
        <a href="{{ route('home') }}" target="_blank" class="quick-btn">
            <i class="fas fa-eye"></i>
            <span>Lihat Website</span>
        </a>
    </div>
</div>
@endsection
