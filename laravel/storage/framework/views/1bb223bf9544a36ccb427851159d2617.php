<!DOCTYPE html>
<html>

<head>
    <title>Daftar Pasien</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/pasien.css')); ?>">
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="logo-center">
            <img src="<?php echo e(asset('image/kivotoshospital_ba-style@nulla.top.png')); ?>" style="width: 150px; height: auto;"
                alt="Logo Liveal" />
        </div>
        <nav>
            <ul class="menu-nav">
                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li><a href="<?php echo e(url('/pasien')); ?>">Pasien</a></li>
                <li><a href="<?php echo e(url('/dokter')); ?>">Dokter</a></li>
                <li><a href="<?php echo e(url('/tindakan')); ?>">Tindakan</a></li>
                <li><a href="<?php echo e(url('/kunjungan')); ?>">Kunjungan</a></li>
                <li><a href="<?php echo e(url('/detail-tindakan')); ?>">Detail Tindakan</a></li>
            </ul>
        </nav>
    </header>

    <!-- JUDUL -->
    <h1>Daftar Pasien</h1>

    <!-- TOMBOL TAMBAH -->
    <div class="container">
        <div style="text-align: right; margin-bottom: 15px;">
            <button onclick="openOverlay()" class="tambah-btn">+ Tambah Pasien</button>
        </div>

        <!-- TABEL PASIEN -->
        <table class="pasien-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>NIK</th>
                    <th>Tgl Lahir</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Lainnya</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pasiens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pasien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pasien->id); ?></td>
                        <td><?php echo e($pasien->nama); ?></td>
                        <td><?php echo e($pasien->nik); ?></td>
                        <td><?php echo e($pasien->tgl_lahir); ?></td>
                        <td><?php echo e($pasien->alamat); ?></td>
                        <td><?php echo e($pasien->no_hp); ?></td>
                        <td>
                            <span class="status-badge">Secure Data</span>
                            <button onclick='openOverlay(<?php echo json_encode($pasien, 15, 512) ?>)' class="edit-btn">Edit</button>
                            <form action="<?php echo e(url('/pasien/' . $pasien->id)); ?>" method="POST" style="display:inline;"
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
            <h2 id="formTitle">Tambah Pasien Baru</h2>
            <form id="pasienForm" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="formMethod" name="_method" value="POST">
                <input type="hidden" id="pasienId" name="id" value="">

                <div class="form-group">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" id="nik" name="nik" required>
                </div>

                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" id="no_hp" name="no_hp" required>
                </div>

                <button type="submit" class="submit-btn">Simpan</button>
            </form>
        </div>
    </div>

    <!-- FOOTER -->
    <footer style="background-color: #0a324d; color: white; padding: 40px 0; margin-top: 200px;">
        <div style="text-align: center;">
            <p style="margin: 5px 0;">© 2025 kivotos hospital, All rights reserved.</p>
            <p style="margin: 0;">📍 Jl. Sakit No.666, Indonesia | ☎ (021) 124-8876</p>
        </div>
    </footer>

    <script>
        function openOverlay(pasien = null) {
            const overlay = document.getElementById('formOverlay');
            const form = document.getElementById('pasienForm');
            const formTitle = document.getElementById('formTitle');

            if (pasien) {
                // Edit mode
                formTitle.textContent = 'Edit Data Pasien';
                document.getElementById('formMethod').value = 'PUT';
                document.getElementById('pasienId').value = pasien.id;
                document.getElementById('nama').value = pasien.nama;
                document.getElementById('nik').value = pasien.nik;
                document.getElementById('tgl_lahir').value = pasien.tgl_lahir;
                document.getElementById('alamat').value = pasien.alamat;
                document.getElementById('no_hp').value = pasien.no_hp;
                form.action = `/pasien/${pasien.id}`;
            } else {
                // Add mode
                formTitle.textContent = 'Tambah Pasien Baru';
                document.getElementById('formMethod').value = 'POST';
                document.getElementById('pasienId').value = '';
                form.reset();
                form.action = '/pasien';
            }

            overlay.style.display = 'flex';
        }

        function closeOverlay() {
            document.getElementById('formOverlay').style.display = 'none';
        }

        window.onclick = function (event) {
            const overlay = document.getElementById('formOverlay');
            if (event.target == overlay) {
                closeOverlay();
            }
        }
    </script>
</body>

</html>
<?php /**PATH C:\Users\cuken\Downloads\Desktop\Dokumen\GitHub\tugas-PSAT\laravel\resources\views/pasien.blade.php ENDPATH**/ ?>