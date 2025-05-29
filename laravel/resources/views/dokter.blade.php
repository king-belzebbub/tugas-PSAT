<!DOCTYPE html>
<html>

<head>
    <title>Daftar Dokter</title>
    <link rel="stylesheet" href="{{ asset('css/dokter.css') }}">
</head>

<body>
    <header>
        <div class="container nav-container">
            <a href="#" class="logo"><img src="/img/logo rs.jpg" width="60" height="60" /></a>
            <nav>
                <ul>
                    <li><a href="/pasien.html">pasien</a></li>
                    <a href="{{ url('/dokter') }}">Dokter</a>
                    <li><a href="/tindakan.html">tindakan</a></li>
                    <li><a href="/kunjungan.html">kunjungan</a></li>
                    <li><a href="/detail kunjungan.html">detail kunjungan</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <h1>Daftar Dokter</h1>
    <div class="container">
        <table class="doctor-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Spesialis</th>
                    <th>Jadwal</th>
                    <th>STR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokters as $dokter)
                    <tr>
                        <td>{{ $dokter->id }}</td>
                        <td>{{ $dokter->nama }}</td>
                        <td>{{ $dokter->spesialis }}</td>
                        <td>{{ $dokter->jadwal }}</td>
                        <td>{{ $dokter->str }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
