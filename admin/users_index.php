<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4>Index Data Users</h4>
    <div class="table-responsive mt-4">
        <a href="users_tambah.php" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah data </a>
        <table class="table table-stripped table-hover mt-2">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Username</th>
                    <th scope="col">Hak Akses</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <?php
            include "../koneksi.php";
            $no = 1;
            $users = "SELECT * FROM users";
            $query = mysqli_query($koneksi, $users);
            while ($u = mysqli_fetch_array($query)) {
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $no++; ?>
                        </td>
                        <td>
                            <?= $u['namaLengkap']; ?>
                        </td>
                        <td>
                            <?= $u['email']; ?>
                        </td>
                        <td>
                            <?= $u['tLahir']; ?>
                        </td>
                        <td>
                            <?= $u['username']; ?>
                        </td>
                        <td>
                            <?= $u['hakAkses']; ?>
                        </td>
                        <td colspan="2">
                            <a href="users_edit.php?id_user=<?= $u['id_user']; ?>" class="btn btn-primary btn-sm"><i
                                    class="bi bi-pencil"></i> </a>
                            <a href="users_delete.php?id_user=<?= $u['id_user']; ?>" class="btn btn-danger btn-sm hapus"><i
                                    class="bi bi-trash"></i></a>
                        </td>

                    </tr>

                </tbody>
            <?php } ?>
        </table>
    </div>
</div>
<?php include "footer.php"; ?>