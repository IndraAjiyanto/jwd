<?php
// Menghubungkan ke file koneksi.php untuk melakukan koneksi ke database
include '../koneksi.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa - Beasiswa</title>
    <!-- Link ke file CSS Bootstrap untuk styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navigasi Halaman -->
    <nav class="container text-center p-2">
        <div class="row">
            <!-- Tombol untuk memilih beasiswa -->
            <a href="index.php" class="col border border-5 btn">
                <div>Pilih Beasiswa</div>
            </a>
            <!-- Tombol untuk mendaftar -->
            <a href="mendaftar.php" class="col border border-5 btn btn-primary">
                <div>Daftar</div>
            </a>
            <!-- Tombol untuk melihat hasil -->
            <a href="hasil.php" class="col border border-5 btn">
                <div>Hasil</div>
            </a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <!-- Tabel Data Mahasiswa -->
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
                // Inisialisasi nomor urut
                $no = 1;
                // Query untuk mengambil semua data dari tabel 'data'
                $query = "SELECT * FROM data";
                $result = mysqli_query($connection, $query);

                // Iterasi setiap baris hasil query
                while ($row = mysqli_fetch_assoc($result)) {
                    // Menampilkan data hanya jika jenis beasiswa bukan 'non_akademik'
                    if ($row['jenis_beasiswa'] != 'non_akademik') {
                ?>
                <tr>
                    <!-- Menampilkan nomor urut -->
                    <th scope="row"><?php echo $no++ ?></th>
                    <!-- Menampilkan nama mahasiswa -->
                    <td><?php echo htmlspecialchars($row['nama']) ?></td>
                    <!-- Menampilkan semester mahasiswa -->
                    <td><?php echo htmlspecialchars($row['semester']) ?></td>
                    <!-- Menampilkan tombol untuk mendaftar -->
                    <td>
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

    <!-- Script JavaScript Bootstrap untuk menambahkan fungsionalitas ke komponen -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
