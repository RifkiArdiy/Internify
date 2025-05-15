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
            <form method="POST" action="{{ route('lowonganMagang.store') }}">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Perusahaan</label>
                            <select name="company" id="company" class="form-control" required>
                                <option value="">- Pilih Perusahaan -</option>
                                @foreach ($companies as $item)
                                    <option value="{{ $item->company_id }}">{{ $item->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

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

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Judul: <span class="text-danger">*</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{ old('title') }}" placeholder="Masukkan Judul Lowongan" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Deskripsi: <span class="text-danger">*</label>
                            <!-- Editor tampil di sini -->
                            <div id="quill-editor" style="height: 200px;">{!! old('description') !!}</div>
                            <!-- Data yang akan dikirim ke controller -->
                            <input type="hidden" name="description" id="description">
                        </div>
                    </div>
                    <!-- Requirements (dengan Quill) -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Kriteria: <span class="text-danger">*</label>
                            <!-- Quill Editor -->
                            <div id="quill-requirements" style="height: 200px;">{!! old('requirements') !!}</div>
                            <!-- Hidden input to store Quill content -->
                            <input type="hidden" name="requirements" id="requirements">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="location" class="form-control" placeholder="Masukkan Lokasi Magang"
                                value="{{ old('location') }}" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <a href="{{ route('lowonganMagang.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@push('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
{{-- @push('js')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        const quill = new Quill('#quill-editor', {
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

        // Saat form disubmit, simpan isi editor ke dalam input hidden
        const form = document.querySelector('form');
        form.onsubmit = function() {
            const descriptionInput = document.querySelector('input[name=description]');
            descriptionInput.value = quill.root.innerHTML;
        };
    </script>
    <script>
        // Initialize Quill for Requirements
        var quillRequirements = new Quill('#quill-requirements', {
            theme: 'snow'
        });

        // Sync Quill content to hidden input on submit
        const form = document.querySelector('form');
        form.onsubmit = function() {
            const requirementsInput = document.querySelector('input[name=requirements]');
            requirementsInput.value = quillRequirements.root.innerHTML;
        }
    </script>
@endpush --}}
@push('js')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

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
@endpush
