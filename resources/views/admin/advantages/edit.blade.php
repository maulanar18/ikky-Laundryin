@extends('layouts.admin')
@section('title', 'Edit Keunggulan')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-edit"></i> Edit Keunggulan</h2>
    <a href="{{ route('admin.advantages.index') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('admin.advantages.update', $advantage) }}">
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
            <label>Judul Keunggulan *</label>
            <input type="text" name="title" value="{{ old('title', $advantage->title) }}" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="4">{{ old('description', $advantage->description) }}</textarea>
        </div>

        <div class="form-row-2">
            <div class="form-group">
                <label>Ikon Font Awesome Class</label>
                <div class="icon-input-group">
                    <input type="text" name="icon_class" id="iconInput" value="{{ old('icon_class', $advantage->icon_class) }}">
                    <div class="icon-badge-preview">
                        <i id="iconPreview" class="{{ old('icon_class', $advantage->icon_class ?: 'fas fa-star') }}"></i>
                    </div>
                </div>
                <small class="text-hint">Contoh: fas fa-bolt, fas fa-shield-alt, fas fa-clock, fas fa-tshirt</small>
            </div>
            <div class="form-group">
                <label>Urutan Tampil</label>
                <input type="number" name="order" value="{{ old('order', $advantage->order) }}" min="1">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save"><i class="fas fa-save"></i> Simpan Perubahan</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('iconInput')?.addEventListener('input', function() {
        const preview = document.getElementById('iconPreview');
        if (preview) {
            preview.className = this.value || 'fas fa-star';
        }
    });
</script>
@endsection
