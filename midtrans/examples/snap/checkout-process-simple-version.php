<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

require_once dirname(__FILE__) . '/../../Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-pnLfbk7B3PKzOG67TcPVLCaD';
Config::$clientKey = 'SB-Mid-client-jtmXYrrQB_HZlkG7';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;

// Required

include "../../../koneksi.php";
$order_id = $_GET['id'];
// query
$query = "SELECT pembeliantiket.totalHarga, users.namaLengkap, users.email 
    FROM pembeliantiket
    INNER JOIN users ON pembeliantiket.id_user = users.id_user
    WHERE pembeliantiket.id_tiket = '$order_id'";

$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);

$nama = $data['namaLengkap'];
$email = $data['email'];

$harga = $data['totalHarga'];


$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => $harga, // no decimal allowed for creditcard
);
// Optional
$item_details = array(
    array(
        'id' => 'a1',
        'price' => $harga,
        'quantity' => 1,
        'name' => "PEMBAYARAN TIKET BIOSKOP"
    ),
);
// Optional
$customer_details = array(
    'first_name' => "$nama",
    'last_name' => "",
    'email' => "$email",
    'phone' => "",

);
// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
} catch (\Exception $e) {
    echo $e->getMessage();
}

function printExampleWarningMessage()
{
    if (strpos(Config::$serverKey, 'your ') != false) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
        die();
    }
}

?>
<?php
session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tiket Bioskop</title>
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-4">
        <div class="container">
            <a class="navbar-brand" href="#">Tiket Bioskop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <div class="ms-auto">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item me-4">
                            <a class="nav-link" aria-current="page" href="../../../index.php">
                                <i class="bi-house"></i> Home
                            </a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#">
                                <i class="bi-film"></i> Now Playing
                            </a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#">
                                <i class="bi-clock"></i> Coming Soon
                            </a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#">
                                <i class="bi-map"></i> Theaters
                            </a>
                        </li>
                        <li class="nav-item ml-7">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i>
                                    <?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Guest'; ?>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <?php if (!isset($_SESSION['nama'])): ?>
                                        <li><a class="dropdown-item" href="index_login.php">Login</a></li>
                                    <?php else: ?>
                                        <li><a class="dropdown-item" href="#">Pengaturan Akun</a></li>
                                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                        <!-- tambahkan item submenu lainnya di sini -->
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2 class="mb-4">Rincian Pembelian</h2>
        <div class="row">
            <?php
            $id = $_GET['id'];
            include "../../../koneksi.php";
            $query = mysqli_query($koneksi, "SELECT pembeliantiket.id_tiket, pembeliantiket.tgl_pembelian, pembeliantiket.jenisTiket, pembeliantiket.totalHarga, kursi.namaKursi, film.judulFilm, theater.namaTeater
            FROM pembeliantiket
            INNER JOIN film ON pembeliantiket.id_film = film.id_film
            INNER JOIN kursi ON pembeliantiket.id_kursi = kursi.id_kursi
            INNER JOIN theater ON kursi.id_theater = theater.id_theater
            WHERE pembeliantiket.id_tiket = '$id'");

            while ($t = mysqli_fetch_array($query)) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">
                                <?= $t['judulFilm']; ?>
                            </h3>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Tanggal:</strong>
                                    <?= $t['tgl_pembelian']; ?>
                                </li>
                                <li class="list-group-item"><strong>Jenis:</strong>
                                    <?= $t['jenisTiket']; ?>
                                </li>
                                <li class="list-group-item"><strong>Kursi:</strong>
                                    <?= $t['namaKursi']; ?>
                                </li>
                                <li class="list-group-item"><strong>Theater:</strong>
                                    <?= $t['namaTeater']; ?>
                                </li>
                                <li class="list-group-item"><strong>Harga:</strong>
                                    <?= $t['totalHarga']; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button id="pay-button" class="btn btn-primary mb-5 mt-3" style="width: 200px; ">Bayar!</button>
                    <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
                    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
                        data-client-key="<?php echo Config::$clientKey; ?>"></script>
                    <script type="text/javascript">
                        document.getElementById('pay-button').onclick = function () {
                            // SnapToken acquired from previous step
                            snap.pay('<?php echo $snap_token ?>');
                        };
                    </script>
                </div>

            <?php } ?>

        </div>
    </div>
    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Tiket Bioskop</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl at tincidunt
                        molestie,
                        justo
                        neque.</p>
                    <p>1234 Movie Avenue, City, Country</p>
                    <p>Phone: +1234567890</p>
                </div>
                <div class="col-md-6">
                    <h5>Location</h5>
                    <div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126906.82179001794!2d106.75189733505258!3d-6.28499133370818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698dce2ab0c19d%3A0x5705a69c5fd93556!2sUniversitas%20Bina%20Insani!5e0!3m2!1sid!2ssg!4v1703078843136!5m2!1sid!2ssg"
                            width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/bootstrap.bundle.js"></script>


</body>

</html>