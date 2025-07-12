<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4>Index Iklan</h4>
    <div class="table-responsive mt-4">
        <a href="ads_tambah.php" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Iklan</a>
        <table class="table table-stripped table-hover mt-2">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Iklan</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Status</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <?php
            include "../koneksi.php";
            $no = 1;
            $ads = "SELECT * FROM ads";
            $query = mysqli_query($koneksi, $ads);
            while ($a = mysqli_fetch_array($query)) {
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $no++; ?>
                        </td>
                        <td>
                            <?= $a['namaAds']; ?>
                        </td>
                        <td>
                            <img src="../assets/img/<?= $a['fotoAds']; ?>" alt="<?= $a['namaAds']; ?>" width="400"
                                height="150">
                        </td>
                        <td>
                            <?php
                            if ($a['status'] == "aktif") { ?>
                                <a href="update_status_ads.php?id_ads=<?= $a['id_ads']; ?>" class="btn btn-primary btn-sm"><i
                                        class="bi bi-pencil"></i> aktif</a>
                            <?php } else { ?>

                                <a href="update_status_ads.php?id_ads=<?= $a['id_ads']; ?>" class="btn btn-danger btn-sm"><i
                                        class="bi bi-pencil"></i> tidak
                                    aktif</a>
                            <?php } ?>
                        </td>
                        <td colspan="2">
                            <a href="ads_edit.php?id_ads=<?= $a['id_ads']; ?>" class="btn btn-primary btn-sm"><i
                                    class="bi bi-pencil"></i> </a>
                            <a href="ads_delete.php?id_ads=<?= $a['id_ads']; ?>" class="btn btn-danger btn-sm hapus"><i
                                    class="bi bi-trash"></i></a>
                        </td>

                    </tr>

                </tbody>
            <?php } ?>
        </table>
    </div>
</div>


<?php include "footer.php"; ?>