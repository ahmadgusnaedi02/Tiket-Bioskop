<?php include "navbar.php"; ?>

<?php
$provinsi = [
    'Aceh',
    'Sumatera Utara',
    'Sumatera Barat',
    'Riau',
    'Jambi',
    'Sumatera Selatan',
    'Bengkulu',
    'Lampung',
    'Kepulauan Bangka Belitung',
    'Kepulauan Riau',
    'DKI Jakarta',
    'Jawa Barat',
    'Jawa Tengah',
    'DI Yogyakarta',
    'Jawa Timur',
    'Banten',
    'Bali',
    'Nusa Tenggara Barat',
    'Nusa Tenggara Timur',
    'Kalimantan Barat',
    'Kalimantan Tengah',
    'Kalimantan Selatan',
    'Kalimantan Timur',
    'Kalimantan Utara',
    'Sulawesi Utara',
    'Sulawesi Tengah',
    'Sulawesi Selatan',
    'Sulawesi Tenggara',
    'Gorontalo',
    'Sulawesi Barat',
    'Maluku',
    'Maluku Utara',
    'Papua Barat',
    'Papua'
];

?>
<div class="container mt-4">
    <h4>Tambah Data Users</h4>

    <form action="users_insert.php" method="POST" class="row g-3 mt-2">
        <div class="col-md-6">
            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="namaLengkap" id="namaLengkap">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="col-md-2">
            <label for="hakAkses" class="form-label">Hak Akses</label>
            <select class="form-select" name="hakAkses" id="hakAkses" required>
                <option value="" selected disabled>Pilih</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jk" id="jk" required>
                <option value="" selected disabled>Pilih</option>
                <option value="laki-laki">laki-laki</option>
                <option value="perempuan">perempuan</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="tLahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tLahir" id="tLahir">
        </div>
        <div class="col-md-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <select class="form-select" id="provinsi" name="provinsi" required>
                <option value="" selected disabled>Pilih Provinsi</option>
                <?php foreach ($provinsi as $namaProvinsi): ?>
                    <option value="<?= $namaProvinsi; ?>">
                        <?= $namaProvinsi; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" class="form-control" name="kota" id="kota">
        </div>
        <div class="col-md-6">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="col-md-6">
            <label for="password1" class="form-label">password</label>
            <input type="password" class="form-control" name="password" id="password1">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
    </form>
</div>

<?php include "footer.php"; ?>