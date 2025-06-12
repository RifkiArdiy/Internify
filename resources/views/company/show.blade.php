@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ url()->previous() }}" class="btn btn-primary">
            <em class="icon ni ni-arrow-left"></em>
            <span>Kembali</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="row g-gs">
        <!-- Sidebar Mahasiswa -->
        <div class="col-lg-4 col-xl-4 col-xxl-3">
            <div class="card card-bordered">
                <div class="card-inner-group">
                    <div class="card-inner">
                        <div class="user-card user-card-s2">
                            <div class="user-avatar lg bg-success-dim">
                                @if ($log->mahasiswa->user->image)
                                    <img src="{{ Storage::url('images/users/' . $log->mahasiswa->user->image) }}"
                                        alt="{{ $log->mahasiswa->user->name }}">
                                @else
                                    <span>
                                        {{ strtoupper(collect(explode(' ', $log->mahasiswa->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                    </span>
                                @endif
                            </div>
                            <div class="user-info">
                                <div class="badge bg-light rounded-pill ucap">Mahasiswa</div>
                                <h5>{{ $log->mahasiswa->user->name }}</h5>
                                <span class="sub-text">{{ $log->mahasiswa->user->email }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <h6 class="overline-title mb-2">Informasi Mahasiswa</h6>
                        <div class="row g-3">
                            <div class="col-12 col-lg-12">
                                <span class="sub-text">NIM</span>
                                <span>{{ $log->mahasiswa->nim }}</span>
                            </div>
                            <div class="col-12 col-lg-12">
                                <span class="sub-text">Prodi</span>
                                <span>{{ $log->mahasiswa->prodi->name ?? '-' }}</span>
                            </div>
                            <div class="col-12 col-lg-12">
                                <span class="sub-text">No. Telepon</span>
                                <span>{{ $log->mahasiswa->user->no_telp }}</span>
                            </div>
                            <div class="col-12 col-lg-12">
                                <span class="sub-text">Alamat</span>
                                <span>{{ $log->mahasiswa->user->alamat }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="col-lg-8 col-xl-8 col-xxl-9">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="nk-block">
                        <div class="nk-block-head nk-block-head-sm mb-4">
                            <h6 class="nk-block-title">Detail Laporan Mahasiswa</h6>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <span class="sub-text">Nama Mahasiswa</span>
                                <p class="lead-text">{{ $log->mahasiswa->user->name ?? '-' }}</p>
                            </div>
                            <div class="col-md-6">
                                <span class="sub-text">Dosen Pembimbing</span>
                                <p class="lead-text">{{ $log->dosen->user->name ?? '-' }}</p>
                            </div>
                            <div class="col-md-12">
                                <span class="sub-text">Judul Laporan</span>
                                <p class="lead-text">{{ $log->report_title ?? '-' }}</p>
                            </div>
                            <div class="col-md-12">
                                <span class="sub-text">Isi Laporan</span>
                                <div class="bg-light border rounded p-3" style="min-height: 150px;">
                                    <div class="ql-editor">{!! old('report_text', $log->report_text) !!}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="sub-text">Tanggal Dibuat</span>
                                <p class="lead-text">{{ \Carbon\Carbon::parse($log->created_at)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="divider mt-4 mb-4"></div>

                    <div class="nk-block">
                        <h6 class="lead-text mb-3">Tindakan Verifikasi</h6>
                        @if ($log->verif_company === 'Disetujui' || $log->verif_company === 'Ditolak')
                        <div class="alert alert-info">
                            Laporan ini sudah diverifikasi dengan status: <strong>{{ $log->verif_company }}</strong>.
                        @else
                        <div class="d-flex gap-2 flex-wrap mb-4">
                            <!-- Setuju -->
                            <button type="button" class="btn btn-success btn-verifikasi-log" data-id="{{ $log->log_id }}"
                                data-status="Disetujui" data-nama="log #{{ $log->log_id }}">
                                <em class="icon ni ni-check-circle"></em>
                                <span>Setujui</span>
                            </button>

                            <!-- Tolak -->
                            <button type="button" class="btn btn-danger btn-verifikasi-log" data-id="{{ $log->log_id }}"
                                data-status="Ditolak" data-nama="log #{{ $log->log_id }}">
                                <em class="icon ni ni-cross-circle"></em>
                                <span>Tolak</span>
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.btn-verifikasi-log').on('click', function() {
                const logId = $(this).data('id');
                const status = $(this).data('status');
                const nama = $(this).data('nama');

                Swal.fire({
                    title: `Yakin ingin ${status.toLowerCase()} laporan ini?`,
                    text: `Laporan ${nama} akan diberi status: ${status}.`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: `Ya, ${status}`,
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#e85347',
                    cancelButtonColor: '#3085d6',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/company/verifikasi/${logId}`,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                _method: 'PUT',
                                verif_company: status
                            },
                            success: function(res) {
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: res.message ??
                                        `Laporan berhasil ${status.toLowerCase()}.`,
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                }).then(() => location.reload());
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: xhr.responseJSON?.message ??
                                        'Terjadi kesalahan.',
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
