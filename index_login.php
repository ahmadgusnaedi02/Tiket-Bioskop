<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Bioskop</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        .logo {
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4 shadow p-3 mb-5 bg-white rounded bg-dark">
            <a href="" class="d-flex justify-content-center">
                <img src="assets/img/1.png" class="logo" alt="" srcset="">
            </a>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Masukkan username..">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Masukkan Password..">
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <p>Belum punya akun? <a href="index_register.php">Daftar</a></p>
                </div>
            </form>
        </div>
    </div>
    <?php if (isset($_GET['cek'])): ?>
        <div class="flash-data" data-flashdata="<?= $_GET['cek']; ?>"></div>
    <?php endif; ?>
    <?php if (isset($_GET['pesan'])): ?>
        <div class="flash-pesan" data-flashpesan="<?= $_GET['pesan']; ?>"></div>
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
                text: 'Username atau kata sandi salah!'
            });
        }
        const flashpesan = $('.flash-pesan').data('flashpesan')
        if (flashpesan) {
            Swal.fire({
                icon: 'success',
                title: 'success',
                text: 'Berhasil!'
            })
        }
    </script>
</body>

</html>