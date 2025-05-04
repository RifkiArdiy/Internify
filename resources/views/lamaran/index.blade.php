@extends('layouts.app')

@section('title', 'Form Lamaran Magang')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm rounded">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Formulir Lamaran Magang</h4>
                </div>

                <div class="card-body">
                    @auth
                        @if (auth()->user()->mahasiswa)
                            <livewire:lamaran-form />
                        @else
                            <div class="alert alert-warning">
                                Hanya akun mahasiswa yang dapat mengisi form lamaran magang.
                            </div>
                        @endif
                    @else
                        <div class="alert alert-danger">
                            Anda harus login terlebih dahulu.
                        </div>
                    @endauth
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
