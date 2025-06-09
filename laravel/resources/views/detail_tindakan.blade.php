<!DOCTYPE html>
<html>

<head>
    <title>Detail Tindakan</title>
    <link rel="stylesheet" href="{{ asset('css/detail_tindakan.css') }}">
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="logo">
            <img src="{{ asset('image/kivotoshospital_ba-style@nulla.top.png') }}" style="width: 150px;" alt="Logo" />
        </div>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/pasien') }}">Pasien</a></li>
                <li><a href="{{ url('/dokter') }}">Dokter</a></li>
                <li><a href="{{ url('/tindakan') }}">Tindakan</a></li>
                <li><a href="{{ url('/kunjungan') }}">Kunjungan</a></li>
                <li><a href="{{ url('/detail-tindakan') }}">Detail Tindakan</a></li>
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
                @foreach ($details as $detail)
                    <tr>
                        <td>{{ $detail->id }}</td>
                        <td>{{ $detail->kunjungan->id }} - {{ $detail->kunjungan->pasien->nama }}</td>
                        <td>{{ $detail->tindakan->nama_tindakan }}</td> <!-- Pastikan field ini benar -->
                        <td>{{ $detail->keterangan }}</td>
                        <td>Rp {{ number_format($detail->subtotal, 2, ',', '.') }}</td>
                        <td>
                            <button onclick='openOverlay(@json($detail))' class="edit-btn">Edit</button>
                            <form action="{{ url('/detail-tindakan/' . $detail->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- OVERLAY FORM -->
    <div id="formOverlay" class="overlay" style="display: none;">
        <div class="overlay-content">
            <span class="close-btn" onclick="closeOverlay()">&times;</span>
            <h2 id="formTitle">Tambah Detail Tindakan</h2>
            <form id="detailForm" method="POST" action="/detail-tindakan">
                @csrf
                <input type="hidden" id="formMethod" name="_method" value="POST">
                <input type="hidden" id="detailId" name="id">

                <div class="form-group">
                    <label for="kunjungan_id">Kunjungan</label>
                    <select name="kunjungan_id" id="kunjungan_id" required>
                        @foreach ($kunjungans as $kunjungan)
                            <option value="{{ $kunjungan->id }}">{{ $kunjungan->id }} - {{ $kunjungan->pasien->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tindakan_id">Tindakan</label>
                    <select name="tindakan_id" id="tindakan_id" required>
                        @foreach ($tindakans as $tindakan)
                            <option value="{{ $tindakan->id }}">{{ $tindakan->nama_tindakan }}</option>
                        @endforeach
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

            function openOverlay(detail = null) {
                const overlay = document.getElementById('formOverlay');
                const form = document.getElementById('detailForm');
                const formTitle = document.getElementById('formTitle');

                // Reset field secara manual, bukan form.reset()
                document.getElementById('kunjungan_id').value = '';
                document.getElementById('tindakan_id').value = '';
                document.getElementById('keterangan').value = '';
                document.getElementById('subtotal').value = '';
                document.getElementById('detailId').value = '';
                document.getElementById('formMethod').value = 'POST';

                if (detail) {
                    formTitle.textContent = 'Edit Detail Tindakan';
                    form.action = `/detail-tindakan/${detail.id}`;
                    document.getElementById('formMethod').value = 'PUT';
                    document.getElementById('detailId').value = detail.id;
                    document.getElementById('kunjungan_id').value = detail.kunjungan_id;
                    document.getElementById('tindakan_id').value = detail.tindakan_id;
                    document.getElementById('keterangan').value = detail.keterangan;
                    document.getElementById('subtotal').value = detail.subtotal;
                } else {
                    formTitle.textContent = 'Tambah Detail Tindakan';
                    form.action = '/detail-tindakan';
                    document.getElementById('formMethod').value = 'POST';
                }

                overlay.style.display = 'flex';
            }

    </script>
</body>

</html>
