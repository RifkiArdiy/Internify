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
            <form method="POST" action="{{ route('profil-akademik.store') }}" enctype="multipart/form-data"
                class="form-validate is-alter">
                @csrf
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
                                <label class="form-label" for="{{ $field }}">{{ $label }}
                                    @if (in_array($field, ['etika', 'ipk']))
                                        <span class="text-danger">*</span>
                                    @endif
                                </label>
                                <div class="form-control-wrap">
                                    <input type="file" class="form-control" id="{{ $field }}"
                                        name="{{ $field }}" @if (in_array($field, ['etika', 'ipk'])) required @endif>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-12 text-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('profil-akademik.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
