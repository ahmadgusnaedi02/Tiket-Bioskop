<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4>Edit Cast & Crew Film</h4>
    <?php
    include "../koneksi.php";
    $idcast = $_GET['id_cast'];
    $filmQuery = "SELECT * FROM film";
    $filmResult = mysqli_query($koneksi, $filmQuery);
    $sql = "SELECT cast.id_cast, cast.namaCast, cast.foto, cast.id_film, film.judulFilm
                FROM cast INNER JOIN film ON cast.id_film=film.id_film WHERE cast.id_cast='$idcast' ";

    $result = mysqli_query($koneksi, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($koneksi)); // Tampilkan pesan kesalahan jika kueri gagal dieksekusi
    }

    $c = mysqli_fetch_assoc($result); // Ambil data dari hasil kueri
    ?>

    <form action="cast_update.php" method="POST" enctype="multipart/form-data" class="row g-3 mt-2">
        <input type="hidden" name="id_cast" value="<?= $idcast; ?>">
        <input type="hidden" name="foto_lama" value="<?= $c['foto']; ?>">
        <div class="col-md-6">
            <label for="namaAktor" class="form-label">Nama Aktor</label>
            <input type="text" class="form-control" name="namaAktor" id="namaAktor" value="<?= $c['namaCast'] ?>">
        </div>

        <div class="col-md-6">
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
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto">
            <img src="../assets/img/cast/<?= $c['foto'] ?>" class="mt-3" alt="<?= $c['namaCast']; ?>" width="100"
                height="150">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update Cast</button>
        </div>
    </form>
</div>

<?php include "footer.php"; ?>