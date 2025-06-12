@extends('layouts.app')

@section('content')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                NioApp.Toast(
                    `<h5>Berhasil</h5><p>{{ session('success') }}</p>`,
                    'success', {
                        position: 'bottom-right',
                        icon: 'auto',
                        clear: true
                    }
                );
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                NioApp.Toast(
                    `<h5>Gagal</h5><p>{{ session('error') }}</p>`,
                    'error', {
                        position: 'bottom-right',
                        icon: 'auto',
                        clear: true
                    }
                );
            });
        </script>
    @endif
    <div class="col-sm-6 col-lg-4 col-xxl-3" style="width: 100%">
        <div class="card card-bordered h-100">
            <div class="card-inner">
                <h4>{{ $feedback->judul_feedback }}</h4>
                @for ($i = 0; $i < $feedback->rating; $i++)
                    <i class="icon ni ni-star-fill"></i>
                @endfor

                <p>{!! $feedback->feedback !!}</p>

                <div class="mt-3">
                    <a href="{{ route('feedback-edit', $feedback->feedback_id) }}" class="btn btn-primary">Edit Feedback</a>
                </div>
            </div>
        </div>
    </div>
@endsection
