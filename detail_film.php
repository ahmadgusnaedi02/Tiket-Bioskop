<?php include "navbar.php" ?>


<div class="container mt-5">
    <h2 class="mb-4">Detail Film</h2>

    <?php include "koneksi.php";
    $idfilm = decrypt($_GET['id_film']);
    $query = mysqli_query($koneksi, "SELECT * FROM film WHERE id_film='$idfilm' ");
    while ($f = mysqli_fetch_array($query)) {
        ?>
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="assets/img/<?= $f['poster']; ?>" class="card-img" alt="Poster Film" width="150" height="500">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h3 class="card-title">
                            <?= $f['judulFilm']; ?>
                        </h3>
                        <p class="card-text">
                            <?= $f['deskripsi']; ?>
                        </p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Durasi:</strong>
                                <?= $f['durasi']; ?>
                            </li>
                            <li class="list-group-item"><strong>Tahun:</strong>
                                <?= $f['tahun']; ?>
                            </li>
                            <li class="list-group-item"><strong>Producer:</strong>
                                <?= $f['producer']; ?>
                            </li>
                            <li class="list-group-item"><strong>Genre:</strong>
                                <?= $f['genre']; ?>
                            </li>
                            <li class="list-group-item">
                                <strong>Batasan Umur:</strong>
                                <span class="badge bg-warning text-dark">
                                    <?= $f['batasUmur']; ?>
                                </span>
                            </li>
                        </ul>
                        <a href="<?= $f['trailerFilm']; ?>" class="btn btn-primary mt-3">Trailer</a>
                        <?php if ($f['statusFilm'] == "Tayang") { ?>
                            <a href="jadwal_tiket.php?id_film=<?= $idfilm; ?>" class="btn btn-primary mt-3">Beli Tiket</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="row mt-4">
        <div class="col-lg-12">
            <h4 class="mt-4 mb-3">Cast and Crew</h4>
            <div class="row">
                <?php
                $crew = mysqli_query($koneksi, "SELECT * FROM cast WHERE id_film='$idfilm' ");
                while ($c = mysqli_fetch_array($crew)) {
                    ?>
                    <div class="col-md-2 text-center mb-3">
                        <img src="assets/img/cast/<?= $c['foto']; ?>" class="img-fluid rounded-circle" alt="Nama Aktor 1"
                            style="width: 100px; height: 100px;">
                        <h5>
                            <?= $c['namaCast']; ?>
                        </h5>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>