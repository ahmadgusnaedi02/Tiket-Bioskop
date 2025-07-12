<?php include "navbar.php";
if ($_SESSION['hakAkses'] !== "user") {
    header("location:index_login.php");
    exit;
}
?>

<div class="container mt-5 konten">
    <h4>Pesanan Saya</h4>
    <?php
    include "koneksi.php";
    $iduser = $_SESSION['id_user'];
    $query = mysqli_query($koneksi, "SELECT pembeliantiket.id_tiket, pembeliantiket.status, pembeliantiket.totalHarga, pembeliantiket.tempat, film.judulFilm, jadwal.jamTayang
    FROM pembeliantiket
    INNER JOIN jadwal ON pembeliantiket.id_jadwal = jadwal.id_jadwal
    INNER JOIN film ON jadwal.id_film = film.id_film
    WHERE pembeliantiket.id_user = '$iduser'");
    ?>
    <div class="table-responsive mb-5">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Judul Film</th>
                    <th>Jam Tayang</th>
                    <th>Kursi</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($t = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td>
                            <?= $t['judulFilm']; ?>
                        </td>
                        <td>
                            <?= $t['jamTayang']; ?>
                        </td>
                        <td>
                            <?= $t['tempat']; ?>
                        </td>
                        <td>
                            <?= $t['totalHarga']; ?>
                        </td>
                        <td>
                            <?php if ($t['status'] == 'belum bayar') { ?>
                                <a href="proses_midtrans.php?id=<?= $t['id_tiket'] ?>" class="btn btn-danger btn-sm">Belum
                                    Bayar</a>
                            <?php } else { ?>
                                <span class="btn btn-primary btn-sm">
                                    <?= $t['status']; ?>
                                </span>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="delete_pembelian.php?id=<?= $t['id_tiket']; ?>" class="btn btn-danger btn-sm"><i
                                    class="bi bi-trash konfirmasi"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "footer.php"; ?>