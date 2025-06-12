@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Validasi Gagal',
                    html: `{!! implode('<br>', $errors->all()) !!}`,
                    confirmButtonColor: '#e85347'
                });
            });
        </script>
    @endif
    <div class="card card-bordered card-preview">
        <div class="card-inner">

            <style>
                #quill-editor {
                    overflow-x: auto;
                    word-wrap: break-word;
                }

                .ql-editor {
                    word-break: break-word;
                }
            </style>
            <form action="{{ route('laporan.store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswa->mahasiswa_id }}">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="dosen_id">Dosen:<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <select class="form-select js-select2" name="dosen_id" required>
                                    <option disabled selected>Pilih Dosen</option>
                                    @foreach ($dosen as $dsn)
                                        <option value="{{ $dsn->dosen_id }}">{{ $dsn->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="company_id">Perusahaan:<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                @php
                                    $application = Auth::user()->mahasiswa->applications->first();
                                @endphp
                                <input class="form-control" type="text"
                                    value="{{ $application->lowongans->company->user->name }}" readonly>

                                <input type="hidden" name="company_id"
                                    value="{{ $application->lowongans->company->company_id }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="report_title" class="form-label">Judul Laporan: <span
                                    class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="report_title" name="report_title"
                                    value="{{ old('report_title') }}" placeholder="Contoh: Laporan Hari ke 1" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="report_text">Isi Laporan:<span
                                    class="text-danger">*</span></label>
                            <!-- Editor tampil di sini -->
                            <div id="quill-editor" style="height: 200px;">{!! old('report_text') !!}</div>
                            <!-- Data yang akan dikirim ke controller -->
                            <input type="hidden" name="report_text" id="report_text" value="{!! old('report_text') !!}">
                        </div>
                    </div>

                    <div class="col-12 text-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('laporan') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Inisialisasi Quill untuk Deskripsi
        const quillreport_text = new Quill('#quill-editor', {
            theme: 'snow',
            placeholder: 'Tulis Laporan Harian',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    ['clean']
                ]
            }
        });

        // Gabungkan onsubmit untuk dua input
        const form = document.querySelector('form');
        form.onsubmit = function() {
            document.querySelector('input[name=report_text]').value = quillreport_text.root.innerHTML;
        };
    </script>
@endpush
