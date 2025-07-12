<?php include "navbar.php";
$idjadwal = $_GET['id_jadwal'];
?>

<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="col-md-12 mb-5">
            <button style="width: 565px; height: 50px; margin-left: 55px;" class="btn btn-dark btn-block mb-3"
                disabled>Layar</button>
            <div class="row mb-3 justify-content-center">
                <div class="col-md-12">
                    <?php
                    include "koneksi.php";
                    $kursiA = mysqli_query($koneksi, "SELECT * FROM kursi WHERE namaKursi LIKE '%A%' AND id_jadwal = '$idjadwal'");
                    $kursiB = mysqli_query($koneksi, "SELECT * FROM kursi WHERE namaKursi LIKE '%B%' AND id_jadwal = '$idjadwal'");
                    $kursiC = mysqli_query($koneksi, "SELECT * FROM kursi WHERE namaKursi LIKE '%C%' AND id_jadwal = '$idjadwal'");
                    $kursiD = mysqli_query($koneksi, "SELECT * FROM kursi WHERE namaKursi LIKE '%D%' AND id_jadwal = '$idjadwal'");
                    $kursiE = mysqli_query($koneksi, "SELECT * FROM kursi WHERE namaKursi LIKE '%E%' AND id_jadwal = '$idjadwal'");
                    $kursiF = mysqli_query($koneksi, "SELECT * FROM kursi WHERE namaKursi LIKE '%F%' AND id_jadwal = '$idjadwal'");
                    $kursiG = mysqli_query($koneksi, "SELECT * FROM kursi WHERE namaKursi LIKE '%G%' AND id_jadwal = '$idjadwal'");
                    $kursiH = mysqli_query($koneksi, "SELECT * FROM kursi WHERE namaKursi LIKE '%H%' AND id_jadwal = '$idjadwal'");
                    ?>
                    <form action="proses_pembelian.php" method="post">
                        <input type="hidden" name="id_jadwal" value="<?= $idjadwal ?>">
                        <div class="seats">

                            <div class="row">
                                <span class="seat2">H</span>
                                <?php while ($H = mysqli_fetch_assoc($kursiH)) { ?>
                                    <input type="checkbox" name="kursi[]" <?= $H['status'] ?> value="<?= $H['namaKursi'] ?>"
                                        readonly="on" class="seat">

                                <?php } ?>
                            </div>
                            <div class="row">
                                <span class="seat2">G</span>
                                <?php while ($G = mysqli_fetch_assoc($kursiG)) { ?>
                                    <input type="checkbox" name="kursi[]" <?= $G['status'] ?> value="<?= $G['namaKursi'] ?>"
                                        readonly="on" class="seat">

                                <?php } ?>
                            </div>
                            <div class="row">
                                <span class="seat2">F</span>
                                <?php while ($F = mysqli_fetch_assoc($kursiF)) { ?>
                                    <input type="checkbox" name="kursi[]" <?= $F['status'] ?> value="<?= $F['namaKursi'] ?>"
                                        readonly="on" class="seat">

                                <?php } ?>
                            </div>
                            <div class="row">
                                <span class="seat2">E</span>
                                <?php while ($E = mysqli_fetch_assoc($kursiE)) { ?>
                                    <input type="checkbox" name="kursi[]" <?= $E['status'] ?> value="<?= $E['namaKursi'] ?>"
                                        readonly="on" class="seat">

                                <?php } ?>
                            </div>
                            <div class="row">
                                <span class="seat2">D</span>
                                <?php while ($D = mysqli_fetch_assoc($kursiD)) { ?>
                                    <input type="checkbox" name="kursi[]" <?= $D['status'] ?> value="<?= $D['namaKursi'] ?>"
                                        readonly="on" class="seat">

                                <?php } ?>
                            </div>
                            <div class="row">
                                <span class="seat2">C</span>
                                <?php while ($C = mysqli_fetch_assoc($kursiC)) { ?>
                                    <input type="checkbox" name="kursi[]" <?= $C['status'] ?> value="<?= $C['namaKursi'] ?>"
                                        readonly="on" class="seat">

                                <?php } ?>
                            </div>
                            <div class="row">
                                <span class="seat2">B</span>
                                <?php while ($B = mysqli_fetch_assoc($kursiB)) { ?>
                                    <input type="checkbox" name="kursi[]" <?= $B['status'] ?> value="<?= $B['namaKursi'] ?>"
                                        readonly="on" class="seat">

                                <?php } ?>
                            </div>
                            <div class="row">
                                <span class="seat2">A</span>
                                <?php while ($A = mysqli_fetch_assoc($kursiA)) { ?>
                                    <input type="checkbox" name="kursi[]" <?= $A['status'] ?> value="<?= $A['namaKursi'] ?>"
                                        readonly="on" class="seat">

                                <?php } ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Konfirmasi Kursi</button>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include "footer.php" ?>