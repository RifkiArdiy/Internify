
@extends('layouts.app')

@section('content')
<table class="table table-bordered table-striped table-hover table-sm" style="width: 30%">
    <tr>
        <th>ID</th>
    <td>{{ $comp->company_id }}</td>
</tr>
<tr>
    <th>Nama Perusahaan</th>
    <td>{{ $comp->user->name }}</td>
</tr>
<tr>
    <th>Industri</th>
    <td>{{ $comp->industry }}</td>
</tr>

</table>
<a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>

</body>
@endsection
