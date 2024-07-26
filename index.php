<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Beasiswa</title>
    <!-- Link ke file CSS Bootstrap untuk styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navigasi Halaman -->
    <nav class="container text-center p-2">
        <div class="row">
            <!-- Tombol untuk memilih beasiswa -->
            <a href="index.php" class="col border border-5 btn btn-primary">
                <div>Pilih Beasiswa</div>
            </a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container">
        <div class="row p-5">
            <!-- Tombol untuk Beasiswa KIP -->
            <a href="Beasiswa_Akademik/index.php" class="col">
                <button type="button" class="btn border border-4 p-5 m-1">Beasiswa AKADEMIK</button>
            </a>
            <!-- Tombol untuk Beasiswa PERTAMINA -->
            <a href="Beasiswa_Non_Akademik/index.php" class="col">
                <button type="button" class="btn border border-4 p-5 m-1">Beasiswa NON AKADEMIK</button>
            </a>
        </div>
    </div>

    <!-- Script JavaScript Bootstrap untuk menambahkan fungsionalitas ke komponen -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
