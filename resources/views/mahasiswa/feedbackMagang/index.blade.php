@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h4>{{$feedback->judul_feedback}}</h4>
    @for ($i=0; $i<$feedback->rating; $i++)
        <i class="icon ni ni-star-fill"></i>
    @endfor

    <p>{!!$feedback->feedback!!}</p>

            <div class="mt-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('feedback-edit', $feedback->feedback_id) }}" class="btn btn-primary">Edit Feedback</a>
        </div>


@endsection