@extends('layouts.app')

@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <style>
                #quill-editor, #quill-requirements {
                    overflow-x: auto;
                    word-wrap: break-word;
                }
                .ql-editor {
                    word-break: break-word;
                }
            </style>
            <form method="POST" action="{{ route('companys-lowongan-magang.store') }}">
                @csrf
                <div class="row g-4">
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Perusahaan</label>
                            <select name="company" id="company" class="form-control" required>
                                <option value="">- Pilih Perusahaan -</option>
                                @foreach ($companies as $item)
                                    <option value="{{ $item->company_id }}">{{ $item->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Periode Magang</label>
                            <select name="period" id="period" class="form-control" required>
                                <option value="">- Pilih Periode Magang -</option>
                                @foreach ($periode as $item)
                                    <option value="{{ $item->period_id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Judul: <span class="text-danger">*</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{ old('title') }}" placeholder="Masukkan Judul Lowongan" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label d-flex justify-content-between align-items-center">
                                <span>Kategori Lowongan: <span class="text-danger">*</span></span>
                                <!-- Button to trigger modal -->
                                <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                    data-bs-target="#addKategoriModal">
                                    <em class="icon ni ni-plus"></em>
                                </a>
                            </label>
                            <select class="form-control js-select2 d-none" name="kategori" required
                                data-placeholder="Pilih kategori Dibutuhkan">
                                @foreach ($kategoris as $item)
                                    <option value="{{ $item->kategori_id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label d-flex justify-content-between align-items-center">
                                <span>Benefit: <span class="text-danger">*</span></span>
                                <!-- Button to trigger modal -->
                                <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                    data-bs-target="#addBenefitModal">
                                    <em class="icon ni ni-plus"></em>
                                </a>
                            </label>
                            <select class="form-control js-select2 d-none" name="benefits[]" multiple="multiple" required
                                data-placeholder="Pilih Benefit">
                                @foreach ($benefits as $benefit)
                                    <option value="{{ $benefit->benefit_id }}"
                                        {{ collect(old('benefits'))->contains($benefit->benefit_id) ? 'selected' : '' }}>
                                        {{ $benefit->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Deskripsi: <span class="text-danger">*</label>
                            <!-- Editor tampil di sini -->
                            <div id="quill-editor" style="height: 200px;">{!! old('description') !!}</div>
                            <!-- Data yang akan dikirim ke controller -->
                            <input type="hidden" name="description" id="description" value="{!! old('description') !!}">
                        </div>
                    </div>
                    <!-- Requirements (dengan Quill) -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Syarat & Ketentuan: <span class="text-danger">*</label>
                            <!-- Quill Editor -->
                            <div id="quill-requirements" style="height: 200px;">{!! old('requirements') !!}</div>
                            <!-- Hidden input to store Quill content -->
                            <input type="hidden" name="requirements" id="requirements" value="{!! old('requirements') !!}">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Provinsi</label>
                            <select name="province_id" id="province" class="form-control" data-search="on" required>
                                <option value="">- Pilih Provinsi -</option>
                                @foreach ($provinces as $provinsi)
                                    <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Kabupaten/Kota</label>
                            <select name="regency_id" id="regency" class="form-control" required>
                                <option value="">- Pilih Kabupaten -</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Kecamatan</label>
                            <select name="district_id" id="district" class="form-control" required>
                                <option value="">- Pilih Kecamatan -</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Kelurahan/Desa</label>
                            <select name="village_id" id="village" class="form-control" required>
                                <option value="">- Pilih Kelurahan -</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <a href="{{ route('companys-lowongan-magang.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- Modal Add (Centered & Styled) -->
    <div class="modal fade" id="addBenefitModal" tabindex="-1" aria-labelledby="addBenefitModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm"> <!-- ✅ modal-sm + centered -->
            <div class="modal-content">
            </div>
        </div>
    </div>
    <div class="modal fade" id="addKategoriModal" tabindex="-1" aria-labelledby="addKategoriModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm"> <!-- ✅ modal-sm + centered -->
            <div class="modal-content">
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Inisialisasi Quill untuk Deskripsi
        const quillDescription = new Quill('#quill-editor', {
            theme: 'snow',
            placeholder: 'Masukkan Deskripsi Lowongan',
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

        // Inisialisasi Quill untuk Kriteria
        const quillRequirements = new Quill('#quill-requirements', {
            theme: 'snow',
            placeholder: 'Masukkan Kriteria Magang',
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
            document.querySelector('input[name=description]').value = quillDescription.root.innerHTML;
            document.querySelector('input[name=requirements]').value = quillRequirements.root.innerHTML;
        };
    </script>
    <script>
        $(document).ready(function() {
            $('#addBenefitModal').on('show.bs.modal', function() {
                let modal = $(this);
                let modalContent = modal.find('.modal-content');

                // Load konten dari route
                $.ajax({
                    url: "{{ route('benefits.create') }}",
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
            $('#addKategoriModal').on('show.bs.modal', function() {
                let modal = $(this);
                let modalContent = modal.find('.modal-content');

                // Load konten dari route
                $.ajax({
                    url: "{{ route('kategoris.create') }}",
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
    {{-- <script>
        $(document).ready(function() {
            $('#province').change(function() {
                let provinceID = $(this).val();
                $.get('/get-regencies', {
                    province_id: provinceID
                }, function(data) {
                    $('#regency').html('<option value="">- Pilih Kabupaten -</option>');
                    data.forEach(function(item) {
                        $('#regency').append(
                            `<option value="${item.id}">${item.name}</option>`);
                    });
                    $('#district').html('<option value="">- Pilih Kecamatan -</option>');
                    $('#village').html('<option value="">- Pilih Kelurahan -</option>');
                });
            });

            $('#regency').change(function() {
                let regencyID = $(this).val();
                $.get('/get-districts', {
                    regency_id: regencyID
                }, function(data) {
                    $('#district').html('<option value="">- Pilih Kecamatan -</option>');
                    data.forEach(function(item) {
                        $('#district').append(
                            `<option value="${item.id}">${item.name}</option>`);
                    });
                    $('#village').html('<option value="">- Pilih Kelurahan -</option>');
                });
            });

            $('#district').change(function() {
                let districtID = $(this).val();
                $.get('/get-villages', {
                    district_id: districtID
                }, function(data) {
                    $('#village').html('<option value="">- Pilih Kelurahan -</option>');
                    data.forEach(function(item) {
                        $('#village').append(
                            `<option value="${item.id}">${item.name}</option>`);
                    });
                });
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            // Inisialisasi awal Select2
            $('#province, #regency, #district, #village').select2({
                width: '100%',
                placeholder: 'Pilih opsi',
                allowClear: true
            });

            $('#province').on('change', function() {
                let provinceID = $(this).val();
                $('#regency').html('<option value="">Memuat...</option>').trigger('change');

                $.get('/company/get-regencies', {
                    province_id: provinceID
                }, function(data) {
                    let regencyOptions = '<option value="">- Pilih Kabupaten -</option>';
                    data.forEach(function(item) {
                        regencyOptions +=
                            `<option value="${item.id}">${item.name}</option>`;
                    });
                    $('#regency').html(regencyOptions).trigger('change');
                    $('#district').html('<option value="">- Pilih Kecamatan -</option>').trigger(
                        'change');
                    $('#village').html('<option value="">- Pilih Kelurahan -</option>').trigger(
                        'change');
                });
            });

            $('#regency').on('change', function() {
                let regencyID = $(this).val();
                $('#district').html('<option value="">Memuat...</option>').trigger('change');

                $.get('/company/get-districts', {
                    regency_id: regencyID
                }, function(data) {
                    let districtOptions = '<option value="">- Pilih Kecamatan -</option>';
                    data.forEach(function(item) {
                        districtOptions +=
                            `<option value="${item.id}">${item.name}</option>`;
                    });
                    $('#district').html(districtOptions).trigger('change');
                    $('#village').html('<option value="">- Pilih Kelurahan -</option>').trigger(
                        'change');
                });
            });

            $('#district').on('change', function() {
                let districtID = $(this).val();
                $('#village').html('<option value="">Memuat...</option>').trigger('change');

                $.get('/company/get-villages', {
                    district_id: districtID
                }, function(data) {
                    let villageOptions = '<option value="">- Pilih Kelurahan -</option>';
                    data.forEach(function(item) {
                        villageOptions +=
                            `<option value="${item.id}">${item.name}</option>`;
                    });
                    $('#village').html(villageOptions).trigger('change');
                });
            });
        });
    </script>
@endpush
