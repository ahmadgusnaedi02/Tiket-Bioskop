<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4>Index Jadwal Film</h4>
    <div class="table-responsive mt-4">
        <a href="jadwal_tambah.php" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Jadwal Film</a>
        <table class="table table-stripped table-hover mt-2">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Judul Film</th>
                    <th scope="col">Kursi</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <?php
            include "../koneksi.php";
            $no = 1;
            $jadwal = "SELECT id_jadwal, judulFilm, jamTayang FROM jadwal INNER JOIN film ON jadwal.id_film=film.id_film";
            $query = mysqli_query($koneksi, $jadwal);
            while ($j = mysqli_fetch_array($query)) {
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $no++; ?>
                        </td>
                        <td>
                            <?= substr($j['jamTayang'], 0, -8) ?>
                        </td>
                        <td>
                            <?= substr($j['jamTayang'], 10, 6) ?>
                        </td>
                        <td>
                            <?= $j['judulFilm']; ?>
                        </td>
                        <td>
                            <?php
                            $cek = mysqli_query($koneksi, "SELECT COUNT(*) as namaKursi FROM kursi WHERE id_jadwal = '" . $j['id_jadwal'] . "' ");
                            $dataKursi = mysqli_fetch_assoc($cek);

                            if ($dataKursi['namaKursi'] > 0) {
                                echo "Kursi sudah terisi";
                            } else {
                                ?>
                                <a href="kursi_tambah.php?id_jadwal=<?= $j['id_jadwal']; ?>" class="btn btn-primary btn-sm"><i
                                        class="bi bi-plus-lg"></i> </a>
                            <?php } ?>
                        </td>

                        <td colspan="2">
                            <a href="jadwal_edit.php?id_jadwal=<?= $j['id_jadwal']; ?>" class="btn btn-primary btn-sm"><i
                                    class="bi bi-pencil"></i> </a>
                            <a href="jadwal_delete.php?id_jadwal=<?= $j['id_jadwal']; ?>"
                                class="btn btn-danger btn-sm hapus"><i class="bi bi-trash"></i></a>
                        </td>

                    </tr>

                </tbody>
            <?php } ?>
        </table>
    </div>
</div>


<?php include "footer.php"; ?>