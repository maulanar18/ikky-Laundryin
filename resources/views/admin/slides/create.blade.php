@extends('layouts.admin')
@section('title', 'Tambah Slide')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-plus"></i> Tambah Slide</h2>
    <a href="{{ route('admin.slides.index') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>
<div class="form-card">
    <form method="POST" action="{{ route('admin.slides.store') }}" enctype="multipart/form-data">
        @csrf
        @if($errors->any())<div class="alert alert-error"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

        <div class="form-group">
            <label>Judul Slide *</label>
            <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Interior Laundry Modern">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="3" placeholder="Deskripsi singkat slide...">{{ old('description') }}</textarea>
        </div>
        <div class="form-row-2">
            <div class="form-group">
                <label>Gambar <small>(JPG/PNG, maks 2MB)</small></label>
                <input type="file" name="image" accept="image/*" onchange="previewImg(this,'imgPreview')">
                <img id="imgPreview" class="img-preview hidden">
            </div>
            <div class="form-group">
                <label>Urutan</label>
                <input type="number" name="order" value="{{ old('order', 1) }}" min="1">
            </div>
        </div>
        <div class="form-group form-check-inline">
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
            <label for="is_active">Aktifkan slide ini</label>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-save"><i class="fas fa-save"></i> Simpan</button>
        </div>
    </form>
</div>
<script>
function previewImg(input, id) {
    const reader = new FileReader();
    reader.onload = e => { const img = document.getElementById(id); img.src = e.target.result; img.classList.remove('hidden'); }
    if (input.files[0]) reader.readAsDataURL(input.files[0]);
}
</script>
@endsection
