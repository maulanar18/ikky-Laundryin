@extends('layouts.admin')
@section('title', 'Upload Foto Galeri')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-plus"></i> Upload Foto Galeri</h2>
    <a href="{{ route('admin.gallery.index') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-group">
            <label>Judul / Keterangan Foto *</label>
            <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Suasana Ruang Laundry">
        </div>

        <div class="form-row-2">
            <div class="form-group">
                <label>Pilih File Foto * <small>(JPG/PNG/WEBP, maks 3MB)</small></label>
                <input type="file" name="image" accept="image/*" required onchange="previewImg(this, 'galleryPreview')">
                <img id="galleryPreview" class="img-preview hidden" alt="Pratinjau Foto">
            </div>
            <div class="form-group">
                <label>Urutan Tampil</label>
                <input type="number" name="order" value="{{ old('order', 1) }}" min="1">
            </div>
        </div>

        <div class="form-group form-check-inline">
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
            <label for="is_active">Tampilkan di Galeri Website</label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save"><i class="fas fa-upload"></i> Upload Foto</button>
        </div>
    </form>
</div>

<script>
    function previewImg(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
