@extends('layouts.admin')
@section('title', 'Edit Profil Bisnis')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-store"></i> Edit Profil Bisnis</h2>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('admin.profile.update') }}">
        @csrf
        @method('PUT')

        @if($errors->any())
        <div class="alert alert-error">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
        @endif

        <div class="form-section-title">Informasi Utama</div>
        <div class="form-row-2">
            <div class="form-group">
                <label>Nama Bisnis *</label>
                <input type="text" name="name" value="{{ old('name', $profile->name) }}" required>
            </div>
            <div class="form-group">
                <label>Harga Info</label>
                <input type="text" name="price_info" value="{{ old('price_info', $profile->price_info) }}" placeholder="Mulai dari Rp5.000 per kali cuci">
            </div>
        </div>
        <div class="form-row-2">
            <div class="form-group">
                <label>Tagline Utama</label>
                <input type="text" name="tagline" value="{{ old('tagline', $profile->tagline) }}" placeholder="Cuci Bersih, Praktis, Tanpa Ribet!">
            </div>
            <div class="form-group">
                <label>Tagline Pendukung</label>
                <input type="text" name="sub_tagline" value="{{ old('sub_tagline', $profile->sub_tagline) }}" placeholder="Tinggal Masukkan Koin, Langsung Jalan!">
            </div>
        </div>
        <div class="form-group">
            <label>Deskripsi Bisnis</label>
            <textarea name="description" rows="5" placeholder="Deskripsi lengkap tentang bisnis...">{{ old('description', $profile->description) }}</textarea>
        </div>

        <div class="form-section-title">Kontak & Lokasi</div>
        <div class="form-group">
            <label>Alamat Lengkap</label>
            <textarea name="address" rows="3" placeholder="Masukkan alamat lengkap">{{ old('address', $profile->address) }}</textarea>
        </div>
        <div class="form-row-2">
            <div class="form-group">
                <label>Telepon / WhatsApp</label>
                <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}" placeholder="08xx xxxx xxxx">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $profile->email) }}" placeholder="info@domain.com">
            </div>
        </div>
        <div class="form-row-2">
            <div class="form-group">
                <label>Jam Operasional</label>
                <input type="text" name="working_hours" value="{{ old('working_hours', $profile->working_hours) }}" placeholder="Senin - Minggu, 06.00 - 22.00">
            </div>
            <div class="form-group">
                <label>Google Maps Embed Link</label>
                <input type="url" name="google_maps_link" value="{{ old('google_maps_link', $profile->google_maps_link) }}" placeholder="https://maps.google.com/maps?...">
            </div>
        </div>

        <div class="form-section-title">Media Sosial</div>
        <div class="form-row-3">
            <div class="form-group">
                <label><i class="fab fa-instagram"></i> Instagram URL</label>
                <input type="url" name="social_instagram" value="{{ old('social_instagram', $profile->social_instagram) }}" placeholder="https://instagram.com/...">
            </div>
            <div class="form-group">
                <label><i class="fab fa-facebook"></i> Facebook URL</label>
                <input type="url" name="social_facebook" value="{{ old('social_facebook', $profile->social_facebook) }}" placeholder="https://facebook.com/...">
            </div>
            <div class="form-group">
                <label><i class="fab fa-twitter"></i> Twitter URL</label>
                <input type="url" name="social_twitter" value="{{ old('social_twitter', $profile->social_twitter) }}" placeholder="https://twitter.com/...">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save"><i class="fas fa-save"></i> Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
