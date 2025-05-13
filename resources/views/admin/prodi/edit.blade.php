@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('prodi.update', $prodi->prodi_id ?? $prodi->prodi_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>ID Prodi</label>
            <input type="text" name="prodi_id" value="{{ $prodi->prodi_id }}" class="form-control" readonly>
        </div>
        
        <div class="form-group mt-2">
            <label>Nama Prodi</label>
            <input type="text" name="name" value="{{$prodi->name}}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('prodi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
