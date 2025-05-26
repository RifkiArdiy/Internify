@extends('layouts.app')

@section('content')
<div class="card card-bordered card-preview">
    <div class="card-inner">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <style>
            #quill-feedback{
                overflow-x: auto;
                word-wrap: break-word;
            }
            .ql-editor {
                word-break: break-word;
            }
        </style>

        <form method="POST" action="{{ route('feedback-store') }}" enctype="multipart/form-data" class="form-validate is-alter">
            @csrf
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="rating">Rating: <span class="text-danger">*</span></label>
                        <div class="star-rating">
                            @for ($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} required />
                                <label for="star{{ $i }}" title="{{ $i }} stars">&#9733;</label>
                            @endfor
                        </div>
                        @error('rating')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="judul">Judul Feedback: <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Berikan judul untuk feedback anda" required>
                        </div>
                        @error('judul')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="quill-feedback">Isi feedback: <span class="text-danger">*</span></label>
                        <div id="quill-feedback" style="height: 200px;">{!! old('feedback') !!}</div>
                        <input type="hidden" name="feedback" id="feedback">
                        @error('feedback')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('feedback-index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
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
        const quillDescription = new Quill('#quill-feedback', {
            theme: 'snow',
            placeholder: 'Masukkan feedback anda',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['clean']
                ]
            }
        });

        // Set the content of the hidden input before form submission
        document.querySelector('form').addEventListener('submit', function () {
            const feedback = document.querySelector('input[name=feedback]');
            feedback.value = quillDescription.root.innerHTML;
        });
    </script>
@endpush
