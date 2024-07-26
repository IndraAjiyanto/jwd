<?php
// Menghubungkan file koneksi.php untuk koneksi ke database
include '../koneksi.php';

// Mengambil data dari formulir pendaftaran
$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$semester = $_POST['semester'];
$ipk = $_POST['ipk'];
$beasiswa = $_POST['beasiswa'];
$verifikasi = 'true'; // Status verifikasi
$jenis_beasiswa = 'non_akademik'; // Jenis beasiswa yang dipilih

// Mengambil informasi berkas yang diupload
$nama_foto = $_FILES['berkas']['name']; // Nama file berkas yang diupload
$explode_foto = explode('.', $nama_foto); // Memisahkan nama file dan ekstensi
$ekstensi_foto = $explode_foto[1]; // Mendapatkan ekstensi file
$tmp_foto = $_FILES['berkas']['tmp_name']; // Nama file sementara di server
$ekstensi = array('pdf', 'jpg', 'zip'); // Daftar ekstensi file yang diizinkan
$directory_foto = '../asset/'; // Direktori tujuan untuk menyimpan berkas

// Memeriksa apakah ekstensi file termasuk dalam daftar ekstensi yang diizinkan
if (in_array($ekstensi_foto, $ekstensi)) {
    // Memindahkan file yang diupload dari lokasi sementara ke direktori tujuan
    move_uploaded_file($tmp_foto, $directory_foto . $nama_foto);
}

// Query SQL untuk memperbarui data mahasiswa di database
$update = "UPDATE data SET 
    nama='$nama', 
    email='$email', 
    no_hp='$no_hp', 
    semester='$semester', 
    ipk='$ipk', 
    beasiswa='$beasiswa', 
    berkas='$nama_foto', 
    verifikasi='$verifikasi', 
    jenis_beasiswa='$jenis_beasiswa' 
WHERE id='$id'";

// Menjalankan query update
mysqli_query($connection, $update);

// Mengarahkan pengguna kembali ke halaman hasil setelah update
header("Location: hasil.php");
exit(); // Pastikan tidak ada kode lain yang dijalankan setelah header
?>
