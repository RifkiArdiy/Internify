<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sertifikat Magang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .judul {
            font-size: 24px;
            font-weight: bold;
            margin-top: 40px;
        }
        .nama {
            font-size: 20px;
            margin-top: 20px;
        }
        .tanggal {
            margin-top: 30px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="judul">SERTIFIKAT MAGANG</div>
    <div class="nama">Diberikan kepada: <strong>{{ $nama_mahasiswa }}</strong></div>
    <div class="judul">{{ $judul }}</div>
    <div class="tanggal">Tanggal Cetak: {{ $tanggal }}</div>
</body>
</html>
