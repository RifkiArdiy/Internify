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
            <form action="{{ route('companies.update', $company->company_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Method spoofing untuk mengirimkan method PUT --}}
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Nama Lengkap:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $company->user->name ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="username">Username:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ $company->user->username ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="email">Email:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $company->user->email ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="password">Password:</label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Kosongkan jika tidak ingin diubah">
                                <small class="form-note">Kosongkan field ini jika Anda tidak ingin mengubah
                                    password.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="no_telp">No Telepon:</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="no_telp" name="no_telp"
                                    value="{{ $company->user->no_telp ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="alamat">Alamat:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $company->user->alamat ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Tentang Perusahaan: <span class="text-danger">*</span></label>
                            <!-- Editor tampil di sini -->
                            <div id="quill-editor" style="height: 200px;">{!! old('about_company', $company->about_company) !!}</div>
                            <!-- Data yang akan dikirim ke controller -->
                            <input type="hidden" name="about_company" id="about_company">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="image">Ubah Foto Profil:</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>
                            <small class="form-text text-muted">Pilih file gambar baru untuk mengubah foto profil. Format
                                yang didukung: jpeg, png, jpg, gif. Maksimal 2MB .</small>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
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
