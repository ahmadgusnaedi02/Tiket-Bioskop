<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4>Tambah Data Film</h4>
    <form action="film_insert.php" method="POST" enctype="multipart/form-data" class="row g-3 mt-4">
        <div class="col-md-6">
            <label for="judulFilm" class="form-label">Judul Film</label>
            <input type="text" class="form-control" id="judulFilm" name="judulFilm" required>
        </div>
        <div class="col-md-6">
            <label for="durasi" class="form-label">Durasi (menit)</label>
            <input type="number" class="form-control" id="durasi" name="durasi" required>
        </div>
        <div class="col-md-6">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun" required>
        </div>
        <div class="col-md-6">
            <label for="producer" class="form-label">Producer</label>
            <input type="text" class="form-control" id="producer" name="producer" required>
        </div>
        <div class="col-md-6">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" required>
        </div>
        <div class="col-md-6">
            <label for="batasUmur" class="form-label">Batas Umur</label>
            <select class="form-select" id="batasUmur" name="batasUmur" required>
                <option value="" selected disabled>Pilih Batas Umur</option>
                <option value="Semua Umur">Semua Umur</option>
                <option value="Remaja">Remaja</option>
                <option value="Dewasa">Dewasa</option>
                <option value="Dewasa 17+">Dewasa 17+</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="poster" class="form-label">Poster Film</label>
            <input type="file" class="form-control" id="poster" name="poster" accept="image/*" required>
        </div>

        <div class="col-md-6">
            <label for="statusFilm" class="form-label">Status Film</label>
            <select class="form-select" id="statusFilm" name="statusFilm" required>
                <option value="Tayang">Tayang</option>
                <option value="Coming soon">Coming soon</option>
            </select>
        </div>
        <div class="col-md-12">
            <label for="link" class="form-label">Link Trailer</label>
            <input type="text" name="link" class="form-control" id="link">
        </div>
        <div class="col-md-12">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Tambah Film</button>
        </div>
    </form>
</div>

<?php include "footer.php"; ?>