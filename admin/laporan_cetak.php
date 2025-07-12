<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style type="text/css">
        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .container {
                width: 100%;
            }

            .card {
                margin: 0;
                border: none;
                box-shadow: none;
            }

            .table {
                font-size: 10pt;
            }

            .btn {
                display: none;
            }


            .badge {
                display: inline-block;
                padding: .25em .4em;
                font-size: 75%;
                font-weight: 700;
                line-height: 1;
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: .25rem;
            }

            .table-responsive {
                overflow-x: auto;
            }
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <?php if (isset($_GET['dari']) && isset($_GET['sampai'])) {
            $dari = $_GET['dari'];
            $sampai = $_GET['sampai']; ?>
            <div class="card mt-5">
                <div class="card-heading mt-2">
                    <div class="container">
                        <h4>Data Laporan Pembelian Tiket</h4>
                        <b>
                            <?= $dari; ?>
                        </b> sampai <b>
                            <?= $sampai; ?>
                        </b>
                    </div>
                </div>
                <div class="card-body row g-3">
                    <div class="table-responsive mt-2">
                        <table class="table table-stripped table-hover mt-2">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pembeli</th>
                                    <th scope="col">Judul Film</th>
                                    <th scope="col">Jumlah Tiket</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Tanggal</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../koneksi.php";
                                $no = 1;
                                $pembelian = "SELECT users.namaLengkap, film.judulFilm, pembeliantiket.jumlahTiket, pembeliantiket.totalHarga, pembeliantiket.tanggal, pembeliantiket.status
                                FROM pembeliantiket
                                JOIN users ON pembeliantiket.id_user = users.id_user
                                JOIN jadwal ON pembeliantiket.id_jadwal = jadwal.id_jadwal
                                JOIN film ON jadwal.id_film = film.id_film
                                WHERE date(pembeliantiket.tanggal) > '$dari' AND date(pembeliantiket.tanggal) < '$sampai'
                                ";
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
                                            <?= "Rp " . number_format($p['totalHarga'], 0, ',', '.'); ?>
                                        </td>
                                        <td>
                                            <?= $p['tanggal']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($p['status'] == "belum bayar") {
                                                echo "<span style='color: #721c24; background-color: #f8d7da;' class='badge'>Belum Bayar</span>";
                                            } else if ($p['status'] == "sudah bayar") {
                                                echo "<span style='color: #155724; background-color: #d4edda;' class='badge'>Sudah Bayar</span>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
    <?php include "footer.php" ?>
</body>

</html>