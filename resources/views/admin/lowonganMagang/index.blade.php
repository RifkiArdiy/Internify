@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('lowongan-magang.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Lowongan</span>
        </a>
    </li>
@endsection

@section('content')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                NioApp.Toast(
                    `<h5>Berhasil</h5><p>{{ session('success') }}</p>`,
                    'success', {
                        position: 'bottom-right',
                        icon: 'auto',
                        clear: true
                    }
                );
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                NioApp.Toast(
                    `<h5>Gagal</h5><p>{{ session('error') }}</p>`,
                    'error', {
                        position: 'bottom-right',
                        icon: 'auto',
                        clear: true
                    }
                );
            });
        </script>
    @endif
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col export-col"><span class="sub-text">Judul</span></th>
                        <th class="nk-tb-col tb-col-lg export-col"><span class="sub-text">Perusahaan</span></th>
                        <th class="nk-tb-col tb-col-md export-col"><span class="sub-text">Pelamar</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logang as $item)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <div class="user-info">
                                    <span class="tb-lead">
                                        {{ $item->title }}
                                        {{-- <span class="dot dot-success d-md-none ms-1"></span> --}}
                                    </span>
                                    <span>{{ $item->period->name }} | {{ $item->created_at->diffForHumans() }} </span>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-lg">
                                <span><em class="icon ni ni-building-fill"></em>
                                    {{ $item->company->user->name }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span><em class="icon ni ni-users"></em> {{ $item->applications->count() }} Pelamar</span>
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
                                                    <li><a href="{{ route('show.lowongan', $item->lowongan_id) }}">
                                                            <em class="icon ni ni-eye"></em><span>Lihat Detail</span></a>
                                                    </li>
                                                    <li><a href="{{ route('lowongan-magang.edit', $item->lowongan_id) }}">
                                                            <em class="icon ni ni-edit-alt"></em><span>Edit</span></a>
                                                    </li>
                                                    <li>
                                                        <button type="button"
                                                            class="btn btn-link text-danger btn-hapus-lowongan"
                                                            data-id="{{ $item->lowongan_id }}"
                                                            data-nama="{{ $item->title }}">
                                                            <em class="icon ni ni-trash"></em><span>Hapus</span>
                                                        </button>
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

@push('js')
    <script>
        $(document).ready(function() {
            $('.btn-hapus-lowongan').on('click', function() {
                const id = $(this).data('id');
                const nama = $(this).data('nama');
                const row = $(this).closest('tr');

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: `Lowongan "${nama}" akan dihapus permanen.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#e85347',
                    cancelButtonColor: '#3085d6',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/lowongan-magang/${id}`,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                _method: 'DELETE'
                            },
                            success: function(res) {
                                Swal.fire({
                                    title: 'Terhapus!',
                                    text: res.message,
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                row.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Menghapus!',
                                    text: xhr.responseJSON?.message ||
                                        'Terjadi kesalahan saat menghapus data.',
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
