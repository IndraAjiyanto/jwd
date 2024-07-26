<?php
// Menghubungkan file koneksi.php untuk melakukan koneksi ke database
include '../koneksi.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa - Beasiswa</title>
    <!-- Link ke file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navigasi -->
    <nav class="container text-center p-2">
        <div class="row">
            <!-- Tombol untuk memilih beasiswa -->
            <a href="index.php" class="col border border-5 btn btn-primary">
                <div>Pilih Beasiswa</div>
            </a>
            <!-- Tombol untuk mendaftar -->
            <a href="mendaftar.php" class="col border border-5 btn">
                <div>Daftar</div>
            </a>
            <!-- Tombol untuk melihat hasil -->
            <a href="hasil.php" class="col border border-5 btn">
                <div>Hasil</div>
            </a>
        </div>
    </nav>

    <!-- Informasi mengenai syarat pendaftaran -->
    <div class="container">
        <h4>Untuk mendaftar, minimal IPK adalah 3</h4>
        <div class="row p-5">
            <!-- Tombol untuk Beasiswa Akademik -->
            <a href="../Beasiswa_Akademik/index.php" class="col">
                <button type="button" class="btn border border-4 p-5 m-1">Beasiswa Akademik</button>
            </a>
            <!-- Tombol untuk Beasiswa Non Akademik -->
            <a href="" class="col">
                <button type="button" class="btn btn-success p-5 m-1">Beasiswa Non Akademik</button>
            </a>
        </div>
    </div>

    <!-- Tabel Data Mahasiswa -->
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data mahasiswa dari database
                $no = 1;
                // Query untuk mengambil semua data mahasiswa
                $query = "SELECT * FROM data";
                $result = mysqli_query($connection, $query);

                // Iterasi untuk setiap baris data
                while ($row = mysqli_fetch_assoc($result)) {
                    // Menampilkan data mahasiswa yang jenis beasiswanya bukan 'non_akademik'
                    if ($row['jenis_beasiswa'] != 'non_akademik') {
                ?>
                <tr>
                    <!-- Nomor urut -->
                    <th scope="row"><?php echo $no++ ?></th>
                    <!-- Menampilkan data mahasiswa -->
                    <td><?php echo htmlspecialchars($row['nama']) ?></td>
                    <td><?php echo htmlspecialchars($row['semester']) ?></td>
                    <td>
                        <!-- Tombol untuk mendaftar -->
                        <a href="daftar.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">Daftarkan</a>
                    </td>
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
