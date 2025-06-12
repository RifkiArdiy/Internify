@extends('layouts.app')
<style>
    .img-avatar {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        /* Agar tetap bulat */
    }
</style>
@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Mahasiswa</span>
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
                        <th class="nk-tb-col export-col"><span class="sub-text">User</span></th>
                        <th class="nk-tb-col tb-col-mb export-col"><span class="sub-text">NIM</span></th>
                        <th class="nk-tb-col tb-col-lg export-col"><span class="sub-text">Jurusan</span></th>
                        <th class="nk-tb-col tb-col-lg export-col"><span class="sub-text">Alamat</span></th>
                        <th class="nk-tb-col tb-col-md export-col"><span class="sub-text">Telepon</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $mhs)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-avatar bg-teal-dim d-none d-sm-flex">
                                        @if ($mhs->user->image)
                                            <img class="img-avatar"
                                                src="{{ Storage::url('images/users/' . $mhs->user->image) }}"
                                                alt="{{ $mhs->user->name }}">
                                        @else
                                            <span>
                                                {{ strtoupper(collect(explode(' ', $mhs->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">{{ $mhs->user->name }}<span
                                                class="dot dot-success d-md-none ms-1"></span></span>
                                        <span>{{ $mhs->user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span>{{ $mhs->nim }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-lg" data-order="Email Submited - Kyc More Info">
                                <span>{{ $mhs->prodi->name }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-lg">
                                <span>{{ $mhs->user->alamat }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $mhs->user->no_telp }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{ route('mahasiswa.show', $mhs->mahasiswa_id) }}"><em
                                                                class="icon ni ni-eye"></em><span>Lihat
                                                                Detail</span></a></li>
                                                    <li><a href="{{ route('mahasiswa.edit', $mhs->mahasiswa_id) }}"><em
                                                                class="icon ni ni-repeat"></em><span>Edit</span></a>
                                                    </li>

                                                    <li class="divider"></li>
                                                    <li>
                                                        <button type="button"
                                                            class="btn btn-link text-danger btn-hapus-mahasiswa"
                                                            data-id="{{ $mhs->mahasiswa_id }}"
                                                            data-nama="{{ $mhs->user->name }}">
                                                            <em class="icon ni ni-trash"></em><span>Hapus Mahasiswa</span>
                                                        </button>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr><!-- .nk-tb-item  -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.btn-hapus-mahasiswa').on('click', function() {
                let id = $(this).data('id');
                let nama = $(this).data('nama');
                let row = $(this).closest('tr'); // jika kamu ingin menghapus baris tabel

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: `Mahasiswa ${nama} akan dihapus permanen!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#e85347',
                    cancelButtonColor: '#3085d6',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('/admin/mahasiswa') }}/" + id,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(res) {
                                Swal.fire({
                                    title: 'Terhapus!',
                                    text: res.message,
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: true,
                                    toast: false, // ubah jadi alert biasa di tengah layar
                                    position: 'center',
                                });

                                // Hilangkan elemen dari UI jika ada
                                row.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
