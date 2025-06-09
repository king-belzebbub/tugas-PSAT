<html>

<head>
    <title>detail_tindakan</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/tindakan.css')); ?>">
</head>

<body>
    <header>
        <div class="container nav-container">
            <a href="#" class="logo"><img src="<?php echo e(asset('image/kivotoshospital_ba-style@nulla.top.png')); ?>" width="150"
                    height="150" /></a>
            <nav>
                <ul>
                    <li><a href="<?php echo e(url('/')); ?>">home</a></li>
                    <li><a href="<?php echo e(url('/pasien')); ?>">Pasien</a></li>
                    <li><a href="<?php echo e(url('/dokter')); ?>">Dokter</a></li>
                    <li><a href="<?php echo e(url('/tindakan')); ?>">tindakan</a></li>
                    <li><a href="<?php echo e(url('/kunjungan')); ?>">kunjungan</a></li>
                    <li><a href="<?php echo e(url('/detail_tindakan')); ?>">detail_tindakan</a></li>
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
                <?php $__currentLoopData = $detail_tindakans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail_tindakan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($detail_tindakan->id); ?></td>
                        <td><?php echo e($detail_tindakan->kunjungan_id); ?></td>
                        <td><?php echo e($detail_tindakan->tindakan_id); ?></td>
                        <td><?php echo e($detail_tindakan->keterangan); ?></td>
                        <td><?php echo e($detail_tindakan->subtotal); ?></td>
                        <td>

                            </form>
                            <form action="<?php echo e(url('/detail_tindakan/' . $detail_tindakan->id)); ?>" method="POST" style="display:inline;"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php /**PATH C:\Users\cuken\Downloads\Desktop\Dokumen\GitHub\tugas-PSAT\laravel\resources\views/detail_tindakan.blade.php ENDPATH**/ ?>