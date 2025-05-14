@extends('layouts.app')

@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form action="{{ route('laporan.update', $logs->log_id) }}" enctype="multipart/form-data"
                method="POST">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswa->mahasiswa_id }}">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="dosen_id">Dosen:<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <select class="form-select js-select2" name="dosen_id" required>
                                    <option disabled selected>Pilih Dosen</option>
                                    @foreach ($dosen as $dsn)
                                        <option value="{{ $dsn->dosen_id }}">{{ $dsn->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="report_text">Isi Laporan:<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <textarea class="form-control" name="report_text" rows="5" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('laporan') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
