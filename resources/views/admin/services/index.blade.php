@extends('layouts.admin')
@section('title', 'Kelola Layanan')
@section('content')
<div class="page-header">
    <h2><i class="fas fa-cogs"></i> Kelola Layanan</h2>
    <a href="{{ route('admin.services.create') }}" class="btn-add"><i class="fas fa-plus"></i> Tambah Layanan</a>
</div>
<div class="table-card">
    <table class="admin-table">
        <thead><tr><th>#</th><th>Gambar</th><th>Judul</th><th>Deskripsi</th><th>Status</th><th>Aksi</th></tr></thead>
        <tbody>
            @forelse($services as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>@if($s->image_path && Storage::disk('public')->exists($s->image_path))<img src="{{ Storage::url($s->image_path) }}" class="thumb" alt="{{ $s->title }}">@else<div class="thumb-placeholder"><i class="fas fa-image"></i></div>@endif</td>
                <td><strong>{{ $s->title }}</strong></td>
                <td class="text-muted">{{ Str::limit($s->description, 60) }}</td>
                <td><span class="badge {{ $s->is_active ? 'badge-success' : 'badge-inactive' }}">{{ $s->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                <td class="actions">
                    <a href="{{ route('admin.services.edit', $s) }}" class="btn-edit"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{ route('admin.services.destroy', $s) }}" onsubmit="return confirm('Hapus layanan ini?')">@csrf @method('DELETE')<button type="submit" class="btn-delete"><i class="fas fa-trash"></i></button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="empty-row"><i class="fas fa-inbox"></i> Belum ada layanan. <a href="{{ route('admin.services.create') }}">Tambah sekarang</a></td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
