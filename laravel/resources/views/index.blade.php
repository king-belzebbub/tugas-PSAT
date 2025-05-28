<!-- Tambahkan ini di dalam <body> sebelum <footer> -->
<section class="form-section">
    <h2>Tambah Data</h2>

    <!-- Form Tambah Pasien -->
    <form action="/pasien" method="POST" class="data-form">
        <!-- @csrf jika file ini diubah jadi Blade -->
        <h3>Tambah Pasien</h3>
        <input type="text" name="nama" placeholder="Nama Pasien" required />
        <input type="text" name="alamat" placeholder="Alamat" required />
        <input type="text" name="no_telp" placeholder="No. Telepon" required />
        <button type="submit">Simpan Pasien</button>
    </form>

    <!-- Form Tambah Dokter -->
<!-- Form Tambah Dokter -->
<form action="/dokter" method="POST">
    @csrf
    <!-- input form -->
    <h3>Tambah dokter</h3>
    <input type="text" name="nama" placeholder="Nama Dokter">
    <input type="text" name="spesialis" placeholder="Spesialis">
    <input type="text" name="jadwal_praktek" placeholder="Jadwal Praktek">
    <input type="text" name="no_str" placeholder="Nomor STR">
    <button type="submit">Simpan</button>
</form>



    <!-- Form Tambah Tindakan -->
    <form action="/tindakan" method="POST" class="data-form">
        <!-- @csrf -->
        <h3>Tambah Tindakan</h3>
        <input type="text" name="nama" placeholder="Nama Tindakan" required />
        <input type="number" name="biaya" placeholder="Biaya" required />
        <button type="submit">Simpan Tindakan</button>
    </form>

    <!-- Form Tambah Kunjungan -->
    <form action="/kunjungan" method="POST" class="data-form">
        <!-- @csrf -->
        <h3>Tambah Kunjungan</h3>
        <input type="number" name="pasien_id" placeholder="ID Pasien" required />
        <input type="number" name="dokter_id" placeholder="ID Dokter" required />
        <input type="date" name="tanggal" required />
        <textarea name="keluhan" placeholder="Keluhan" required></textarea>
        <button type="submit">Simpan Kunjungan</button>
    </form>
</section>
