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
            #quill-feedback{
                overflow-x: auto;
                word-wrap: break-word;
            }
            .ql-editor {
                word-break: break-word;
            }
        </style>

        <form method="POST" action="{{ route('feedback-update', $feedback->feedback_id) }}" enctype="multipart/form-data" class="form-validate is-alter" id="feedbackForm">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="rating">Rating: <span class="text-danger">*</span></label>
                        <div class="star-rating">
                            @for ($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ $feedback->rating == $i ? 'checked' : '' }} required />
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
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $feedback->judul_feedback ?? '') }}" placeholder="Berikan judul untuk feedback anda" required>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">Isi Feedback: <span class="text-danger">*</span></label>
                        <div id="quill-feedback" style="height: 200px;">{!! old('feedback', $feedback->feedback ?? '') !!}</div>
                        <input type="hidden" name="feedback" id="feedback" required>
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
<style>
    /* star rating styles */
    .star-rating {
        direction: rtl;
        font-size: 1.8rem;
        unicode-bidi: bidi-override;
        display: inline-flex;
    }
    .star-rating input[type="radio"] {
        display: none;
    }
    .star-rating label {
        color: #ddd;
        cursor: pointer;
        padding: 0 5px;
        transition: color 0.2s;
    }
    .star-rating input[type="radio"]:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #f5b301;
    }
</style>
@endpush

@push('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quill = new Quill('#quill-feedback', {
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

        // Fill the hidden input with Quill content on form submit
        const form = document.getElementById('feedbackForm');
        form.addEventListener('submit', function (e) {
            // Update hidden input
            document.getElementById('feedback').value = quill.root.innerHTML;

            // Optionally validate that the editor is not empty
            if (quill.getText().trim().length === 0) {
                e.preventDefault();
                alert('Feedback tidak boleh kosong!');
            }
        });
    });
</script>
@endpush
