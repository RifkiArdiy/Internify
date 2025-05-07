@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('prodi.store') }}" method="POST">
        @csrf
        
        <div class="form-group mt-2">
            <label>Nama Prodi</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('prodi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
