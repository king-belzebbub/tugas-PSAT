<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah</title>
    <link rel="stylesheet" href="{{ asset('css/tambah.css') }}">
</head>

<body>

    <section class="form-section">
        <h2>Tambah Data</h2>

        <!-- Form Tambah Pasien -->
        <form action="/pasien" method="POST" class="data-form">
            @csrf
            <h3>Tambah Pasien</h3>
            <input type="text" name="nama" placeholder="Nama Pasien" required />
            <input type="text" name="Nik" placeholder="Nik" required />
            <input type="text" name="Tgl_lahir" placeholder="TGL_lahir" required />
            <input type="text" name="alamat" placeholder="Alamat" required />
            <input type="text" name="no_telp" placeholder="No. Telepon" required />
            <button type="submit">Simpan Pasien</button>
        </form>

        <!-- Form Tambah Dokter -->
        <form action="/dokter" method="POST" class="data-form">
            @csrf
            <h3>Tambah Dokter</h3>
            <input type="text" name="nama" placeholder="Nama Dokter" required />
            <input type="text" name="spesialis" placeholder="Spesialis" required />
            <input type="text" name="jadwal_praktek" placeholder="Jadwal Praktek" required />
            <input type="text" name="no_str" placeholder="Nomor STR" required />
            <button type="submit">Simpan Dokter</button>
            <a href="{{ url('/dokter') }}">Ke Halaman Dokter</a>
        </form>

        <!-- Form Tambah Tindakan -->
        <form action="/tindakan" method="POST" class="data-form">
            @csrf
            <h3>Tambah Tindakan</h3>
            <input type="text" name="nama" placeholder="Nama Tindakan" required />
            <input type="number" name="biaya" placeholder="Biaya" required />
            <button type="submit">Simpan Tindakan</button>
        </form>

        <!-- Form Tambah Kunjungan -->
        <form action="/kunjungan" method="POST" class="data-form">
            @csrf
            <h3>Tambah Kunjungan</h3>
            <input type="number" name="pasien_id" placeholder="ID Pasien" required />
            <input type="number" name="dokter_id" placeholder="ID Dokter" required />
            <input type="date" name="tanggal" required />
            <textarea name="keluhan" placeholder="Keluhan" required></textarea>
            <button type="submit">Simpan Kunjungan</button>
        </form>
    </section>

    <footer>
        <p style="text-align: center; padding: 20px;">© 2025 Klinik XYZ</p>
    </footer>

</body>

</html>

