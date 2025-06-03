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

            <form method="POST" action="{{ route('profil-akademik.update', $profil->profile_id) }}"
                enctype="multipart/form-data" class="form-validate is-alter">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    @foreach ([
            'bidang_keahlian' => 'Bidang Keahlian',
            'sertifikasi' => 'Sertifikasi',
            'pengalaman' => 'Pengalaman',
            'etika' => 'Etika',
            'ipk' => 'IPK',
        ] as $field => $label)
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="{{ $field }}">{{ $label }}</label>

                                {{-- Simpan nama file lama sebagai hidden input --}}
                                <input type="hidden" name="old_{{ $field }}" value="{{ $profil->$field }}">

                                @if ($profil->$field)
                                    <p class="small mb-1 text-muted">File saat ini: <strong>{{ $profil->$field }}</strong>
                                    </p>
                                @endif

                                <div class="form-control-wrap">
                                    <input type="file" class="form-control" name="{{ $field }}"
                                        id="{{ $field }}">
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-12 text-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a href="{{ route('profil-akademik.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
