<title>Tambah Program Studi</title>

<form method="POST" action="{{ url('/prodi/') }}">
    @csrf
    {{-- @method('PUT') --}}

    <div>
        <label>Nama Prodi</label>
        <input type="text" name="name" required>

        <button type="submit">Simpan</button>
    </div>
</form>
