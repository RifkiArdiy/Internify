@extends('layouts.app')

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-msg">
                <div class="nk-msg-body bg-white" id="feedback-content">
                    <div class="nk-msg-head">
                        <h4 class="title">Feedback atau Masukan</h4>
                    </div>
                    <div class="nk-msg-reply nk-reply" id="feedback-container" data-simplebar>
                        @if ($feedbacks->isEmpty())
                            <div class="text-center py-5 text-muted">Belum ada feedback tersedia.</div>
                        @else
                            @foreach ($feedbacks as $fb)
                                <div class="nk-reply-item">
                                    <div class="nk-reply-header">
                                        <div class="user-card">
                                            <div class="user-avatar mb bg-teal-dim">
                                                @if ($fb->mahasiswa->user->image)
                                                    <img src="{{ Storage::url('images/users/' . $fb->mahasiswa->user->image) }}"
                                                        alt="{{ $fb->mahasiswa->user->name }}">
                                                @else
                                                    <span>
                                                        {{ strtoupper(collect(explode(' ', $fb->mahasiswa->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="user-name">{{ $fb->mahasiswa->user->name }}</div>
                                        </div>
                                        <div class="date-time">{{ \Carbon\Carbon::parse($fb->created_at)->format('d M Y') }}
                                        </div>
                                    </div>
                                    <div class="nk-reply-body">
                                        <div class="nk-reply-entry entry">
                                            <p><strong>{{ $fb->judul_feedback }}</strong></p>
                                            <p>{!! $fb->feedback !!}</p>
                                            <div class="mt-2">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="icon ni {{ $i <= $fb->rating ? 'ni-star-fill' : 'ni-star' }}"
                                                        style="color: gold;"></i>
                                                @endfor
                                                <span class="text-soft ms-2 small">({{ $fb->rating }})</span>
                                            </div>
                                            <div class="text-muted small mt-1">Lowongan:
                                                {{ $fb->magang->lowongans->title ?? '-' }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
