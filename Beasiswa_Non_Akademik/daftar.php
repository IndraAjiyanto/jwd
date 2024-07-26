<?php
// Menghubungkan file koneksi.php untuk koneksi ke database
include '../koneksi.php';

// Mengambil ID dari URL query string
$id = $_GET['id'];

// Query untuk mengambil data mahasiswa berdasarkan ID
$query = "SELECT * FROM data WHERE id = $id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pendaftaran Beasiswa</title>
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
        <a href="mendaftar.php" class="col border border-5 btn btn-primary">
            <div>Daftar</div>
        </a>
        <a href="hasil.php" class="col border border-5 btn">
            <div>Hasil</div>
        </a>
    </div>
</nav>

<!-- Formulir Pendaftaran -->
<div class="container">
    <h2 class="text-center">DAFTAR</h2>
    <form class="border border-1 p-2" action="daftar-aksi.php" method="post" enctype="multipart/form-data">
        <!-- Input hidden untuk ID -->
        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $row['id'] ?>">

        <!-- Input Nama -->
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['nama'] ?>">
        </div>

        <!-- Input Email dengan validasi JavaScript -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" onchange="ValidationEmail()">
        </div>

        <!-- Input No HP dengan validasi JavaScript -->
        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="number" class="form-control" name="no_hp" id="no_hp" onchange="ValidationNoHp()">
        </div>

        <!-- Dropdown Semester -->
        <div class="mb-3">
            <label class="form-label">Semester saat ini</label>
            <select class="form-select" name="semester" id="semester">
                <option selected>Pilih Semester</option>
                <?php for ($i = 1; $i <= 8; $i++) { ?>
                    <option value="<?php echo $i ?>" <?php echo ($row['semester'] == $i) ? 'selected' : ''; ?>><?php echo $i ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- Input IPK yang hanya dapat dibaca -->
        <div class="mb-3">
            <label class="form-label">IPK</label>
            <input type="number" class="bg-secondary form-control" name="ipk" id="ipk" value="<?php echo $row['ipk'] ?>" readonly>
        </div>

        <!-- Tampilkan opsi Beasiswa dan upload berkas jika IPK memenuhi syarat -->
        <?php if ($row['ipk'] >= 3) { ?>
            <div class="mb-3">
                <label class="form-label">Beasiswa</label>
                <select class="form-select" name="beasiswa" id="beasiswa">
                    <option selected>Pilih Beasiswa</option>
                    <option value="olahraga">Olahraga</option>
                    <option value="seni">Seni Karya</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Berkas</label>
                <input type="file" class="form-control" name="berkas" id="berkas">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <?php } else { ?>
            <p>Maaf, Anda belum memenuhi IPK</p>
        <?php } ?>

        <!-- Tombol Cancel -->
        <a href="mendaftar.php" class="btn btn-danger" name="kembali">Cancel</a>
    </form>
</div>

<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Script Validasi JavaScript -->
<script>
    // Fungsi untuk memvalidasi email
    function ValidationEmail() {
        var email = document.getElementById('email').value;
        if (!email.includes('@')) {
            alert("Anda belum benar memasukkan email");
            document.getElementById('email').value = '';
        }
    }

    // Fungsi untuk memvalidasi nomor HP
    function ValidationNoHp() {
        var no_hp = document.getElementById('no_hp').value;
        if (no_hp.length < 11 || no_hp.length > 13) {
            alert("Masukkan No HP yang benar");
            document.getElementById('no_hp').value = '';
        }
    }
</script>

</body>
</html>
