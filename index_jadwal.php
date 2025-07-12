<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4>Jadwal Film</h4>
    <div class="row mt-3">
        <?php include "koneksi.php";
        $jadwal = mysqli_query($koneksi, "SELECT jadwal.id_jadwal, jadwal.jamTayang, film.judulFilm, film.poster FROM jadwal INNER JOIN film ON jadwal.id_film = film.id_film");
        while ($j = mysqli_fetch_array($jadwal)) { ?>
            <div class="col-md-12">
                <div class="row mb-3">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-1">
                                <img src="assets/img/<?= $j['poster']; ?>" style="height: 150px; margin: 10px;"
                                    class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">
                                        <?= $j['judulFilm']; ?>
                                    </h2>
                                    <p class="card-text">
                                        <?= $j['jamTayang']; ?>
                                    </p>
                                    <a href="kursi.php?id_jadwal=<?= $j['id_jadwal']; ?>" class="btn btn-primary">Pesan
                                        Tiket</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include "footer.php"; ?>