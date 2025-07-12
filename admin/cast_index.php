<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4>Index Cast dan Crew Film</h4>
    <div class="table-responsive mt-4">
        <a href="cast_tambah.php" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Cast dan Crew Film</a>
        <table class="table table-stripped table-hover mt-2">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama Aktor</th>
                    <th scope="col">Judul Film</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <?php
            include "../koneksi.php";
            $no = 1;
            $cast = "SELECT id_cast, namaCast, foto, judulFilm FROM cast INNER JOIN film ON cast.id_film=film.id_film";
            $query = mysqli_query($koneksi, $cast);
            while ($c = mysqli_fetch_array($query)) {
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $no++; ?>
                        </td>
                        <td>
                            <img src="../assets/img/cast/<?= $c['foto']; ?>" alt="<?= $c['namaCast']; ?>" width="100"
                                height="150">
                        </td>
                        <td>
                            <?= $c['namaCast']; ?>
                        </td>
                        <td>
                            <?= $c['judulFilm']; ?>
                        </td>

                        <td colspan="2">
                            <a href="cast_edit.php?id_cast=<?= $c['id_cast']; ?>" class="btn btn-primary btn-sm"><i
                                    class="bi bi-pencil"></i> </a>
                            <a href="cast_delete.php?id_cast=<?= $c['id_cast']; ?>" class="btn btn-danger btn-sm hapus"><i
                                    class="bi bi-trash"></i></a>
                        </td>

                    </tr>

                </tbody>
            <?php } ?>
        </table>
    </div>
</div>


<?php include "footer.php"; ?>