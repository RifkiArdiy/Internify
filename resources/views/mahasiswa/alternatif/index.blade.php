@extends('layouts.app')
@section('action')
    <li class="nk-block-tools-opt">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAlternatifModal">
            <em class="icon ni ni-plus"></em>
            <span>Tambah alternatif</span>
        </a>
    </li>
    <li class="nk-block-tools-opt">
        <a href="{{ route('spk.index') }}" class="btn btn-info" target="_blank">
            <em class="icon ni ni-eye"></em>
            <span>Hasil Rekomendasi</span>
        </a>
    </li>
@endsection
@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md export-col"><span class="sub-text">Lowongan</span></th>
                        @foreach ($kriterias as $k)
                            <th class="nk-tb-col export-col"><span class="sub-text">{{ $k->nama }}</span></th>
                        @endforeach
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alt)
                        <tr>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $alt->lowongan->title }}</span>
                            </td>
                            @foreach ($kriterias as $kriteria)
                                @php
                                    $nilai = $alt->nilaiAlternatif->firstWhere('kriteria_id', $kriteria->kriteria_id);
                                @endphp
                                <td>
                                    @if ($nilai && $nilai->nilai > 0)
                                        {{
                                            $nilai->kriteria->skorKriterias
                                                ->firstWhere('nilai', $nilai->nilai)?->parameter ?? 'Parameter tidak ditemukan'
                                        }}
                                    @else
                                        <span class="text-danger">Belum ada nilai</span>
                                    @endif
                                </td>
                                
                            @endforeach
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li>
                                                        <a href="#" class="btn-input-nilai"
                                                            data-id="{{ $alt->alternatif_id }}">
                                                            <em class="icon ni ni-edit-alt"></em><span>Input Nilai</span>
                                                        </a>
                                                    </li>

                                                    <li class="divider"></li>
                                                    <li>
                                                        <form action="{{ route('alternatif.destroy', $alt->alternatif_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus alternatif ini?')" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">
                                                                <em class="icon ni ni-trash"></em><span>Hapus</span>
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
    <div class="modal fade" id="tambahAlternatifModal" tabindex="-1" aria-labelledby="tambahAlternatifModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> <!-- ✅ modal-sm + centered -->
            <div class="modal-content">
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalInputNilai" tabindex="-1" aria-labelledby="modalInputNilaiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Konten form akan dimuat via AJAX -->
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#tambahAlternatifModal').on('show.bs.modal', function() {
                let modal = $(this);
                let modalContent = modal.find('.modal-content');

                // Load konten dari route
                $.ajax({
                    url: "{{ route('alternatif.create') }}",
                    type: 'GET',
                    success: function(response) {
                        modalContent.html(response);
                    },
                    error: function() {
                        modalContent.html(
                            '<div class="modal-body text-center text-danger p-4">Gagal memuat data.</div>'
                        );
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-input-nilai').on('click', function(e) {
                e.preventDefault();
                let alternatifId = $(this).data('id');
                let modal = $('#modalInputNilai');
                let modalContent = modal.find('.modal-content');

                $.ajax({
                    url: "/mahasiswa/alternatif/nilai/" + alternatifId,
                    method: 'GET',
                    success: function(response) {
                        modalContent.html(response);
                        modal.modal('show');
                    },
                    error: function() {
                        modalContent.html(
                            '<div class="modal-body text-center text-danger p-4">Gagal memuat form nilai.</div>'
                        );
                        modal.modal('show');
                    }
                });
            });
        });
    </script>
@endpush
