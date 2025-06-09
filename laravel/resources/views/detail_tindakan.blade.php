<html>

<head>
    <title>detail_tindakan</title>
    <link rel="stylesheet" href="{{ asset('css/tindakan.css') }}">
</head>

<body>
    <header>
        <div class="container nav-container">
            <a href="#" class="logo"><img src="{{ asset('image/kivotoshospital_ba-style@nulla.top.png') }}" width="150"
                    height="150" /></a>
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}">home</a></li>
                    <li><a href="{{ url('/pasien') }}">Pasien</a></li>
                    <li><a href="{{ url('/dokter') }}">Dokter</a></li>
                    <li><a href="{{ url('/tindakan') }}">tindakan</a></li>
                    <li><a href="{{ url('/kunjungan') }}">kunjungan</a></li>
                    <li><a href="{{ url('/detail_tindakan') }}">detail_tindakan</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <h1>Daftar detail_tindakan</h1>
    <div class="container">
        <table class="tindakan-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>kunjungan_id</th>
                    <th>tindakan_id</th>
                    <th>keterangan</th>
                    <th>subtotal</th>
                    <th>lainnya</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_tindakans as $detail_tindakan)
                    <tr>
                        <td>{{ $detail_tindakan->id }}</td>
                        <td>{{ $detail_tindakan->kunjungan_id }}</td>
                        <td>{{ $detail_tindakan->tindakan_id }}</td>
                        <td>{{ $detail_tindakan->keterangan}}</td>
                        <td>{{ $detail_tindakan->subtotal }}</td>
                        <td>

                            </form>
                            <form action="{{ url('/detail_tindakan/' . $detail_tindakan->id) }}" method="POST" style="display:inline;"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
