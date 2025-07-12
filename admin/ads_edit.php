<?php include "navbar.php";
$idads = $_GET['id_ads'];
?>

<div class="container mt-4">
    <h4>Edit Iklan</h4>
    <?php include "../koneksi.php";

    $ads = mysqli_query($koneksi, "SELECT * FROM ads WHERE id_ads='$idads' ");
    while ($a = mysqli_fetch_array($ads)) { ?>
        <form action="ads_update.php" method="POST" enctype="multipart/form-data" class="row g-3 mt-4">
            <input type="hidden" name="id_ads" value="<?= $a['id_ads']; ?>">
            <input type="hidden" name="fotolama" value="<?= $a['fotoAds']; ?>">
            <input type="hidden" name="status" value="<?= $a['status']; ?>">
            <div class="col-md-12">
                <label for="namaIklan" class="form-label">Nama Iklan</label>
                <input type="text" class="form-control" name="namaIklan" id="namaIklan" value="<?= $a['namaAds']; ?>">
            </div>
            <div class=" col-md-12">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" id="foto">
                <img src="../assets/img/<?= $a['fotoAds']; ?>" class="mt-2" alt="<?= $a['namaAds']; ?>" width="450px"
                    height="150px">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update Ads</button>
            </div>
        </form>
    <?php } ?>
</div>

<?php include "footer.php"; ?>