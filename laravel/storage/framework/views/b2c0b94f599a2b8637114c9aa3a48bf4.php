<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rumah Sakit - Halaman Utama</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container nav-container">
            <div class="logo-text-wrapper">
                <a href="#" class="logo">
                    <img src="<?php echo e(asset('image/kivotoshospital_ba-style@nulla.top.png')); ?>"
                        style="width: 120px; height: auto;" alt="Logo kivotos" />
                </a>
            </div>
            <nav>
                <ul class="rounded-menu">
                    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo e(url('/pasien')); ?>">Pasien</a></li>
                    <li><a href="<?php echo e(url('/dokter')); ?>">Dokter</a></li>
                    <li><a href="<?php echo e(url('/tindakan')); ?>">Tindakan</a></li>
                    <li><a href="<?php echo e(url('/kunjungan')); ?>">Kunjungan</a></li>
                    <li><a href="/detail-kunjungan.html">Detail Kunjungan</a></li>
                </ul>

                <div class="navbar-extra">
                    <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
                </div>
            </nav>
        </div>
        <div class="menu-overlay"></div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Pelayanan Kesehatan Terbaik untuk Keluarga Anda</h1>
            <p>Bersama kami, kesehatan Anda prioritas utama</p>
            <a href="<?php echo e(url('/dokter')); ?>" class="btn-outline">Lihat Jadwal Dokter</a>
        </div>
    </section>

    <!-- Layanan Unggulan -->
    <section class="services">
        <h2>Layanan Unggulan</h2>
        <div class="services-grid">
            <div class="service-item">
                <div class="service-icon">⏰</div>
                <div class="service-title">IGD 24 Jam</div>
            </div>
            <div class="service-item">
                <div class="service-icon">🏥</div>
                <div class="service-title">Rawat Inap</div>
            </div>
            <div class="service-item">
                <div class="service-icon">🧪</div>
                <div class="service-title">Laboratorium</div>
            </div>
            <div class="service-item">
                <div class="service-icon">🦷</div>
                <div class="service-title">Klinik Gigi</div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="contact-info">
            <span>📞 (021) 124-8876</span>
            <span>✉ info@kivotos.com</span>
            <span>📍 Jl. Sakit No.666, Indonesia</span>
        </div>
        <small>© 2025 kivotos hospital, All rights reserved.</small>
    </footer>

    <script>
        // Inisialisasi Feather Icons
        feather.replace();

        // Hamburger Menu Functionality
        const hamburger = document.getElementById('hamburger-menu');
        const menuNav = document.querySelector('.rounded-menu');
        const overlay = document.querySelector('.menu-overlay');

        hamburger.addEventListener('click', function (e) {
            e.preventDefault();
            menuNav.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        overlay.addEventListener('click', function () {
            menuNav.classList.remove('active');
            overlay.classList.remove('active');
        });

        // Tutup menu saat mengklik link
        document.querySelectorAll('.rounded-menu a').forEach(link => {
            link.addEventListener('click', () => {
                menuNav.classList.remove('active');
                overlay.classList.remove('active');
            });
        });
    </script>
</body>

</html>
<?php /**PATH C:\Users\cuken\Downloads\Desktop\Dokumen\GitHub\tugas-PSAT\laravel\resources\views/index.blade.php ENDPATH**/ ?>