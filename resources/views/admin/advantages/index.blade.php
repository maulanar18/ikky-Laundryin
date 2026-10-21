@extends('layouts.admin')
@section('title', 'Kelola Keunggulan')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-star"></i> Kelola Keunggulan</h2>
    <a href="{{ route('admin.advantages.create') }}" class="btn-add"><i class="fas fa-plus"></i> Tambah Keunggulan</a>
</div>

<div class="table-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Ikon</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Urutan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($advantages as $adv)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <div class="icon-preview-box">
                        <i class="{{ $adv->icon_class ?? 'fas fa-star' }}"></i>
                    </div>
                </td>
                <td><strong>{{ $adv->title }}</strong></td>
                <td class="text-muted">{{ Str::limit($adv->description, 80) }}</td>
                <td>{{ $adv->order ?? '-' }}</td>
                <td class="actions">
                    <a href="{{ route('admin.advantages.edit', $adv) }}" class="btn-edit" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form method="POST" action="{{ route('admin.advantages.destroy', $adv) }}" onsubmit="return confirm('Hapus keunggulan ini?')">
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
                    <i class="fas fa-inbox"></i> Belum ada data keunggulan. <a href="{{ route('admin.advantages.create') }}">Tambah sekarang</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
