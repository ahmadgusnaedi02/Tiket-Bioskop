<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

require_once dirname(__FILE__) . '/midtrans/Midtrans.php';
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

include "koneksi.php";
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
<?php include "navbar.php"; ?>
<div class="container mt-5">
    <h2 class="mb-4">Rincian Pembelian</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul Film</th>
                    <th>Jam Tayang</th>
                    <th>Kursi</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = $_GET['id'];
                include "koneksi.php";
                $query = mysqli_query($koneksi, "SELECT pembeliantiket.id_tiket, pembeliantiket.status, pembeliantiket.totalHarga, pembeliantiket.tempat, film.judulFilm, jadwal.jamTayang
                    FROM pembeliantiket
                    INNER JOIN jadwal ON pembeliantiket.id_jadwal = jadwal.id_jadwal
                    INNER JOIN film ON jadwal.id_film = film.id_film
                    WHERE pembeliantiket.id_tiket = '$id'");

                while ($t = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td>
                            <?= $t['judulFilm']; ?>
                        </td>
                        <td>
                            <?= $t['jamTayang']; ?>
                        </td>
                        <td>
                            <?= $t['tempat']; ?>
                        </td>
                        <td>
                            <?= $t['totalHarga']; ?>
                        </td>
                        <td>
                            <?= $t['status']; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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
<?php include "footer.php"; ?>