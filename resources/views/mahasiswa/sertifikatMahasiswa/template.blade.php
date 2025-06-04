<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sertifikat Magang</title>
    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", "Helvetica Neue", sans-serif;
            background-color: #f5f6fa;
            color: #364a63;
        }
        .email-wrapper {
            width: 100%;
            padding: 40px 0;
            background-color: #f5f6fa;
        }
        .email-content {
            max-width: 700px;
            margin: auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .email-header {
            background-color: #6576ff;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 40px 30px;
            text-align: center;
        }
        .email-body h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }
        .email-body p {
            font-size: 16px;
            margin: 10px 0;
        }
        .footer {
            padding: 20px;
            font-size: 12px;
            color: #8094ae;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <h1>Sertifikat Magang</h1>
            </div>
            <div class="email-body">
                <h2>{{ $judul }}</h2>
                <p style="margin-top:10px;">Diberikan kepada:</p>
                <p style="font-size: 20px; font-weight: bold; color: #6576ff; margin-top:10px;">
                    {{ Auth::user()->mahasiswa->user->name }}
                </p>
                <p style="margin-top:20px;">Selamat Telah Menyelesaikan Magang {{$lowongan}} di {{$nama_perusahaan}}</p>
                <p style="margin-top:20px;">Pada {{$mulai}} hingga {{$selesai}}</p>
                {{-- <p style="margin-top: 15px;">{{$deskripsi}}</p> --}}
                <p style="margin-top: 20px;">Tanggal Diterbitkan: {{ $tanggal }}</p>
            </div>
            <div class="footer" style="margin-top: -30px;">
                &copy; {{ date('Y') }} Internify
            </div>
        </div>
    </div>
</body>
</html>
