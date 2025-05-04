<div>
    <h2>Detail Perusahaan</h2>
    <p><strong>Nama:</strong> {{ $company->name }}</p>
    <p><strong>Kontak:</strong> {{ $company->contact }}</p>
    <p><strong>Alamat:</strong> {{ $company->address }}</p>
    <p><strong>Bidang Industri:</strong> {{ $company->industry }}</p>

    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Kembali</a>
</div>
