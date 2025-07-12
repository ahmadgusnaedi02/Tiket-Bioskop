<?php
include "navbar.php";
$idfilm = $_GET['id_film'];

if ($_SESSION['hakAkses'] !== "user") {
    header("location:index_login.php");
    exit;
}

?>

<div class="container mt-5">
    <div class="card mb-3">
        <div class="card-body">
            <?php include "koneksi.php";
            $idfilm = $_GET['id_film'];

            $film = mysqli_query($koneksi, "SELECT * FROM film WHERE id_film='$idfilm' ");
            $datafilm = mysqli_fetch_array($film);
            $query = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id_film='$idfilm' ");

            $count_jadwal = mysqli_num_rows($query); // Menghitung jumlah jadwal yang tersedia
            
            // Jika tidak ada jadwal yang tersedia, tampilkan pesan "Tidak ada jam tayang"
            if ($count_jadwal === 0) {
                echo '<h2 class="card-title">' . $datafilm['judulFilm'] . '</h2>';
                echo '<p class="fs-5">Tidak ada jam tayang untuk film ini saat ini.</p>';
            } else {
                ?>
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <img src="assets/img/<?= $datafilm['poster']; ?>" class="img-fluid" alt="Poster Film">
                    </div>
                    <div class="col-md-6">
                        <h2 class="card-title">
                            <?= $datafilm['judulFilm']; ?>
                        </h2>
                        <p class="fs-5">Select showtime:</p>

                        <form action="kursi.php" method="get">
                            <div class="d-flex flex-wrap mr-3">
                                <?php while ($jt = mysqli_fetch_array($query)) { ?>
                                    <?php if ($jt['id_jadwal'] > 0) { ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_jadwal"
                                                id="<?= $jt['id_jadwal']; ?>" value="<?= $jt['id_jadwal']; ?>">
                                            <label class="form-check-label btn btn-outline-dark" for="<?= $jt['id_jadwal']; ?>">
                                                <?= $jt['jamTayang']; ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Konfirmasi Jam Tayang</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>