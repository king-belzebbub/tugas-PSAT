<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Pasien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1>Daftar Pasien</h1>
    <table id="pasien-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        async function loadPasien() {
            try {
                const response = await fetch('http://localhost:8000/api/pasien');
                const data = await response.json();
                const tbody = document.querySelector('#pasien-table tbody');
                data.forEach(pasien => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
            <td>${pasien.id}</td>
            <td>${pasien.nama}</td>
            <td>${pasien.alamat}</td>
            <td>${pasien.jenis_kelamin}</td>
            <td>${pasien.tanggal_lahir}</td>
          `;
                    tbody.appendChild(row);
                });
            } catch (error) {
                console.error('Gagal memuat data pasien:', error);
            }
        }

        loadPasien();
    </script>
</body>

</html>