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
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Nama Lengkap: <span
                                    class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="name"
                                    placeholder="Masukkan nama lengkap perusahaan" value="{{ old('name') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="username">Username: <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="username" placeholder="Contoh: johndoe123"
                                    value="{{ old('username') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="email-address-1">Email: <span
                                    class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="email" class="form-control" name="email"
                                    placeholder="Contoh: johndoe@example.com" value="{{ old('email') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="password">Password: <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" name="password" placeholder="Minimal 6 karakter"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="no_telp">No Telepon:</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" name="no_telp" placeholder="Masukkan dengan awalan +62 (Contoh: 628123456789)"
                                    value="{{ old('no_telp') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="alamat">Alamat:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="alamat"
                                    placeholder="Masukkan Alamat (Minimal 10 Karakter)" value="{{ old('alamat') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Tentang Perusahaan: <span class="text-danger">*</span></label>
                            <!-- Editor tampil di sini -->
                            <div id="quill-editor" style="height: 200px;">{!! old('about_company') !!}</div>
                            <!-- Data yang akan dikirim ke controller -->
                            <input type="hidden" name="about_company" id="about_company"
                                value="{{ old('about_company') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="image">Foto Profil:</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>
                            <small class="form-text text-muted">Pilih file gambar baru. Format: jpeg, png, jpg, gif. Maks:
                                2MB.</small>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('companies.index') }}" class="btn btn-secondary">Kembali</a>
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
        const quillAboutComp = new Quill('#quill-editor', {
            theme: 'snow',
            placeholder: 'Masukkan Deskripsi Perusahaan',
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
        form.addEventListener('submit', function(e) {
            const html = quillAboutComp.root.innerHTML.trim();
            // Remove if only contains empty line
            const cleanHTML = html === '<p><br></p>' ? '' : html;
            document.querySelector('input[name=about_company]').value = cleanHTML;
        });
    </script>
@endpush
