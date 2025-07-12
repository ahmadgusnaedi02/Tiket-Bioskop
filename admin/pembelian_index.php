<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4>Data Pembelian</h4>
    <div class="table-responsive mt-4">
        <table class="table table-stripped table-hover mt-2">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Judul Film</th>
                    <th scope="col">Jumlah Tiket</th>
                    <th scope="col">Tempat Duduk</th>
                    <th scope="col">Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../koneksi.php";
                $no = 1;
                $pembelian = "SELECT users.namaLengkap, film.judulFilm, pembeliantiket.jumlahTiket, pembeliantiket.tempat, pembeliantiket.totalHarga, pembeliantiket.id_tiket
                FROM pembeliantiket
                JOIN users ON pembeliantiket.id_user = users.id_user
                JOIN jadwal ON pembeliantiket.id_jadwal = jadwal.id_jadwal
                JOIN film ON jadwal.id_film = film.id_film";

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
                            <?= $p['totalHarga']; ?>
                        </td>
                        <td>
                            <a href="pembelian_delete.php?id_pembelian=<?= $p['id_tiket']; ?>"
                                class="btn btn-danger btn-sm hapus"><i class="bi bi-trash"></i> Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "footer.php"; ?>