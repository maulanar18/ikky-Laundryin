@extends('layouts.admin')
@section('title', 'Kelola Cara Kerja')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-list-ol"></i> Kelola Langkah Cara Kerja</h2>
    <a href="{{ route('admin.steps.create') }}" class="btn-add"><i class="fas fa-plus"></i> Tambah Langkah</a>
</div>

<div class="table-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Langkah #</th>
                <th>Judul Langkah</th>
                <th>Deskripsi</th>
                <th>Urutan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($steps as $step)
            <tr>
                <td>
                    <div class="step-num-badge">{{ $loop->iteration }}</div>
                </td>
                <td><strong>{{ $step->title }}</strong></td>
                <td class="text-muted">{{ Str::limit($step->description, 80) }}</td>
                <td>{{ $step->order ?? '-' }}</td>
                <td class="actions">
                    <a href="{{ route('admin.steps.edit', $step) }}" class="btn-edit" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form method="POST" action="{{ route('admin.steps.destroy', $step) }}" onsubmit="return confirm('Hapus langkah ini?')">
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
                <td colspan="5" class="empty-row">
                    <i class="fas fa-inbox"></i> Belum ada langkah cara kerja. <a href="{{ route('admin.steps.create') }}">Tambah sekarang</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
