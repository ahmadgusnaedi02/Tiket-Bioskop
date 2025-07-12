<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4>Laporan Pembelian Tiket</h4>

    <form action="laporan_index.php" method="get" class="mt-4">
        <div class="card">
            <div class="card-body row g-3">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="tgl_dari">Dari tanggal</label>
                        <input type="date" name="tgl_dari" class="form-control">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="tgl_sampai">Sampai Tanggal</label>
                        <input type="date" name="tgl_sampai" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="invisible">Filter</label>
                        <input type="submit" class="btn btn-primary" style="width: 100%;" value="Filter">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php if (isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])) {
        $dari = $_GET['tgl_dari'];
        $sampai = $_GET['tgl_sampai']; ?>
        <div class="card mt-5">
            <div class="card-heading mt-2">
                <div class="container">
                    <h4>Data Laporan Pembelian Tiket</h4>
                    <b>
                        <?= $dari; ?>
                    </b> sampai <b>
                        <?= $sampai; ?>
                    </b>
                </div>
            </div>
            <div class="card-body row g-3">
                <div class="table-responsive mt-2">
                    <a href="laporan_cetak.php?dari=<?= $dari; ?>&sampai=<?= $sampai; ?>" target="_blank"
                        class="btn btn-warning">
                        <i class="bi bi-printer"></i> Cetak Laporan
                    </a>

                    <table class="table table-stripped table-hover mt-2">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pembeli</th>
                                <th scope="col">Judul Film</th>
                                <th scope="col">Jumlah Tiket</th>
                                <th scope="col">Tempat Duduk</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Tanggal</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../koneksi.php";
                            $no = 1;
                            $pembelian = "SELECT users.namaLengkap, film.judulFilm, pembeliantiket.jumlahTiket, pembeliantiket.tempat, pembeliantiket.totalHarga, pembeliantiket.tanggal, pembeliantiket.status
                                FROM pembeliantiket
                                JOIN users ON pembeliantiket.id_user = users.id_user
                                JOIN jadwal ON pembeliantiket.id_jadwal = jadwal.id_jadwal
                                JOIN film ON jadwal.id_film = film.id_film
                                WHERE date(pembeliantiket.tanggal) > '$dari' AND date(pembeliantiket.tanggal) < '$sampai'
                                ";
                            $query = mysqli_query($koneksi, $pembelian);
                            while ($p = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $p['namaLengkap']; ?>
                                    </td>
                                    <td>
                                        <?= $p['judulFilm']; ?>
                                    </td>
                                    <td>
                                        <?= $p['jumlahTiket']; ?>
                                    </td>
                                    <td>
                                        <?= $p['tempat']; ?>
                                    </td>
                                    <td>
                                        <?= "Rp " . number_format($p['totalHarga'], 0, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <?= $p['tanggal']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($p['status'] == "belum bayar") {
                                            echo "<div class='btn btn-danger btn-sm'>Belum Bayar</div>";
                                        } else if ($p['status'] == "sudah bayar") {
                                            echo "<div class='btn btn-success btn-sm'>Sudah Bayar</div>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php include "footer.php"; ?>