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

            <form method="POST" action="{{ route('lowongan-magang.update', $logang->lowongan_id) }}">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Perusahaan</label>
                            <select name="company" class="form-control js-select2" data-search="on" required>
                                <option value="">- Pilih Perusahaan -</option>
                                @foreach ($companies as $item)
                                    <option value="{{ $item->company_id }}"
                                        {{ $logang->company_id == $item->company_id ? 'selected' : '' }}>
                                        {{ $item->user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Periode Magang</label>
                            <select name="period" class="form-control js-select2" data-search="on" required>
                                <option value="">- Pilih Periode -</option>
                                @foreach ($periode as $item)
                                    <option value="{{ $item->period_id }}"
                                        {{ $logang->period_id == $item->period_id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="title"
                                value="{{ old('title', $logang->title) }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label d-flex justify-content-between align-items-center">
                                <span>Kategori Lowongan:</span>
                                <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                    data-bs-target="#addKategoriModal">
                                    <em class="icon ni ni-plus"></em>
                                </a>
                            </label>

                            <select name="kategori" class="form-control js-select2 d-none" required
                                data-placeholder="Pilih kategori Dibutuhkan">
                                <option value="">- Pilih Kategori -</option>
                                @foreach ($kategoris as $item)
                                    <option value="{{ $item->kategori_id }}"
                                        {{ $logang->kategori_id == $item->kategori_id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label d-flex justify-content-between align-items-center">
                                <span>Benefit: <span class="text-danger">*</span></span>
                                <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                    data-bs-target="#addBenefitModal">
                                    <em class="icon ni ni-plus"></em>
                                </a>
                            </label>

                            <select class="form-control js-select2 d-none" name="benefits[]" multiple="multiple" required
                                data-placeholder="Pilih Benefit yang Ditawarkan">
                                @foreach ($benefits as $benefit)
                                    <option value="{{ $benefit->benefit_id }}"
                                        {{ in_array($benefit->benefit_id, old('benefits', $logang->benefits->pluck('benefit_id')->toArray())) ? 'selected' : '' }}>
                                        {{ $benefit->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Deskripsi</label>
                            <div id="quill-editor" style="height: 200px;">{!! old('description', $logang->description) !!}</div>
                            <input type="hidden" name="description" id="description">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Kriteria</label>
                            <div id="quill-requirements" style="height: 200px;">{!! old('requirements', $logang->requirements) !!}</div>
                            <input type="hidden" name="requirements" id="requirements">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Provinsi</label>
                            <select name="province_id" id="province" class="form-control js-select2" data-search="on"
                                required>
                                <option value="">- Pilih Provinsi -</option>
                                @foreach ($provinces as $provinsi)
                                    <option value="{{ $provinsi->id }}"
                                        {{ $logang->province_id == $provinsi->id ? 'selected' : '' }}>
                                        {{ $provinsi->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Kabupaten/Kota</label>
                            <select name="regency_id" id="regency" class="form-control js-select2" data-search="on"
                                required>
                                <option value="">- Pilih Kabupaten -</option>
                                @if ($logang->regency)
                                    <option value="{{ $logang->regency_id }}" selected>{{ $logang->regency->name }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Kecamatan</label>
                            <select name="district_id" id="district" class="form-control js-select2" data-search="on"
                                required>
                                <option value="">- Pilih Kecamatan -</option>
                                @if ($logang->district)
                                    <option value="{{ $logang->district_id }}" selected>{{ $logang->district->name }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Kelurahan/Desa</label>
                            <select name="village_id" id="village" class="form-control js-select2" data-search="on"
                                required>
                                <option value="">- Pilih Kelurahan -</option>
                                @if ($logang->village)
                                    <option value="{{ $logang->village_id }}" selected>{{ $logang->village->name }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                        <a href="{{ route('lowongan-magang.index') }}" class="btn btn-secondary mt-3">Kembali</a>
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
        const quillDescription = new Quill('#quill-editor', {
            theme: 'snow',
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

        const quillRequirements = new Quill('#quill-requirements', {
            theme: 'snow',
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
    <script>
        $(document).ready(function() {
            function loadRegencies(provinceID, selectedID = null) {
                $.get('/admin/get-regencies', {
                    province_id: provinceID
                }, function(data) {
                    $('#regency').html('<option value="">- Pilih Kabupaten -</option>');
                    data.forEach(function(item) {
                        $('#regency').append(
                            `<option value="${item.id}" ${item.id == selectedID ? 'selected' : ''}>${item.name}</option>`
                        );
                    });
                });
            }

            function loadDistricts(regencyID, selectedID = null) {
                $.get('/admin/get-districts', {
                    regency_id: regencyID
                }, function(data) {
                    $('#district').html('<option value="">- Pilih Kecamatan -</option>');
                    data.forEach(function(item) {
                        $('#district').append(
                            `<option value="${item.id}" ${item.id == selectedID ? 'selected' : ''}>${item.name}</option>`
                        );
                    });
                });
            }

            function loadVillages(districtID, selectedID = null) {
                $.get('/admin/get-villages', {
                    district_id: districtID
                }, function(data) {
                    $('#village').html('<option value="">- Pilih Kelurahan -</option>');
                    data.forEach(function(item) {
                        $('#village').append(
                            `<option value="${item.id}" ${item.id == selectedID ? 'selected' : ''}>${item.name}</option>`
                        );
                    });
                });
            }

            // Load otomatis saat halaman dibuka
            const provinceID = '{{ $logang->province_id }}';
            const regencyID = '{{ $logang->regency_id }}';
            const districtID = '{{ $logang->district_id }}';
            const villageID = '{{ $logang->village_id }}';

            if (provinceID) loadRegencies(provinceID, regencyID);
            if (regencyID) loadDistricts(regencyID, districtID);
            if (districtID) loadVillages(districtID, villageID);

            // Saat diganti manual
            $('#province').change(function() {
                loadRegencies($(this).val());
                $('#district').html('');
                $('#village').html('');
            });

            $('#regency').change(function() {
                loadDistricts($(this).val());
                $('#village').html('');
            });

            $('#district').change(function() {
                loadVillages($(this).val());
            });
        });
    </script>
@endpush
