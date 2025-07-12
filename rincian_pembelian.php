<?php include "navbar.php"; ?>
<div class="container mt-5">
    <h2 class="mb-4">Rincian Pembelian</h2>
    <div class="row">
        <?php
        $id = $_GET['id'];
        include "koneksi.php";
        $query = mysqli_query($koneksi, "SELECT pembeliantiket.id_tiket, pembeliantiket.tgl_pembelian, pembeliantiket.jenisTiket, pembeliantiket.totalHarga, kursi.namaKursi, film.judulFilm, theater.namaTeater
            FROM pembeliantiket
            INNER JOIN film ON pembeliantiket.id_film = film.id_film
            INNER JOIN kursi ON pembeliantiket.id_kursi = kursi.id_kursi
            INNER JOIN theater ON kursi.id_theater = theater.id_theater
            WHERE pembeliantiket.id_tiket = '$id'");

        while ($t = mysqli_fetch_array($query)) {
            ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            <?= $t['judulFilm']; ?>
                        </h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Tanggal:</strong>
                                <?= $t['tgl_pembelian']; ?>
                            </li>
                            <li class="list-group-item"><strong>Jenis:</strong>
                                <?= $t['jenisTiket']; ?>
                            </li>
                            <li class="list-group-item"><strong>Kursi:</strong>
                                <?= $t['namaKursi']; ?>
                            </li>
                            <li class="list-group-item"><strong>Theater:</strong>
                                <?= $t['namaTeater']; ?>
                            </li>
                            <li class="list-group-item"><strong>Harga:</strong>
                                <?= $t['totalHarga']; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
        <a href="midtrans/examples/snap/checkout-process-simple-version.php?order_id=<?= $id; ?>">Bayar</a>
    </div>
</div>
<?php include "footer.php"; ?>