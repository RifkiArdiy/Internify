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

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let messages = `{!! implode('<br>', $errors->all()) !!}`;
                NioApp.Toast(
                    `<h5>Input Gagal</h5><p>${messages}</p>`,
                    'error', {
                        position: 'bottom-right',
                        icon: 'auto',
                        clear: true
                    }
                );
            });
        </script>
    @endif

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <h4 class="mb-3">Bobot Kriteria - {{ $mahasiswa->user->name }}</h4>

            <form method="POST" action="{{ route('kriteria.bobot.update') }}">
                @csrf

                @foreach ($kriterias as $kriteria)
                    <div class="mb-3">
                        <label>{{ $kriteria->nama }} ({{ $kriteria->kode }})</label>
                        <input type="number" name="bobot[{{ $kriteria->kriteria_id }}]" step="0.01" min="0"
                            max="1" class="form-control"
                            value="{{ old('bobot.' . $kriteria->kriteria_id, $bobotLama[$kriteria->kriteria_id] ?? '') }}"
                            required>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Simpan Bobot</button>
            </form>
        </div>
    </div>
@endsection
