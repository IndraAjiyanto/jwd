<?php
// Menghubungkan ke database MySQL
$connection = mysqli_connect("localhost", "root", "", "beasiswa");

// Memeriksa apakah koneksi berhasil
if (mysqli_connect_error()) {
    // Menampilkan pesan kesalahan jika koneksi gagal
    echo "Koneksi gagal: " . mysqli_connect_error();
}
?>
