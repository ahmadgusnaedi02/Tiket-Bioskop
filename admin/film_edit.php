<?php include "navbar.php"; ?>
<div class="container mt-4">
    <h4>Edit Data Film</h4>
    <?php
    include "../koneksi.php";
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM film WHERE id_film='$id' ");
    while ($f = mysqli_fetch_array($data)) {
        ?>
        <form action="film_update.php" method="POST" enctype="multipart/form-data" class="row g-3 mt-4">

            <input type="hidden" name="id" value="<?= $f['id_film']; ?>">
            <input type="hidden" name="posterLama" value="<?= $f['poster']; ?>">

            <div class="col-md-6">
                <label for="judulFilm" class="form-label">Judul Film</label>
                <input type="text" class="form-control" id="judulFilm" name="judulFilm" value="<?= $f['judulFilm']; ?>"
                    required>
            </div>
            <div class="col-md-6">
                <label for="durasi" class="form-label">Durasi (menit)</label>
                <input type="number" class="form-control" id="durasi" name="durasi" value="<?= $f['durasi']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" class="form-control" id="tahun" name="tahun" value="<?= $f['tahun']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="producer" class="form-label">Producer</label>
                <input type="text" class="form-control" id="producer" name="producer" value="<?= $f['producer']; ?>"
                    required>
            </div>
            <div class="col-md-6">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" value="<?= $f['genre']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="batasUmur" class="form-label">Batas Umur</label>
                <select class="form-select" id="batasUmur" name="batasUmur" required>
                    <option value="" disabled>Pilih Batas Umur</option>
                    <option value="Semua Umur" <?= $f['batasUmur'] === 'Semua Umur' ? 'selected' : ''; ?>>Semua Umur</option>
                    <option value="Remaja" <?= $f['batasUmur'] === 'Remaja' ? 'selected' : ''; ?>>Remaja</option>
                    <option value="Dewasa" <?= $f['batasUmur'] === 'Dewasa' ? 'selected' : ''; ?>>Dewasa</option>
                    <option value="Dewasa 17+" <?= $f['batasUmur'] === 'Dewasa 17+' ? 'selected' : ''; ?>>Dewasa 17+</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="poster" class="form-label">Poster Film</label>
                <input type="file" class="form-control" id="poster" name="poster">
                <img class="mt-3" src="../assets/img/<?= $f['poster']; ?>" width="100" height="100" alt="" srcset="">
            </div>
            <div class="col-md-6">
                <label for="statusFilm" class="form-label">Status Film</label>
                <select class="form-select" id="statusFilm" name="statusFilm" required>
                    <option value="Tayang" <?= $f['statusFilm'] === 'Tayang' ? 'selected' : ''; ?>>Tayang</option>
                    <option value="Tidak Tayang" <?= $f['statusFilm'] === 'Tidak Tayang' ? 'selected' : ''; ?>>Tidak Tayang
                    </option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="link" class="form-label">Link Trailer</label>
                <input type="text" name="link" class="form-control" id="link" value="<?= $f['trailerFilm']; ?>">
            </div>
            <div class="col-md-12">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"
                    required><?= $f['deskripsi']; ?></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </div>
        </form>
    <?php } ?>
</div>


<?php include "footer.php"; ?>