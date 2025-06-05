@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ url()->previous() }}" class="btn btn-light">
            <em class="icon ni ni-arrow-left"></em>
            <span>Kembali</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if($dosen->user->image)
                        <img src="{{ Storage::url('images/users/' . $dosen->user->image) }}" alt="{{ $dosen->user->name }}"
                            class="img-thumbnail rounded-circle" style="width: 200px; height: 200px;">
                    @else
                        <div class="avatar avatar-xl bg-primary rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 200px; height: 200px;">
                            <span class="fs-2 text-white">
                                {{ strtoupper(collect(explode(' ', $dosen->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                            </span>
                        </div>
                    @endif
                    <h3 class="mt-3">{{ $dosen->user->name }}</h3>
                    <span class="badge bg-primary">{{ $dosen->user->level->level_nama }}</span>
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">NIP</th>
                            <td>{{ $dosen->nip }}</td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>{{ $dosen->user->username }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $dosen->user->email }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td>{{ $dosen->user->no_telp ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $dosen->user->alamat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Dibuat</th>
                            <td>{{ $dosen->user->created_at->format('d F Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection