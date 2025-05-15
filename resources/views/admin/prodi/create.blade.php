@extends('layouts.app')

@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form action="{{ route('prodi.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label">Nama Prodi: <span class="text-danger">*</label>
                    <input type="text" name="name" class="form-control" required
                        placeholder="Contoh: Teknik Informatika">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                <a href="{{ route('prodi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </form>
        </div>
    </div>
@endsection
