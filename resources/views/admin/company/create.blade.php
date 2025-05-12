@extends('layouts.app')

@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form action="{{ route('companies.store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Nama Lengkap:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Username:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="username" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="email-address-1">Email:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="pay-amount-1">Password:</label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="phone-no-1">No Telepon:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="no_telp">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Industri:</label>
                            <div class="form-control-wrap">
                                <select class="form-select js-select2" data-search="on" name="industry">
                                    <option value="default_option">Default Option</option>
                                    <option value="Sales">Sales</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Teknologi">Teknologi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="phone-no-1">Alamat:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="alamat">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
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
