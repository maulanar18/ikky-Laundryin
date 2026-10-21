@extends('layouts.admin')
@section('title', 'Kelola Galeri')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-photo-video"></i> Kelola Foto Galeri</h2>
    <a href="{{ route('admin.gallery.create') }}" class="btn-add"><i class="fas fa-plus"></i> Upload Foto Baru</a>
</div>

<div class="table-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Judul Foto</th>
                <th>Urutan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($images as $img)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if($img->image_path && Storage::disk('public')->exists($img->image_path))
                        <img src="{{ Storage::url($img->image_path) }}" class="thumb" alt="{{ $img->title }}">
                    @else
                        <div class="thumb-placeholder"><i class="fas fa-image"></i></div>
                    @endif
                </td>
                <td><strong>{{ $img->title }}</strong></td>
                <td>{{ $img->order ?? '-' }}</td>
                <td>
                    <span class="badge {{ $img->is_active ? 'badge-success' : 'badge-inactive' }}">
                        {{ $img->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td class="actions">
                    <a href="{{ route('admin.gallery.edit', $img) }}" class="btn-edit" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form method="POST" action="{{ route('admin.gallery.destroy', $img) }}" onsubmit="return confirm('Hapus foto ini dari galeri?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="empty-row">
                    <i class="fas fa-inbox"></i> Belum ada foto dalam galeri. <a href="{{ route('admin.gallery.create') }}">Upload sekarang</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
