<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/tambah.css')); ?>">
</head>

<body>

    <header>
        <div class="nav-container container">
            <div class="logo">
                <img src="<?php echo e(asset('image/kivotoshospital_ba-style@nulla.top.png')); ?>" alt="Logo">

            </div>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/pasien">Pasien</a></li>
                    <li><a href="/dokter">Dokter</a></li>
                    <li><a href="/tindakan">Tindakan</a></li>
                    <li><a href="/kunjungan">Kunjungan</a></li>
                    <li><a href="/detail_tindakan">Detail Tindakan</a></li>
                </ul>
            </nav>
        </div>
        </header>

    <section class="form-section">
        <h2>Tambah Data</h2>

        <!-- Form Tambah Pasien -->
        <form action="<?php echo e(route('pasien.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" required>

            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" required>

            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" required>

            <label for="alamat">alamat</label>
            <input type="text" name="alamat" id="alamat" required>

            <label for="no_hp">Nomor HP</label>
            <input type="text" name="no_hp" id="no_hp" required>

            <button type="submit">Simpan</button> </form>

        <!-- Form Tambah Dokter -->
        <form action="/dokter" method="POST" class="data-form">
            <?php echo csrf_field(); ?>
            <h3>Tambah Dokter</h3>
            <input type="text" name="nama" placeholder="Nama Dokter" required />
            <input type="text" name="spesialis" placeholder="Spesialis" required />
            <input type="text" name="jadwal_praktek" placeholder="Jadwal Praktek" required />
            <input type="text" name="no_str" placeholder="Nomor STR" required />
            <button type="submit">Simpan Dokter</button>
            <a href="<?php echo e(url('/dokter')); ?>">Ke Halaman Dokter</a>
        </form>

        <!-- Form Tambah Tindakan -->
        <form action="/tindakan" method="POST" class="data-form">
            <?php echo csrf_field(); ?>
            <h3>Tambah Tindakan</h3>
            <input type="text" name="nama_tindakan" placeholder="Nama_Tindakan" required />
            <input type="text" name="harga" placeholder="harga" required />
            <input type="text" name="kode_icd" placeholder="kode_icd" required />
            <button type="submit">Simpan Tindakan</button>
        </form>

        <!-- Form Tambah Kunjungan -->
        <form action="/kunjungan" method="POST">
            <?php echo csrf_field(); ?>
            <input type="number" name="pasien_id" required>
            <input type="number" name="dokter_id" required>
            <input type="date" name="tanggal" required>
            <textarea name="keluhan" required></textarea>
            <button type="submit">Simpan</button>
        </form>

    </section>

    <footer>
        <p style="text-align: center; padding: 20px;">© 2025 Klinik XYZ</p>
    </footer>

</body>

</html>

<?php /**PATH C:\Users\cuken\Downloads\Desktop\Dokumen\GitHub\tugas-PSAT\laravel\resources\views/tambah.blade.php ENDPATH**/ ?>