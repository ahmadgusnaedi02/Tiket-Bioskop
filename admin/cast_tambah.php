<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4>Tambah Cast & Crew Film</h4>
    <?php
    include "../koneksi.php";
    $cast = "SELECT * From film";
    $query = mysqli_query($koneksi, $cast);
    ?>
    <form action="cast_insert.php" method="POST" enctype="multipart/form-data" class="row g-3 mt-4">
        <div class="col-md-6">
            <label for="namaAktor" class="form-label">Nama Aktor</label>
            <input type="text" class="form-control" name="namaAktor" id="namaAktor">
        </div>
        <div class="col-md-6">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>
        <div class="col-md-12">
            <label for="judulFilm" class="form-label">Judul Film</label>
            <select class="form-select" id="judulFilm" name="id_film" required>
                <option value="" selected disabled>Pilih Film</option>
                <?php while ($c = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $c['id_film']; ?>">
                        <?= $c['judulFilm']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Tambah Cast</button>
        </div>
    </form>
</div>

<?php include "footer.php"; ?>