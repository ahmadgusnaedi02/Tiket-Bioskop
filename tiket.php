<link rel="stylesheet" href="assets/css/tiket.css">
<?php include "navbar.php"; ?>
<title>Tiket Bioskop</title>

<div class="container mt-5">
    <div class="row mb-5">
        <?php
        include "koneksi.php";
        $iduser = $_SESSION['id_user'];
        $tiket = mysqli_query($koneksi, "SELECT pembeliantiket.id_tiket, pembeliantiket.id_user, film.judulFilm, jadwal.jamTayang, pembeliantiket.tempat, pembeliantiket.tanggal, pembeliantiket.status
        FROM pembeliantiket
        INNER JOIN jadwal ON pembeliantiket.id_jadwal = jadwal.id_jadwal
        INNER JOIN film ON jadwal.id_film = film.id_film
        WHERE pembeliantiket.id_user = '$iduser' AND pembeliantiket.status='sudah bayar';
        ");
        $idtiket = mysqli_query($koneksi, "SELECT id_tiket FROM pembeliantiket WHERE id_user='$iduser' ");
        $id_tiket = mysqli_fetch_assoc($idtiket);

        while ($t = mysqli_fetch_array($tiket)) { ?>
            <div class="col-md-12 mb-2">
                <div class="card text-center" style="position: relative;">
                    <div class="card-header bg-dark text-white">
                        <img src="assets/img/2.png" alt="Bioskop Logo" class="logo img-fluid">
                        <h6 class="cinema-name mb-0">Cinemystique</h6>
                    </div>
                    <div class="card-body">
                        <h5 class="movie-title" align="left">
                            <?= $t['judulFilm']; ?>
                        </h5>
                        <div class="info mb-3">
                            <p class="mb-1">Tanggal:
                                <?= date('Y-m-d', strtotime($t['jamTayang'])); ?>
                            </p>
                            <p class="mb-1">Jam:
                                <?= date('H:i', strtotime($t['jamTayang'])); ?> WIB
                            </p>
                            <p>Nomor Kursi:
                                <?= $t['tempat']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="tear-off">
                        <br>
                        <br>
                        <p class="text-muted">--- Tear-off untuk Petugas Bioskop ---</p>
                        <p>Nomor Transaksi:
                            Cinemy-
                            <?= $t['id_tiket']; ?>-stique

                        </p>
                        <p>Tanggal Beli:
                            <?= $t['tanggal']; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-md-12 text-center">
            <a href="cetak_tiket.php?id_tiket=<?= $id_tiket['id_tiket']; ?>" target="_blank" class="btn btn-primary"><i
                    class="bi bi-print"></i> CETAK</a>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>