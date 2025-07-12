<?php include "navbar.php";

$idfilm = $_GET['id_film'];
$id_user = $_SESSION['id_user'];
?>

<div class="container mt-5">
    <h2 class="mb-4">Pembelian Tiket</h2>

    <form action="proses_pembelian.php" method="POST">
        <input type="hidden" name="id_film" value="<?= $idfilm; ?>">
        <input type="hidden" name="id_user" value="<?= $id_user; ?>">
        <div class="mb-3">
            <label for="tanggalPembelian" class="form-label">Tanggal Pembelian:</label>
            <input type="date" class="form-control" id="tanggalPembelian" name="tanggal_pembelian" required>
        </div>


        <!-- Pilihan jenis tiket -->
        <div class="mb-3">
            <label for="jenisTiket" class="form-label">Jenis Tiket:</label>
            <select class="form-select" id="jenisTiket" name="jenis_tiket" required>
                <option value="Reguler">Reguler</option>
                <option value="VIP">VIP</option>
            </select>
        </div>
        <!-- Input jumlah tiket -->
        <div class="mb-3">
            <label for="jumlahTiket" class="form-label">Jumlah Tiket:</label>
            <input type="number" class="form-control" id="jumlahTiket" name="jumlah_tiket" required>
        </div>

        <!-- Pilihan tempat duduk -->
        <div class="row mb-3">
            <div class="col-md-10">
                <button style="width: 67%; height: 100px;" class="btn btn-outline-primary btn-block mb-3"
                    disabled>Layar</button>
                <div class="row mb-3">
                    <?php
                    include "koneksi.php";
                    $query = mysqli_query($koneksi, "SELECT * FROM kursi");
                    $count = 0;
                    while ($k = mysqli_fetch_array($query)):
                        $disabled = ($k['status'] !== 'tersedia') ? 'disabled' : ''; // Menentukan apakah kursi tersedia atau tidak
                        ?>
                        <div class="col-1">
                            <label>
                                <input type="checkbox" name="tempat_duduk[]" value="<?= $k['namaKursi']; ?>" <?= $disabled; ?>>
                                <span class="btn btn-outline-primary" <?= $disabled; ?>>
                                    <?= $k['namaKursi']; ?>
                                </span>
                            </label>
                        </div>
                        <?php
                        $count++;
                        if ($count % 8 == 0):
                            ?>
                        </div>
                        <div class="row mb-3">
                            <?php
                        endif;
                    endwhile;
                    ?>
                </div>
            </div>
        </div>

        <!-- Tombol Lanjut -->
        <button type="submit" class="btn btn-primary mb-3">Pesan Tiket</button>
    </form>
</div>

<?php include "footer.php" ?>