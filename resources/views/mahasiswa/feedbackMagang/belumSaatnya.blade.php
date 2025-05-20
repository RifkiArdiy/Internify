@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
@if(isset($error))
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endif
@endsection