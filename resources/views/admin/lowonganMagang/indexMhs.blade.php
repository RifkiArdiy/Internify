@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card card-bordered card-preview">
        <div class="card-inner table-responsive">
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col export-col"><span class="sub-text">Perusahaan</span></th>
                        {{-- <th class="nk-tb-col export-col"><span class="sub-text">Masa Awal</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Masa Akhir</span></th> --}}
                        <th class="nk-tb-col export-col"><span class="sub-text">Judul</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Deskripsi</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Kriteria</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Aksi</span></th>
                        {{-- <th class="nk-tb-col export-col"><span class="sub-text">Lokasi</span></th> --}}
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logang as $item)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <span>{{ $item->company->user->name }}</span>
                            </td>
                            {{-- <td class="nk-tb-col">
                                <span>{{ $item->period->start_date }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $item->period->end_date }}</span>
                            </td> --}}
                            <td class="nk-tb-col">
                                <span>{{ $item->title }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ Str::limit($item->description, 50) }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ Str::limit($item->requirements, 50) }}</span>
                            </td>
                            {{-- <td class="nk-tb-col">
                                <span>{{ $item->location }}</span>
                            </td> --}}
                            @php
                                //$mahasiswaId = Auth::user()->mahasiswa->mahasiswa_id;
                                //$sudahMelamar = \App\Models\MagangApplication::where('mahasiswa_id', $mahasiswaId)
                                                //  ->where('lowongan_id', $item->lowongan_id)
                                                //  ->exists();
                            @endphp
                            <td class="nk-tb-col">
                                {{-- @if ($sudahMelamar)
                                    <span>Sudah Melamar</span>
                                @else --}}
                                <form action="{{ route('magangApplication.storeMhs', $item->lowongan_id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin melamar lowongan ini?')">
                                    @csrf
                                    <input type="hidden" name="lowongan_id" value="{{ $item->lowongan_id }}">
                                    <input type="hidden" name="status" value="Pending">
                                    <button type="submit" class="btn btn-success btn-sm">Lamar</button>
                                </form>
                                {{-- @endif  --}}
                            </td>

                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{ route('lowonganMagang.edit', $item->lowongan_id) }}">
                                                            <em class="icon ni ni-edit-alt"></em><span>Edit</span></a>
                                                    </li>
                                                    <li>
                                                        <form
                                                            action="{{ route('lowonganMagang.destroy', $item->lowongan_id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Yakin ingin menghapus?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="dropdown-item d-flex align-items-center"
                                                                style="border: none; background: none;">
                                                                <em class="icon ni ni-trash" style="margin-left:6px;"></em>
                                                                <span class="ms-1">Hapus</span>
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
