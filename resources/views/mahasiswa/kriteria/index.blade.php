@extends('layouts.app')

@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="title">Daftar Kriteria</h5>
                <div>
                    <a href="{{ route('kriteria.bobot.edit') }}" class="btn btn-info btn-sm me-1">
                        <em class="icon ni ni-sliders"></em> Atur Bobot Saya
                    </a>
                    {{-- <a href="{{ route('kriteria.create') }}" class="btn btn-primary btn-sm">
                        <em class="icon ni ni-plus"></em> Tambah Kriteria
                    </a> --}}
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Bobot</th>
                            {{-- <th class="text-end">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kriterias as $index => $kriteria)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $kriteria->kode }}</td>
                                <td>{{ $kriteria->nama }}</td>
                                <td>
                                    <span class="badge bg-{{ $kriteria->jenis === 'benefit' ? 'success' : 'danger' }}">
                                        {{ ucfirst($kriteria->jenis) }}
                                    </span>
                                </td>
                                <td>
                                    @if (isset($bobotMahasiswa[$kriteria->kriteria_id]))
                                        {{ number_format($bobotMahasiswa[$kriteria->kriteria_id], 2) }}
                                    @else
                                        <span class="badge bg-secondary">Belum Diatur</span>
                                    @endif
                                </td>
                                {{-- <td class="text-end">
                                    <a href="{{ route('kriteria.edit', $kriteria->kriteria_id) }}"
                                        class="btn btn-sm btn-warning">
                                        <em class="icon ni ni-edit"></em> Edit
                                    </a>
                                    <form action="{{ route('kriteria.destroy', $kriteria->kriteria_id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kriteria ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <em class="icon ni ni-trash"></em> Hapus
                                        </button>
                                    </form>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada kriteria.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
