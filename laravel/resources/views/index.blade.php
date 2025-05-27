
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rumah Sakit - Halaman Utama</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container nav-container">
            <a href="#" class="logo"><img src="/img/logo rs.jpg" width="60" height="60" /> <span>RS LIveal</span></a>
            <nav>
                <ul>
                    <li><a href="{{ asset('pasien.blade.php') }}">pasien</a></li>
                    <li><a href="/dokter.html">dokter</a></li>
                    <li><a href="/tindakan.html">tindakan</a></li>
                    <li><a href="/kunjungan.html">kunjungan</a></li>
                    <li><a href="/detail kunjungan.html">detail kunjungan</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Pelayanan Kesehatan Terbaik untuk Keluarga Anda</h1>
            <p>Bersama kami, kesehatan Anda prioritas utama</p>
            <a href="#" class="btn-primary">Reservasi Sekarang</a>
            <a href="#" class="btn-outline">Lihat Jadwal Dokter</a>
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

    <!-- Profil Dokter -->
    <section class="doctors">
        <h2>Profil Dokter</h2>
        <div class="doctors-grid">
            <div class="doctor-card">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Budi" class="doctor-photo" />
                <div class="doctor-name">Dr. Budi Santoso</div>
                <div class="doctor-specialty">Dokter Umum</div>
                <button class="btn-small">Lihat Detail</button>
            </div>
            <div class="doctor-card">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Dr. Sari" class="doctor-photo" />
                <div class="doctor-name">Dr. Sari Dewi</div>
                <div class="doctor-specialty">Spesialis Anak</div>
                <button class="btn-small">Lihat Detail</button>
            </div>
            <div class="doctor-card">
                <img src="https://randomuser.me/api/portraits/men/54.jpg" alt="Dr. Agus" class="doctor-photo" />
                <div class="doctor-name">Dr. Agus Santika</div>
                <div class="doctor-specialty">Spesialis Bedah</div>
                <button class="btn-small">Lihat Detail</button>
            </div>
            <div class="doctor-card">
                <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Dr. Lina" class="doctor-photo" />
                <div class="doctor-name">Dr. Lina Wijaya</div>
                <div class="doctor-specialty">Spesialis Mata</div>
                <button class="btn-small">Lihat Detail</button>
            </div>
        </div>
    </section>

    <!-- Jadwal & Reservasi -->
    <section class="schedule">
        <h2>Jadwal & Reservasi Online</h2>
        <form class="schedule-form" action="#" method="get">
            <select name="poli" required>
                <option value="" disabled selected>Pilih Poli</option>
                <option value="umum">Poli Umum</option>
                <option value="anak">Poli Anak</option>
                <option value="bedah">Poli Bedah</option>
                <option value="mata">Poli Mata</option>
            </select>
            <input type="date" name="tanggal" required />
            <button type="submit" class="schedule-btn">Cek Jadwal</button>
        </form>
    </section>

    <!-- Testimoni & Sertifikasi -->
    <section class="testimonials">
        <h2>Testimoni Pasien & Sertifikasi</h2>
        <blockquote class="testimonial-text">"Pelayanan sangat memuaskan dan dokter sangat ramah."</blockquote>
        <div class="testimonial-author">- Ani Wijaya</div>

        <div class="certifications">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/ISO_9001_Logo.svg/120px-ISO_9001_Logo.svg.png"
                alt="ISO 9001" />
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/17/Joint_Commission_International_Logo.svg/120px-Joint_Commission_International_Logo.svg.png"
                alt="Joint Commission International" />
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="contact-info">
            <span>📞 (021) 123-4567</span>
            <span>✉ info@rssehat.com</span>
            <span>📍 Jl. Sehat No.123, Jakarta</span>
        </div>
        <div class="social-icons">
            <a href="#" aria-label="Instagram">📸</a>
            <a href="#" aria-label="Facebook">📘</a>
            <a href="#" aria-label="Twitter">🐦</a>
        </div>
        <small>© 2025 RS Sehat Sentosa. All rights reserved.</small>
    </footer>
</body>

</html>
