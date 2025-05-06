<title>Edit Program Studi</title>


<form method="POST" action="{{ url('/prodi/' . $prodi->prodi_id) }}">
    @csrf
    @method('PUT')

    <div>
        <label>ID Prodi</label>
        <input type="text" name="prodi_id" value="{{ $prodi->prodi_id }}" readonly>

        <label>Nama Prodi</label>
        <input type="text" name="name" value="{{ $prodi->name }}" required>

        <button type="submit">Simpan</button>
    </div>
</form>
