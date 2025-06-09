<!DOCTYPE html>
<html>

<head>
    <title>Daftar Kunjungan</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/kunjungan.css')); ?>">
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="logo">
            <img src="<?php echo e(asset('image/kivotoshospital_ba-style@nulla.top.png')); ?>" style="width: 150px;"
                alt="Logo Liveal" />
        </div>
        <nav>
            <ul>
                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li><a href="<?php echo e(url('/pasien')); ?>">Pasien</a></li>
                <li><a href="<?php echo e(url('/dokter')); ?>">Dokter</a></li>
                <li><a href="<?php echo e(url('/tindakan')); ?>">Tindakan</a></li>
                <li><a href="<?php echo e(url('/kunjungan')); ?>">Kunjungan</a></li>
                <li><a href="<?php echo e(url('/detail-tindakan')); ?>">Detail Tindakan</a></li>
            </ul>
        </nav>
    </header>

    <h1>Daftar Kunjungan</h1>

    <div class="container">
        <div style="text-align: right; margin-bottom: 15px;">
            <button onclick="openOverlay()" class="tambah-btn">+ Tambah Kunjungan</button>
        </div>

        <table class="kunjungan-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Tanggal</th>
                    <th>Keluhan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $kunjungans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kunjungan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($kunjungan->id); ?></td>
                        <td><?php echo e($kunjungan->pasien->nama); ?></td>
                        <td><?php echo e($kunjungan->dokter->nama); ?></td>
                        <td><?php echo e($kunjungan->tanggal); ?></td>
                        <td><?php echo e($kunjungan->keluhan); ?></td>
                        <td>
                            <button onclick='openOverlay(<?php echo json_encode($kunjungan, 15, 512) ?>)' class="edit-btn">Edit</button>
                            <form action="<?php echo e(url('/kunjungan/' . $kunjungan->id)); ?>" method="POST" style="display:inline;"
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

    <!-- FORM OVERLAY -->
    <div id="formOverlay" class="overlay" style="display: none;">
        <div class="overlay-content">
            <span class="close-btn" onclick="closeOverlay()">&times;</span>
            <h2 id="formTitle">Tambah Kunjungan</h2>
            <form id="kunjunganForm" method="POST" action="/kunjungan">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="formMethod" name="_method" value="POST">
                <input type="hidden" id="kunjunganId" name="id">

                <div class="form-group">
                    <label for="pasien_id">Pasien</label>
                    <select name="pasien_id" id="pasien_id" required>
                        <?php $__currentLoopData = $pasiens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pasien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($pasien->id); ?>"><?php echo e($pasien->nama); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dokter_id">Dokter</label>
                    <select name="dokter_id" id="dokter_id" required>
                        <?php $__currentLoopData = $dokters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($dokter->id); ?>"><?php echo e($dokter->nama); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </div>

                <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea id="keluhan" name="keluhan" rows="3" required></textarea>
                </div>

                <button type="submit" class="submit-btn">Simpan</button>
            </form>
        </div>
    </div>

    <!-- FOOTER -->
    <footer style="background-color: #0a324d; color: white; padding: 40px 0; margin-top: 200px;">
        <div style="text-align: center;">
            <p>© 2025 Kivotos Hospital, All rights reserved.</p>
            <p>📍 Jl. Sakit No.666, Indonesia | ☎ (021) 124-8876</p>
        </div>
    </footer>

    <!-- JAVASCRIPT -->
    <script>
        function openOverlay(kunjungan = null) {
            const overlay = document.getElementById('formOverlay');
            const form = document.getElementById('kunjunganForm');
            const formTitle = document.getElementById('formTitle');

            if (kunjungan) {
                formTitle.textContent = 'Edit Kunjungan';
                document.getElementById('formMethod').value = 'PUT';
                form.action = `/kunjungan/${kunjungan.id}`;
                document.getElementById('kunjunganId').value = kunjungan.id;
                document.getElementById('pasien_id').value = kunjungan.pasien_id;
                document.getElementById('dokter_id').value = kunjungan.dokter_id;
                document.getElementById('tanggal').value = kunjungan.tanggal;
                document.getElementById('keluhan').value = kunjungan.keluhan;
            } else {
                formTitle.textContent = 'Tambah Kunjungan';
                document.getElementById('formMethod').value = 'POST';
                form.action = '/kunjungan';
                form.reset();
            }

            overlay.style.display = 'flex';
        }

        function closeOverlay() {
            document.getElementById('formOverlay').style.display = 'none';
        }

        window.onclick = function (event) {
            const overlay = document.getElementById('formOverlay');
            if (event.target === overlay) {
                closeOverlay();
            }
        }
    </script>
</body>

</html>
<?php /**PATH C:\Users\cuken\Downloads\Desktop\Dokumen\GitHub\tugas-PSAT\laravel\resources\views/kunjungan.blade.php ENDPATH**/ ?>