<!DOCTYPE html>
<html>

<head>
    <title>Daftar Dokter</title>
</head>

<body>
    <h1>Daftar Dokter</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Spesialis</th>
                <th>Jadwal Praktek</th>
                <th>Nomor STR</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokters as $dokter)
                <tr>
                    <td>{{ $dokter->nama }}</td>
                    <td>{{ $dokter->spesialis }}</td>
                    <td>{{ $dokter->jadwal_praktek }}</td>
                    <td>{{ $dokter->no_str }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
