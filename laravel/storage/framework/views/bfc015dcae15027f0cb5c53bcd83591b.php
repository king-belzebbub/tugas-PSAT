<!DOCTYPE html>
<html>

<head>
    <title>Detail Tindakan</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/detail_tindakan.css')); ?>">
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="logo">
            <img src="<?php echo e(asset('image/kivotoshospital_ba-style@nulla.top.png')); ?>" style="width: 150px;" alt="Logo" />
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

    <h1>Daftar Detail Tindakan</h1>

    <div class="container">
        <div style="text-align: right; margin-bottom: 15px;">
            <button onclick="openOverlay()" class="tambah-btn">+ Tambah Detail</button>
        </div>

        <table class="detail-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kunjungan</th>
                    <th>Tindakan</th>
                    <th>Keterangan</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($detail->id); ?></td>
                        <td><?php echo e($detail->kunjungan->id); ?> - <?php echo e($detail->kunjungan->pasien->nama); ?></td>
                        <td><?php echo e($detail->tindakan->nama_tindakan); ?></td> <!-- Pastikan field ini benar -->
                        <td><?php echo e($detail->keterangan); ?></td>
                        <td>Rp <?php echo e(number_format($detail->subtotal, 2, ',', '.')); ?></td>
                        <td>
                            <button onclick='openOverlay(<?php echo json_encode($detail, 15, 512) ?>)' class="edit-btn">Edit</button>
                            <form action="<?php echo e(url('/detail-tindakan/' . $detail->id)); ?>" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?');" style="display:inline;">
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
    <div id="formOverlay" class="overlay" style="display: none;">
        <div class="overlay-content">
            <span class="close-btn" onclick="closeOverlay()">&times;</span>
            <h2 id="formTitle">Tambah Detail Tindakan</h2>
            <form id="detailForm" method="POST" action="/detail-tindakan">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="formMethod" name="_method" value="POST">
                <input type="hidden" id="detailId" name="id">

                <div class="form-group">
                    <label for="kunjungan_id">Kunjungan</label>
                    <select name="kunjungan_id" id="kunjungan_id" required>
                        <?php $__currentLoopData = $kunjungans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kunjungan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($kunjungan->id); ?>"><?php echo e($kunjungan->id); ?> - <?php echo e($kunjungan->pasien->nama); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tindakan_id">Tindakan</label>
                    <select name="tindakan_id" id="tindakan_id" required>
                        <?php $__currentLoopData = $tindakans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tindakan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tindakan->id); ?>"><?php echo e($tindakan->nama_tindakan); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="subtotal">Subtotal (Rp)</label>
                    <input type="number" id="subtotal" name="subtotal" step="1" min="0" required>
                </div>

                <button type="submit" class="submit-btn">Simpan</button>
            </form>
        </div>
    </div>

    <footer style="background-color: #0a324d; color: white; padding: 40px 0; margin-top: 100px;">
        <div style="text-align: center;">
            <p>© 2025 Kivotos Hospital, All rights reserved.</p>
            <p>📍 Jl. Sakit No.666, Indonesia | ☎ (021) 124-8876</p>
        </div>
    </footer>

    <script>
        function openOverlay(detail = null) {
            const overlay = document.getElementById('formOverlay');
            const form = document.getElementById('detailForm');
            const formTitle = document.getElementById('formTitle');

            if (detail) {
                formTitle.textContent = 'Edit Detail Tindakan';
                document.getElementById('formMethod').value = 'PUT';
                document.getElementById('detailId').value = detail.id;
                form.action = `/detail-tindakan/${detail.id}`;
                document.getElementById('kunjungan_id').value = detail.kunjungan_id;
                document.getElementById('tindakan_id').value = detail.tindakan_id;
                document.getElementById('keterangan').value = detail.keterangan;
                document.getElementById('subtotal').value = detail.subtotal;
            } else {
                formTitle.textContent = 'Tambah Detail Tindakan';
                document.getElementById('formMethod').value = 'POST';
                form.action = '/detail-tindakan';
                form.reset();
                document.getElementById('detailId').value = '';
            }

            overlay.style.display = 'flex';
        }

        function closeOverlay() {
            const overlay = document.getElementById('formOverlay');
            const form = document.getElementById('detailForm');
            form.reset();
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('detailId').value = '';
            overlay.style.display = 'none';
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
<?php /**PATH C:\Users\cuken\Downloads\Desktop\Dokumen\GitHub\tugas-PSAT\laravel\resources\views/detail_tindakan.blade.php ENDPATH**/ ?>