@extends('layouts.admin')
@section('title', 'Edit Foto Galeri')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-edit"></i> Edit Foto Galeri</h2>
    <a href="{{ route('admin.gallery.index') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('admin.gallery.update', $gallery) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
            <input type="text" name="title" value="{{ old('title', $gallery->title) }}" required>
        </div>

        <div class="form-row-2">
            <div class="form-group">
                <label>Ganti Foto <small>(kosongkan jika tidak ingin mengubah)</small></label>
                @if($gallery->image_path && Storage::disk('public')->exists($gallery->image_path))
                    <div class="current-img-box">
                        <img src="{{ Storage::url($gallery->image_path) }}" class="current-img" alt="Foto saat ini">
                        <span class="text-hint">Foto saat ini</span>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*" onchange="previewImg(this, 'galleryPreview')">
                <img id="galleryPreview" class="img-preview hidden" alt="Pratinjau Baru">
            </div>
            <div class="form-group">
                <label>Urutan Tampil</label>
                <input type="number" name="order" value="{{ old('order', $gallery->order) }}" min="1">
            </div>
        </div>

        <div class="form-group form-check-inline">
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
            <label for="is_active">Tampilkan di Galeri Website</label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save"><i class="fas fa-save"></i> Simpan Perubahan</button>
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
