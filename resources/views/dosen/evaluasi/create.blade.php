@extends('layouts.app')

@section('content')
    
    <form action="{{ route('evaluasi.store') }}" method="POST"> 
        @csrf     
        <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswaId }}">
        <input type="hidden" name="company_id" value="{{ $companyId }}">
        <input type="hidden" name="log_id" value="{{ $logId }}">

        <div class="mb-3">
            <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
            <input type="text" class="form-control" value="{{ \App\Models\Mahasiswa::find($mahasiswaId)?->user->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="company_id" class="form-label">Perusahaan</label>
            <input type="text" class="form-control" value="{{ \App\Models\Company::find($companyId)?->user->name }}" readonly>
        </div>
        
        @php
            $log = \App\Models\Log::find($logId);
        @endphp

        <div class="mb-3">
            <label for="report_text" class="form-label">Laporan Mahasiswa</label>
            <textarea class="form-control" rows="4" readonly>{{ strip_tags($log->report_text) }}</textarea>
        </div>

        
        <div class="mb-3">
            <label for="evaluasi" class="form-label">Evaluasi</label>
            <div id="quill-editor" style="height: 200px;">{!! old('evaluasi') !!}</div>
            <input type="hidden" name="evaluasi" id="evaluasi">
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection

@push('js')
<script>
    const toolbarOptions = [
        ['bold', 'italic', 'underline'],
        ['link'],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        ['clean']  // remove formatting
    ];

    const quill = new Quill('#quill-editor', {
        theme: 'snow',
        modules: {
            toolbar: toolbarOptions
        }
    });

    const form = document.querySelector('form');
    form.onsubmit = function () {
        document.querySelector('#evaluasi').value = quill.root.innerHTML;
    };
</script>
@endpush
