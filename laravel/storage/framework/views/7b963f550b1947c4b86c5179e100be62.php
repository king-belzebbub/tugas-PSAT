<!DOCTYPE html>
<html>

<head>
    <title>Daftar Dokter</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/dokter.css')); ?>">
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="logo-center">
            <img src="<?php echo e(asset('image/kivotoshospital_ba-style@nulla.top.png')); ?>" style="width: 150px; height: auto;" alt="Logo Liveal" />
        </div>
        <nav>
            <ul class="menu-nav">
                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li><a href="<?php echo e(url('/pasien')); ?>">Pasien</a></li>
                <li><a href="<?php echo e(url('/dokter')); ?>">Dokter</a></li>
                <li><a href="<?php echo e(url('/tindakan')); ?>">Tindakan</a></li>
                <li><a href="<?php echo e(url('/kunjungan')); ?>">Kunjungan</a></li>
                <li><a href="/detail kunjungan.html">Detail Kunjungan</a></li>
            </ul>
        </nav>
    </header>

    <!-- JUDUL -->
    <h1>Daftar Dokter</h1>

    <!-- TOMBOL TAMBAH -->
    <div class="container">
        <div style="text-align: right; margin-bottom: 15px;">
            <button onclick="openOverlay()" class="tambah-btn">+ Tambah Dokter</button>
        </div>

        <!-- TABEL DOKTER -->
        <table class="doctor-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Spesialis</th>
                    <th>Jadwal</th>
                    <th>No STR</th>
                    <th>Lainnya</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $dokters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($dokter->id); ?></td>
                        <td><?php echo e($dokter->nama); ?></td>
                        <td><?php echo e($dokter->spesialis); ?></td>
                        <td><?php echo e($dokter->jadwal_praktek); ?></td>
                        <td><?php echo e($dokter->no_str); ?></td>
                        <td>
                            <span class="status-badge">Secure Data</span>
                            <button onclick="openOverlay(<?php echo e($dokter); ?>)" class="edit-btn">Edit</button>
                            <form action="<?php echo e(url('/dokter/' . $dokter->id)); ?>" method="POST" style="display:inline;"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="delete-btn">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <!-- OVERLAY FORM -->
    <div id="formOverlay" class="overlay">
        <div class="overlay-content">
            <span class="close-btn" onclick="closeOverlay()">&times;</span>
            <h2 id="formTitle">Tambah Dokter Baru</h2>
            <form id="dokterForm" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="formMethod" name="_method" value="POST">
                <input type="hidden" id="dokterId" name="id" value="">

                <div class="form-group">
                    <label for="nama">Nama Dokter</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="spesialis">Spesialis</label>
                    <input type="text" id="spesialis" name="spesialis" required>
                </div>

                <div class="form-group">
                    <label for="jadwal_praktek">Jadwal Praktek</label>
                    <input type="text" id="jadwal_praktek" name="jadwal_praktek" required>
                </div>

                <div class="form-group">
                    <label for="no_str">No STR</label>
                    <input type="text" id="no_str" name="no_str" required>
                </div>

                <button type="submit" class="submit-btn">Simpan</button>
            </form>
        </div>
    </div>

    <!-- FOOTER -->
    <footer style="background-color: #0a324d; color: white; padding: 40px 0; margin-top: 200px;">
        <div style="text-align: center;">
            <p style="margin: 5px 0;">© 2025 Kivotos hospital, All rights reserved.</p>
            <p style="margin: 0;">📍 Jl. Sakit No.666, Indonesia | ☎ (021) 124-8876</p>
        </div>
    </footer>

    <script>
        // Perbaikan fungsi openOverlay
function openOverlay(dokter = null) {
    const overlay = document.getElementById('formOverlay');
    const form = document.getElementById('dokterForm');
    const formTitle = document.getElementById('formTitle');

    if (dokter) {
        // Edit mode
        formTitle.textContent = 'Edit Data Dokter';
        document.getElementById('formMethod').value = 'PUT';
        document.getElementById('dokterId').value = dokter.id;
        document.getElementById('nama').value = dokter.nama;
        document.getElementById('spesialis').value = dokter.spesialis;
        document.getElementById('jadwal_praktek').value = dokter.jadwal_praktek;
        document.getElementById('no_str').value = dokter.no_str;
        form.action = `/dokter/${dokter.id}`;
    } else {
        // Add mode
        formTitle.textContent = 'Tambah Dokter Baru';
        document.getElementById('formMethod').value = 'POST';
        form.reset();
        form.action = '/dokter';
    }

    overlay.style.display = 'flex';
}

        function closeOverlay() {
            document.getElementById('formOverlay').style.display = 'none';
        }

        // Close overlay when clicking outside content
        window.onclick = function (event) {
            const overlay = document.getElementById('formOverlay');
            if (event.target == overlay) {
                closeOverlay();
            }
        }
    </script>
</body>

</html>
<?php /**PATH C:\Users\cuken\Downloads\Desktop\Dokumen\GitHub\tugas-PSAT\laravel\resources\views/dokter.blade.php ENDPATH**/ ?>