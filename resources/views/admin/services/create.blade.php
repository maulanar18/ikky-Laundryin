@extends('layouts.admin')
@section('title', 'Tambah Layanan')
@section('content')
<div class="page-header"><h2><i class="fas fa-plus"></i> Tambah Layanan</h2><a href="{{ route('admin.services.index') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a></div>
<div class="form-card">
    <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
        @csrf
        @if($errors->any())<div class="alert alert-error"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
        <div class="form-group"><label>Judul Layanan *</label><input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Mesin Cuci"></div>
        <div class="form-group"><label>Deskripsi</label><textarea name="description" rows="4" placeholder="Deskripsi layanan...">{{ old('description') }}</textarea></div>
        <div class="form-row-2">
            <div class="form-group"><label>Gambar <small>(JPG/PNG, maks 2MB)</small></label><input type="file" name="image" accept="image/*" onchange="previewImg(this,'prev')"><img id="prev" class="img-preview hidden"></div>
            <div class="form-group"><label>Urutan</label><input type="number" name="order" value="{{ old('order',1) }}" min="1"></div>
        </div>
        <div class="form-group form-check-inline"><input type="checkbox" name="is_active" id="ia" value="1" checked><label for="ia">Aktifkan layanan</label></div>
        <div class="form-actions"><button type="submit" class="btn-save"><i class="fas fa-save"></i> Simpan</button></div>
    </form>
</div>
<script>function previewImg(i,id){const r=new FileReader();r.onload=e=>{const m=document.getElementById(id);m.src=e.target.result;m.classList.remove('hidden')};if(i.files[0])r.readAsDataURL(i.files[0])}</script>
@endsection
