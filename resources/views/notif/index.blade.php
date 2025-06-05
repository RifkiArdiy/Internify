@extends('layouts.app')

@section('content')
    <div class="container">

        @if (Auth::user()->getRole() === 'Mahasiswa')
            @if($notif_magang_list->isNotEmpty())
                @foreach($notif_magang_list as $notif)
                    <div class="card shadow-sm border-0 mb-3">
                        <div class="card-body d-flex align-items-start">
                            <div class="me-3">
                                @if ($notif['m_status'] === 'Ditolak')
                                    <em class="icon icon-circle bg-danger-dim ni ni-cross fs-2 text-danger"></em>
                                @elseif ($notif['m_status'] === 'Disetujui')
                                    <em class="icon icon-circle bg-success-dim ni ni-check fs-2 text-success"></em>
                                @elseif ($notif['m_status'] === 'Pending')
                                    <em class="icon icon-circle bg-warning-dim ni ni-clock fs-2 text-warning"></em>
                                @else
                                    <em class="icon icon-circle bg-secondary-dim ni ni-info fs-2 text-muted"></em>
                                @endif
                            </div>
                            <div>
                                <p class="mb-1">
                                    Lamaran magang anda di <strong>{{ $notif['m_company_name'] }}</strong>
                                    @if($notif['m_status'] === 'Pending')
                                        sedang <strong>diproses</strong>.
                                    @else
                                        telah <strong>{{ strtolower($notif['m_status']) }}</strong>
                                    @endif
                                </p>
                                <small class="text-muted">
                                    <em class="ni ni-clock me-1"></em>{{ $notif['m_time'] }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info" role="alert">
                    <em class="ni ni-info me-1"></em> Belum ada notifikasi terbaru.
                </div>
            @endif

        @elseif (Auth::user()->getRole() === 'Company')
            @if($notif_pending_list->isNotEmpty())
                @foreach ($notif_pending_list as $item)
                    <div class="card shadow-sm border-0 mb-3">
                        <div class="card-body d-flex align-items-start">
                            <div class="me-3">
                                <em class="icon icon-circle bg-warning-dim ni ni-clock fs-2 text-warning"></em>
                            </div>
                            <div>
                                <p class="mb-1">
                                    <strong>{{ $item['c_mahasiswa_name'] }}</strong> menunggu review magang
                                    di posisi <strong>{{ $item['c_lowongan_title'] }}</strong>.
                                </p>
                                <small class="text-muted">
                                    <em class="ni ni-clock me-1"></em>{{ $item['c_created_at'] }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info" role="alert">
                    <em class="ni ni-info me-1"></em> Belum ada lamaran magang yang menunggu review.
                </div>
            @endif
        @endif
    </div>
@endsection