@extends('layouts.admin')
@section('title', 'Kelola Slideshow')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-images"></i> Kelola Slideshow</h2>
    <a href="{{ route('admin.slides.create') }}" class="btn-add"><i class="fas fa-plus"></i> Tambah Slide</a>
</div>

<div class="table-card">
    <table class="admin-table">
        <thead>
            <tr><th>#</th><th>Gambar</th><th>Judul</th><th>Deskripsi</th><th>Urutan</th><th>Status</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @forelse($slides as $slide)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if($slide->image_path && Storage::disk('public')->exists($slide->image_path))
                        <img src="{{ Storage::url($slide->image_path) }}" class="thumb" alt="{{ $slide->title }}">
                    @else
                        <div class="thumb-placeholder"><i class="fas fa-image"></i></div>
                    @endif
                </td>
                <td><strong>{{ $slide->title }}</strong></td>
                <td class="text-muted">{{ Str::limit($slide->description, 60) }}</td>
                <td>{{ $slide->order }}</td>
                <td>
                    <span class="badge {{ $slide->is_active ? 'badge-success' : 'badge-inactive' }}">
                        {{ $slide->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td class="actions">
                    <a href="{{ route('admin.slides.edit', $slide) }}" class="btn-edit"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{ route('admin.slides.destroy', $slide) }}" onsubmit="return confirm('Hapus slide ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-delete"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="empty-row"><i class="fas fa-inbox"></i> Belum ada slide. <a href="{{ route('admin.slides.create') }}">Tambah sekarang</a></td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
