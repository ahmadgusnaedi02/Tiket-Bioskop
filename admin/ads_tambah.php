<?php include "navbar.php"; ?>

<div class="container mt-4">
    <h4>Tambah Iklan</h4>
    <form action="ads_insert.php" method="POST" enctype="multipart/form-data" class="row g-3 mt-4">
        <div class="col-md-12">
            <label for="namaIklan" class="form-label">Nama Iklan</label>
            <input type="text" class="form-control" name="namaIklan" id="namaIklan">
        </div>
        <div class="col-md-12">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Tambah Ads</button>
        </div>
    </form>
</div>

<?php include "footer.php"; ?>