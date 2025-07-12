<?php include "navbar.php" ?>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
      aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
      aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
      aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <?php include "koneksi.php";
    $ads = mysqli_query($koneksi, "SELECT * FROM ads WHERE status='aktif' ");
    while ($a = mysqli_fetch_array($ads)) {
      ?>
      <div class="carousel-item active">
        <img src="assets/img/<?= $a['fotoAds']; ?>" class="d-block w-100" alt="<?= $a['namaAds']; ?>">
      </div>
    <?php } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Search  -->
<div class="container mt-4 text-center">
  <h1>Welcome to Cinemystique</h1>
  <p>Find your favorite movies now!</p>
  <form class="d-flex justify-content-center" method="get">
    <input class="form-control me-2" name="cari" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-primary btn-lg rounded-corners" type="submit">
      <i class="bi bi-search"></i>
    </button>
  </form>
</div>

<!-- Konten Film -->
<div class="container mt-4">
  <div class="row">
    <?php
    if (isset($_GET['cari'])) {
      $cari = $_GET['cari'];
      $query = mysqli_query($koneksi, "SELECT * FROM film WHERE statusFilm='tayang' AND judulFilm LIKE '%$cari%'");
    } else {
      $query = mysqli_query($koneksi, "SELECT * FROM film ");
    }

    echo "<div class='row'>";
    while ($f = mysqli_fetch_array($query)) {
      ?>
      <div class='col-md-3'>
        <div class='card mb-4 shadow scale-up'>
          <a href='detail_film.php?id_film=<?= encrypt($f['id_film']) ?>'>
            <img src='assets/img/<?= $f['poster'] ?>' class='card-img-top img-fluid' alt='<?= $f['judulFilm'] ?>'
              style='height: 350px; object-fit: cover;'>
          </a>
          <div class='card-body'>
            <h5 class='card-title'>
              <?= $f['judulFilm'] ?>
            </h5>
            <a href='detail_film.php?id_film=<?= encrypt($f['id_film']) ?>' class='btn btn-primary'>Buy Tickets</a>
          </div>
        </div>
      </div>
      <?php
    }
    echo "</div>";
    ?>
  </div>
</div>

<?php include "footer.php"; ?>