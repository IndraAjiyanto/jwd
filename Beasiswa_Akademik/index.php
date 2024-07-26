<?php
// Menghubungkan file koneksi database
include '../koneksi.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <!-- Link ke file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navigasi halaman -->
    <nav class="container text-center p-2">
        <div class="row">
            <a href="index.php" class="col border border-5 btn btn-primary">
                <div>Pilih Beasiswa</div>
            </a>
            <a href="mendaftar.php" class="col border border-5 btn">
                <div>Daftar</div>
            </a>
            <a href="hasil.php" class="col border border-5 btn">
                <div>Hasil</div>
            </a>
        </div>
    </nav>

    <!-- Informasi tambahan untuk pendaftar -->
    <div class="container">
        <h4>Untuk mendaftar, minimal IPK adalah 3</h4>
        <div class="row p-5">
            <!-- Tombol untuk memilih jenis beasiswa -->
            <a href="" class="col">
                <button type="button" class="btn btn-success p-5 m-1" name="kembali">Beasiswa Akademik</button>
            </a>
            <a href="../Beasiswa_Non_Akademik/index.php" class="col">
                <button type="button" class="btn border border-4 p-5 m-1" name="kembali">Beasiswa Non Akademik</button>
            </a>
        </div>
    </div>

    <!-- Tabel untuk menampilkan data mahasiswa -->
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
                // Inisialisasi nomor urut baris
                $no = 1;

                // Query untuk mengambil data dari database
                $query = "SELECT * FROM data";
                $result = mysqli_query($connection, $query);

                // Iterasi melalui setiap baris hasil query
                foreach ($result as $row) {
                    // Menampilkan baris jika jenis beasiswa bukan 'akademik'
                    if ($row['jenis_beasiswa'] != 'akademik') {
                ?>
                    <tr>
                        <th scope="row"><?php echo $no++ ?></th>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['semester'] ?></td>
                        <td>
                            <!-- Link untuk mendaftar beasiswa -->
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

    <!-- Link ke file JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
