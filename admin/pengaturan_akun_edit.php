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
    <h4>Edit Profil</h4>
    <?php
    include "../koneksi.php";

    $iduser = $_SESSION['id_user'];
    $data = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$iduser' ");
    $u = mysqli_fetch_array($data);
    ?>
    <form action="pengaturan_akun_update.php" method="POST" class="row g-3 mt-2">
        <input type="hidden" name="id_user" value="<?= $u['id_user']; ?>">
        <div class="col-md-6">
            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="namaLengkap" id="namaLengkap"
                value="<?= $u['namaLengkap']; ?>">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= $u['email']; ?>">
        </div>
        <div class="col-md-2">
            <label for="hakAkses" class="form-label">Hak Akses</label>
            <select class="form-select" name="hakAkses" id="hakAkses" required>
                <option value="" disabled>Pilih</option>
                <option value="admin" <?= ($u['hakAkses'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                <option value="user" <?= ($u['hakAkses'] == 'user') ? 'selected' : ''; ?>>User</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jk" id="jk" required>
                <option value="" disabled>Pilih</option>
                <option value="laki-laki" <?= ($u['jk'] == 'laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="perempuan" <?= ($u['jk'] == 'perempuan') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="tLahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tLahir" id="tLahir" value="<?= $u['tLahir']; ?>">
        </div>
        <div class="col-md-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <select class="form-select" id="provinsi" name="provinsi" required>
                <?php foreach ($provinsi as $namaProvinsi): ?>
                    <option value="<?= $namaProvinsi; ?>" <?php echo ($u['provinsi'] == $namaProvinsi) ? 'selected' : ''; ?>>
                        <?= $namaProvinsi; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-3">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" class="form-control" name="kota" id="kota" value="<?= $u['kota']; ?>">
        </div>
        <div class=" col-md-6">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" value="<?= $u['username']; ?>">
        </div>
        <div class=" col-md-6">
            <label for="password1" class="form-label">password</label>
            <input type="password" class="form-control" name="password" id="password1">
        </div>

        <div class=" col-12">
            <button type="submit" class="btn btn-primary">Update Data</button>
        </div>
    </form>
</div>

<?php include "footer.php"; ?>