<!DOCTYPE html>
<html>

<head>
    <title>Daftar Tindakan</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/tindakan.css')); ?>">
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
    <h1>Daftar Tindakan</h1>

    <?php if(session('success')): ?>
        <div style="color: green; margin-bottom: 10px;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="container">
        <div style="text-align: right; margin-bottom: 15px;">
            <button onclick="openOverlay()" class="tambah-btn">+ Tambah Tindakan</button>
        </div>

        <table class="tindakan-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Tindakan</th>
                    <th>Kode ICD</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tindakans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tindakan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($tindakan->id); ?></td>
                        <td><?php echo e($tindakan->nama_tindakan); ?></td>
                        <td><?php echo e($tindakan->kode_icd ?? '-'); ?></td>
                        <td>Rp <?php echo e(number_format($tindakan->harga, 0, ',', '.')); ?></td>
                        <td>
                            <button onclick='openOverlay(<?php echo json_encode($tindakan, 15, 512) ?>)' class="edit-btn">Edit</button>
                            <form action="<?php echo e(route('tindakan.destroy', $tindakan->id)); ?>" method="POST"
                                style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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

    <div id="formOverlay" class="overlay" style="display: none;">
        <div class="overlay-content">
            <span class="close-btn" onclick="closeOverlay()">&times;</span>
            <h2 id="formTitle">Tambah Tindakan Baru</h2>
            <form id="tindakanForm" method="POST" action="<?php echo e(route('tindakan.store')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="formMethod" name="_method" value="POST">
                <input type="hidden" id="tindakanId" name="id" value="">

                <div class="form-group">
                    <label for="nama_tindakan">Nama Tindakan*</label>
                    <input type="text" id="nama_tindakan" name="nama_tindakan" required>
                </div>

                <div class="form-group">
                    <label for="kode_icd">Kode ICD</label>
                    <input type="text" id="kode_icd" name="kode_icd" placeholder="Kode diagnosa (opsional)">
                </div>

                <div class="form-group">
                    <label for="harga">Harga*</label>
                    <input type="number" id="harga" name="harga" min="0" required>
                </div>

                <button type="submit" class="submit-btn">Simpan</button>
            </form>
        </div>
    </div>

    <footer>
        <!-- footer seperti biasa -->
    </footer>

    <script>
        function openOverlay(tindakan = null) {
            const overlay = document.getElementById('formOverlay');
            const form = document.getElementById('tindakanForm');
            const formTitle = document.getElementById('formTitle');

            if (tindakan) {
                formTitle.textContent = 'Edit Data Tindakan';
                document.getElementById('formMethod').value = 'PUT';
                document.getElementById('tindakanId').value = tindakan.id;
                document.getElementById('nama_tindakan').value = tindakan.nama_tindakan;
                document.getElementById('kode_icd').value = tindakan.kode_icd || '';
                document.getElementById('harga').value = tindakan.harga;
                form.action = `/tindakan/${tindakan.id}`;
            } else {
                formTitle.textContent = 'Tambah Tindakan Baru';
                document.getElementById('formMethod').value = 'POST';
                document.getElementById('tindakanId').value = '';
                document.getElementById('nama_tindakan').value = '';
                document.getElementById('kode_icd').value = '';
                document.getElementById('harga').value = '';
                form.action = '<?php echo e(route('tindakan.store')); ?>';
            }

            overlay.style.display = 'flex';
        }

        function closeOverlay() {
            document.getElementById('formOverlay').style.display = 'none';
        }

        // tutup overlay jika klik di luar form
        window.onclick = function (event) {
            const overlay = document.getElementById('formOverlay');
            if (event.target === overlay) {
                closeOverlay();
            }
        }
    </script>
</body>

</html>
<?php /**PATH C:\Users\cuken\Downloads\Desktop\Dokumen\GitHub\tugas-PSAT\laravel\resources\views/tindakan.blade.php ENDPATH**/ ?>