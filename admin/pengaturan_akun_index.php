<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4 class="text-center mb-4">Pengaturan Akun</h4>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Profil Pengguna
                </div>
                <?php
                include "../koneksi.php";
                $iduser = $_SESSION['id_user'];
                $user = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$iduser' ");
                while ($u = mysqli_fetch_array($user)) {
                    ?>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Nama:</strong>
                            <?= $u['namaLengkap']; ?>
                        </div>
                        <div class="mb-3">
                            <strong>Email:</strong>
                            <?= $u['email']; ?>
                        </div>
                        <div class="mb-3">
                            <strong>Username:</strong>
                            <?= $u['username']; ?>
                        </div>
                        <div class="mb-3">
                            <strong>Password:</strong>
                            <?= $u['password']; ?>
                        </div>
                        <div class="text-center">
                            <a href="pengaturan_akun_edit.php" class="btn btn-primary">Edit Profil</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>