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

            <form method="POST" action="{{ route('lowonganMagang.update', $logang->lowongan_id) }}">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Perusahaan</label>
                            <select name="company" class="form-control" required>
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
                            <select name="period" class="form-control" required>
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

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="title"
                                value="{{ old('title', $logang->title) }}" required>
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
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="location" class="form-control"
                                value="{{ old('location', $logang->location) }}" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
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

@push('js')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
@endpush
