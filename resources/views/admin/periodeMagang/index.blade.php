@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('periode-magang.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Periode</span>
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
                        <th class="nk-tb-col export-col"><span class="sub-text">Program Magang</span></th>
                        <th class="nk-tb-col tb-col-md export-col"><span class="sub-text">Tanggal Mulai</span></th>
                        <th class="nk-tb-col tb-col-md export-col"><span class="sub-text">Tanggal Berakhir</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegang as $pegangs)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <span>{{ $pegangs->name }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ \Carbon\Carbon::parse($pegangs->start_date)->format('d/m/Y') }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ \Carbon\Carbon::parse($pegangs->end_date)->format('d/m/Y') }}</span>
                            </td>

                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{ route('periode-magang.edit', $pegangs->period_id) }}"><em
                                                                class="icon ni ni-edit-alt"></em><span>Edit</span></a>
                                                    </li>

                                                    <li class="divider"></li>

                                                    <li>
                                                        <button type="button"
                                                            class="btn btn-link text-danger btn-hapus-periode"
                                                            data-id="{{ $pegangs->period_id }}"
                                                            data-nama="{{ $pegangs->name }}">
                                                            <em class="icon ni ni-trash"></em><span>Hapus Data</span>
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
            $('.btn-hapus-periode').on('click', function() {
                const id = $(this).data('id');
                const nama = $(this).data('nama');
                const row = $(this).closest('tr');

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: `Periode ${nama} akan dihapus permanen.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#e85347',
                    cancelButtonColor: '#3085d6',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/periode-magang/${id}`,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                _method: 'DELETE'
                            },
                            success: function(res) {
                                Swal.fire({
                                    title: 'Terhapus!',
                                    text: res.message ||
                                        'Data berhasil dihapus.',
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                // Hilangkan baris dari UI
                                row.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Menghapus',
                                    text: xhr.responseJSON?.message ||
                                        'Terjadi kesalahan saat menghapus.',
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
