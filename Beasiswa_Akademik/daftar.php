<?php
// Menghubungkan file koneksi.php untuk koneksi ke database
include '../koneksi.php';

// Mengambil nilai 'id' dari URL query parameter
$id = $_GET['id'];

// Query untuk mengambil data berdasarkan ID yang diberikan
$query = "SELECT * FROM data WHERE id = $id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Beasiswa</title>
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
            <a href="mendaftar.php" class="col border border-5 btn btn-primary">
                <div>Daftar</div>
            </a>
            <a href="hasil.php" class="col border border-5 btn">
                <div>Hasil</div>
            </a>
        </div>
    </nav>

    <!-- Formulir pendaftaran -->
    <div class="container">
        <h2 class="text-center">DAFTAR</h2>
        <form class="border border-1 p-2" action="daftar-aksi.php" method="post" enctype="multipart/form-data">
            <!-- Input hidden untuk ID mahasiswa -->
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $row['id'] ?>">

            <!-- Input untuk nama mahasiswa -->
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['nama'] ?>">
            </div>

            <!-- Input untuk email mahasiswa dengan validasi -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" onchange="ValidationEmail()">
            </div>

            <!-- Input untuk nomor HP mahasiswa dengan validasi -->
            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="number" class="form-control" name="no_hp" id="no_hp" onchange="ValidationNoHp()">
            </div>

            <!-- Input untuk memilih semester -->
            <div class="mb-3">
                <label class="form-label">Semester saat ini</label>
                <select class="form-select" name="semester" id="semester">
                    <option selected>Pilih Semester</option>
                    <option value="1" <?php echo ($row['semester'] == '1') ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo ($row['semester'] == '2') ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo ($row['semester'] == '3') ? 'selected' : ''; ?>>3</option>
                    <option value="4" <?php echo ($row['semester'] == '4') ? 'selected' : ''; ?>>4</option>
                    <option value="5" <?php echo ($row['semester'] == '5') ? 'selected' : ''; ?>>5</option>
                    <option value="6" <?php echo ($row['semester'] == '6') ? 'selected' : ''; ?>>6</option>
                    <option value="7" <?php echo ($row['semester'] == '7') ? 'selected' : ''; ?>>7</option>
                    <option value="8" <?php echo ($row['semester'] == '8') ? 'selected' : ''; ?>>8</option>
                </select>
            </div>

            <!-- Input untuk IPK mahasiswa, hanya dapat dibaca -->
            <div class="mb-3">
                <label class="form-label">IPK</label>
                <input type="number" class="bg-secondary form-control" name="ipk" id="ipk" value="<?php echo $row['ipk'] ?>" readonly>
            </div>

            <?php
            // Menampilkan opsi beasiswa dan upload berkas jika IPK >= 3
            if ($row['ipk'] >= 3) {
            ?>
                <!-- Input untuk memilih jenis beasiswa -->
                <div class="mb-3">
                    <label class="form-label">Beasiswa</label>
                    <select class="form-select" name="beasiswa" id="beasiswa">
                        <option selected>Pilih Beasiswa</option>
                        <option value="kip">KIP</option>
                        <option value="pertamina">PERTAMINA</option>
                    </select>
                </div>

                <!-- Input untuk upload berkas -->
                <div class="mb-3">
                    <label class="form-label">Upload Berkas</label>
                    <input type="file" class="form-control" name="berkas" id="berkas">
                </div>

                <!-- Tombol untuk submit formulir -->
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <?php
            } else {
                // Pesan jika IPK kurang dari 3
                echo "<p>Maaf, Anda belum memenuhi IPK</p>";
            }
            ?>

            <!-- Tombol untuk membatalkan dan kembali ke halaman pendaftaran -->
            <a href="mendaftar.php" class="btn btn-danger">Cancel</a>
        </form>
    </div>

    <!-- Link ke file JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Script untuk validasi input email -->
    <script>
        function ValidationEmail() {
            var email = document.getElementById('email').value;
            // Validasi format email
            if (!email.includes('@')) {
                alert("Anda belum benar memasukkan email");
                document.getElementById('email').value = '';
            }
        }

        // Script untuk validasi nomor HP
        function ValidationNoHp() {
            var no_hp = document.getElementById('no_hp').value;
            // Validasi panjang nomor HP
            if (no_hp.length < 11 || no_hp.length > 13) {
                alert("Masukkan nomor HP yang benar");
                document.getElementById('no_hp').value = '';
            }
        }
    </script>
</body>
</html>
