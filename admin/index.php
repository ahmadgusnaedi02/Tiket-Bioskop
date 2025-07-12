<?php
include "../koneksi.php";

// Query total pendapatan
$sqlTotalPendapatan = "SELECT SUM(totalHarga) AS totalPendapatan FROM pembeliantiket";
$resultTotalPendapatan = mysqli_query($koneksi, $sqlTotalPendapatan);
$totalPendapatan = mysqli_fetch_array($resultTotalPendapatan);

// Query total pengguna
$sqlTotalPengguna = "SELECT COUNT(*) AS total_pengguna FROM users";
$resultTotalPengguna = mysqli_query($koneksi, $sqlTotalPengguna);
$totalPengguna = mysqli_fetch_assoc($resultTotalPengguna);

// Query total film
$sqlTotalFilm = "SELECT COUNT(*) AS total_film FROM film";
$resultTotalFilm = mysqli_query($koneksi, $sqlTotalFilm);
$totalFilm = mysqli_fetch_assoc($resultTotalFilm);

// grafik
$sql = "SELECT YEAR(tanggal) AS tahun, MONTH(tanggal) AS bulan, SUM(totalHarga) AS totalPembelian
        FROM pembeliantiket
        GROUP BY YEAR(tanggal), MONTH(tanggal)
        ORDER BY tahun, bulan";


$result = mysqli_query($koneksi, $sql);
$dataPoints = [];
while ($row = mysqli_fetch_assoc($result)) {
    $dataPoints[] = array("label" => date("M", mktime(0, 0, 0, $row['bulan'], 1)), "y" => $row['totalPembelian']);
}



?>



<?php include "navbar.php"; ?>
<div class="container mt-4">

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <div class="ml-5">
                        <p class="font-weight-bold card-text">Pendapatan</p>
                    </div>
                </div>
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-cash-coin bi-3x me-3" style="font-size: 80px;"></i>
                    <p class="card-text mb-0" style="font-size: 30px;">
                        <?= 'Rp ' . number_format($totalPendapatan['totalPendapatan'], 0, ',', '.'); ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <div class="ml-5">
                        <p class="font-weight-bold card-text">Pengguna</p>
                    </div>
                </div>
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-person-fill bi-3x me-3" style="font-size: 80px;"></i>
                    <p class="card-text mb-0" style="font-size: 30px;">
                        <?= $totalPengguna['total_pengguna']; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <div class="ml-5">
                        <p class="font-weight-bold card-text">Total Film</p>
                    </div>
                </div>
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-film bi-3x me-3" style="font-size: 80px;"></i>
                    <p class="card-text mb-0" style="font-size: 30px;">
                        <?= $totalFilm['total_film']; ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- Grafik Pembelian Tiket -->
        <div class="row mt-4">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header bg-dark text-light">
                        <div class="ml-5">
                            <p class="font-weight-bold card-text">Pembelian Tiket per Bulan</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<?php include "footer.php"; ?>
<script>
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Pembelian Tiket per Bulan"
            },
            axisY: {
                title: "Total Pendapatan",
                prefix: "Rp "
            },
            data: [{
                type: "column",
                yValueFormatString: "Rp #,##0",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });

        chart.render();
    }
</script>