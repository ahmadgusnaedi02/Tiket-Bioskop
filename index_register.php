<?php
$provinsi = [
    'Aceh',
    'Sumatera Utara',
    'Sumatera Barat',
    'Riau',
    'Jambi',
    'Sumatera Selatan',
    'Bengkulu',
    'Lampung',
    'Kepulauan Bangka Belitung',
    'Kepulauan Riau',
    'DKI Jakarta',
    'Jawa Barat',
    'Jawa Tengah',
    'DI Yogyakarta',
    'Jawa Timur',
    'Banten',
    'Bali',
    'Nusa Tenggara Barat',
    'Nusa Tenggara Timur',
    'Kalimantan Barat',
    'Kalimantan Tengah',
    'Kalimantan Selatan',
    'Kalimantan Timur',
    'Kalimantan Utara',
    'Sulawesi Utara',
    'Sulawesi Tengah',
    'Sulawesi Selatan',
    'Sulawesi Tenggara',
    'Gorontalo',
    'Sulawesi Barat',
    'Maluku',
    'Maluku Utara',
    'Papua Barat',
    'Papua'
];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        .logo {
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="container mt-5 ">


        <div class="container-fluid d-flex justify-content-center align-items-center">
            <div class="col-md-8 shadow p-3 mb-5 bg-white rounded bg-dark">
                <h4>Form registrasi</h4>
                <form action="register.php" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama..">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Masukkan Email..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="provinsi" class="form-label">Provinsi</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-globe"></i></span>
                                <select name="provinsi" id="provinsi" class="form-control">
                                    <?php foreach ($provinsi as $namaProvinsi): ?>
                                        <option value="<?php echo $namaProvinsi; ?>">
                                            <?php echo $namaProvinsi; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kota" class="form-label">Kota</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                <input type="text" name="kota" id="kota" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                            <select name="jk" id="gender" class="form-control">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-people"></i></span>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Masukkan Password..">
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                        <a href="index_login.php">Sudah punya akun?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($_GET['cek'])): ?>
        <div class="flash-data" data-flashdata="<?= $_GET['cek']; ?>"></div>
    <?php endif; ?>
    <!-- Ensure the correct order of script tags -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script>
        const flashdata = $('.flash-data').data('flashdata');
        if (flashdata === 'gagal') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Terjadi kesalahan!'
            });
        }
    </script>
</body>

</html>