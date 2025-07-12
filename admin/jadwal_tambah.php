<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4>Tambah Jadwal Film</h4>
    <?php
    include "../koneksi.php";
    $film = "SELECT * FROM film";
    $query = mysqli_query($koneksi, $film);
    ?>
    <form action="jadwal_insert.php" method="POST" class="row g-3 mt-4">
        <div class="col-md-12">
            <label for="judulFilm" class="form-label">Judul Film</label>
            <select class="form-select" id="judul" name="id_film" required>
                <option value="" selected disabled>Pilih FIlm</option>
                <?php while ($f = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $f['id_film']; ?>">
                        <?= $f['judulFilm']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-12">
            <label for="jamTayang" class="form-label">Jam Tayang</label>
            <input type="datetime-local" class="form-control" name="jamTayang" id="jamTayang">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
        </div>
    </form>
</div>

<?php include "footer.php"; ?>