<?php
// Menghubungkan file koneksi.php untuk melakukan koneksi ke database
include '../koneksi.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa - Beasiswa Non Akademik</title>
    <!-- Link ke file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<!-- Navigasi -->
<nav class="container text-center p-2">
    <div class="row">
        <a href="index.php" class="col border border-5 btn">
            <div>Pilih Beasiswa</div>
        </a>
        <a href="mendaftar.php" class="col border border-5 btn">
            <div>Daftar</div>
        </a>
        <a href="hasil.php" class="col border border-5 btn btn-primary">
            <div>Hasil</div>
        </a>
    </div>
</nav>

<!-- Tabel Data Mahasiswa -->
<div class="container mt-2">
    <h2 class="p-2">Data Mahasiswa Mengikuti Beasiswa Non Akademik</h2>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">No HP</th>
                <th scope="col">Semester</th>
                <th scope="col">IPK</th>
                <th scope="col">Beasiswa</th>
                <th scope="col">Berkas</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Menampilkan data mahasiswa yang memenuhi kriteria IPK
        $no = 1;
        // Query untuk mengambil data mahasiswa dengan IPK >= 3
        $query = "SELECT * FROM data WHERE ipk >= 3";
        $result = mysqli_query($connection, $query);
        
        // Iterasi untuk setiap baris hasil query
        while ($row = mysqli_fetch_assoc($result)) {
            // Menampilkan hanya data yang sudah terverifikasi dan jenis beasiswanya non akademik
            if ($row['verifikasi'] == 'true' && $row['jenis_beasiswa'] == 'non_akademik') {
        ?>
            <tr>
                <!-- Nomor urut -->
                <th scope="row"><?php echo $no++ ?></th>
                <!-- Menampilkan data mahasiswa -->
                <td><?php echo htmlspecialchars($row['nama']) ?></td>
                <td><?php echo htmlspecialchars($row['email']) ?></td>
                <td><?php echo htmlspecialchars($row['no_hp']) ?></td>
                <td><?php echo htmlspecialchars($row['semester']) ?></td>
                <td><?php echo htmlspecialchars($row['ipk']) ?></td>
                <td><?php echo htmlspecialchars($row['beasiswa']) ?></td>
                <!-- Menampilkan gambar berkas -->
                <td><img src="../asset/<?php echo htmlspecialchars($row['berkas']) ?>" width="50" height="50" alt="Berkas"></td>
                <!-- Aksi -->
                <td><p>terverifikasi</p></td>
            </tr>
        <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
