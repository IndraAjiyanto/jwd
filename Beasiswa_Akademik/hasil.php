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

    <!-- Area konten utama -->
    <div class="container mt-2">
        <h2 class="p-2">Data Mahasiswa Mengikuti Beasiswa Akademik</h2>
        <!-- Tabel untuk menampilkan data mahasiswa -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Semester</th>
                    <th scope="col">IPK</th>
                    <th scope="col">Beasiswa</th>
                    <th scope="col">Berkas</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inisialisasi nomor urut baris
                $no = 1;
                
                // Query untuk mengambil data mahasiswa dengan IPK >= 2.8
                $query = "SELECT * FROM data WHERE ipk >= 2.8";
                $result = mysqli_query($connection, $query);
                
                // Iterasi melalui setiap baris hasil query
                foreach ($result as $row) {
                    // Menampilkan baris jika 'verifikasi' == 'true' dan 'jenis_beasiswa' == 'akademik'
                    if ($row['verifikasi'] == 'true' && $row['jenis_beasiswa'] == 'akademik') {
                ?>
                    <tr>
                        <th scope="row"><?php echo $no++ ?></th>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['no_hp'] ?></td>
                        <td><?php echo $row['semester'] ?></td>
                        <td><?php echo $row['ipk'] ?></td>
                        <td><?php echo $row['beasiswa'] ?></td>
                        <td>
                            <!-- Menampilkan gambar berkas -->
                            <img src="../asset/<?php echo $row['berkas'] ?>" width="50px" height="50px" alt="Berkas">
                        </td>
                        <td>
                            <!-- Status verifikasi -->
                            <p>terverifikasi</p>
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
