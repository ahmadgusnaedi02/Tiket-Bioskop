<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4>Index Data Film</h4>
    <div class="table-responsive mt-4">
        <a href="film_tambah.php" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Data Film</a>
        <table class="table table-stripped table-hover mt-2">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Film</th>
                    <th scope="col">Producer</th>
                    <th scope="col">Genre</th>
                    <th scope="col">batas Umur</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Status Film</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <?php
            include "../koneksi.php";
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM film");
            while ($f = mysqli_fetch_array($query)) {
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $no++; ?>
                        </td>
                        <td>
                            <?= $f['judulFilm']; ?>
                        </td>
                        <td>
                            <?= $f['producer']; ?>
                        </td>
                        <td>
                            <?= $f['genre']; ?>
                        </td>
                        <td>
                            <?= $f['batasUmur']; ?>
                        </td>
                        <td>
                            <img src="../assets/img/<?= $f['poster']; ?>" alt="<?= $f['judulFilm']; ?>" width="100"
                                height="150">
                        </td>
                        <td>
                            <?= $f['statusFilm']; ?>
                        </td>
                        <td colspan="2">
                            <a href="film_edit.php?id=<?= $f['id_film']; ?>" class="btn btn-primary btn-sm"><i
                                    class="bi bi-pencil"></i> </a>
                            <a href="film_delete.php?id=<?= $f['id_film']; ?>" class="btn btn-danger btn-sm hapus"><i
                                    class="bi bi-trash"></i></a>
                        </td>

                    </tr>

                </tbody>
            <?php } ?>
        </table>
    </div>
</div>
<?php include "footer.php"; ?>