<!DOCTYPE html>
<html>
<head>
    <title>Index Prodi</title>
</head>
<body>
    <a href="{{ route('prodi.create') }}"> Tambah</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Program Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prodi as $item)
            <tr>
                <td>{{ $item->prodi_id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="{{ route('prodi.edit', $item->prodi_id) }}">Edit</a> |
                    <form action="{{ route('prodi.destroy', $item->prodi_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
