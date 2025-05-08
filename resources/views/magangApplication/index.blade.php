@extends('layouts.app')

@section('action')
    
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card card-bordered card-preview">
        <div class="card-inner table-responsive">
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid">
                                <label class="custom-control-label" for="uid"></label>
                            </div>
                        </th>
                        <th class="nk-tb-col"><span class="sub-text">Mahasiswa</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Lowongan</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Aksi</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($magangs as $magang)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="uid{{ $magang->magang_id }}">
                                    <label class="custom-control-label" for="uid{{ $magang->magang_id }}"></label>
                                </div>
                            </td>
                            <td class="nk-tb-col">
                                {{ $magang->student->user->name }}
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $magang->lowongan->title }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $magang->status }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <form action="{{ route('magangApplication.update', $magang->magang_id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah anda yakin menyetujui lamaran ini?')">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="Disetujui">
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-light" style="background: rgb(32, 155, 32)">
                                        <span style="padding:5px;">Setuju</span></button>
                                </form>
                                
                                <form action="{{ route('magangApplication.update', $magang->magang_id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah anda yakin menolak lamaran ini?')">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="Ditolak">
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-light" style="background: red;">
                                        <span style="padding: 5px;">Tolak</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
