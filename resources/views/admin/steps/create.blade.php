@extends('layouts.admin')
@section('title', 'Tambah Langkah Cara Kerja')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-plus"></i> Tambah Langkah Cara Kerja</h2>
    <a href="{{ route('admin.steps.index') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('admin.steps.store') }}">
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
            <label>Judul Langkah *</label>
            <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Masukkan Koin">
        </div>

        <div class="form-group">
            <label>Deskripsi Langkah *</label>
            <textarea name="description" rows="4" required placeholder="Jelaskan instruksi pada langkah ini...">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label>Urutan (Langkah Ke-)</label>
            <input type="number" name="order" value="{{ old('order', 1) }}" min="1">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save"><i class="fas fa-save"></i> Simpan Langkah</button>
        </div>
    </form>
</div>
@endsection
