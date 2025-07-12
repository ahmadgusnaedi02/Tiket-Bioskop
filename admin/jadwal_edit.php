<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4>Tambah Jadwal Film</h4>
    <?php
    include "../koneksi.php";

    // Query untuk mengambil data film
    $filmQuery = "SELECT * FROM film";
    $filmResult = mysqli_query($koneksi, $filmQuery);

    $idjadwal = $_GET['id_jadwal'];
    $data = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id_jadwal='$idjadwal' ");
    $j = mysqli_fetch_array($data);

    // Mendapatkan id_film yang telah dipilih sebelumnya
    $idFilmTerpilih = $j['id_film'];

    ?>
    <form action="jadwal_update.php" method="POST" class="row g-3 mt-4">
        <div class="col-md-12">
            <input type="hidden" name="id_jadwal" value="<?= $idjadwal; ?>">
            <label for="judulFilm" class="form-label">Judul Film</label>
            <select class="form-select" id="judul" name="id_film" required>
                <option value="" disabled>Pilih Film</option>
                <?php
                while ($film = mysqli_fetch_array($filmResult)) {
                    $selected = ($film['id_film'] == $idFilmTerpilih) ? "selected" : "";
                    ?>
                    <option value="<?= $film['id_film']; ?>" <?= $selected ?>>
                        <?= $film['judulFilm']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-12">
            <label for="jamTayang" class="form-label">Jam Tayang</label>
            <input type="datetime-local" class="form-control" name="jamTayang" id="jamTayang"
                value="<?= $j['jamTayang']; ?>">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update Jadwal</button>
        </div>
    </form>

</div>

<?php include "footer.php"; ?>