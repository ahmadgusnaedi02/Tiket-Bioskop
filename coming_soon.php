<?php include "navbar.php" ?>
<?php include "koneksi.php" ?>
<!-- Search button -->
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
            $query = mysqli_query($koneksi, "SELECT * FROM film WHERE statusFilm='Coming Soon' AND judulFilm LIKE '%$cari%'");
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM film WHERE statusFilm='Coming Soon'");
        }

        echo "<div class='row'>";
        while ($f = mysqli_fetch_array($query)) {
            ?>
            <div class='col-md-3'>
                <div class='card mb-4 shadow scale-up'>
                    <a href='detail_film.php?id_film=<?= $f['id_film'] ?>'>
                        <img src='assets/img/<?= $f['poster'] ?>' class='card-img-top img-fluid'
                            alt='<?= $f['judulFilm'] ?>' style='height: 350px; object-fit: cover;'>
                    </a>
                    <div class='card-body'>
                        <h5 class='card-title'>
                            <?= $f['judulFilm'] ?>
                        </h5>
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