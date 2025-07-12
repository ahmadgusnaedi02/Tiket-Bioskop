<?php include "header.php"; ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-4">
    <div class="container">
        <img src="assets/img/2.png" style="width: 50px;" class="" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <div class="ms-auto">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-4">
                        <a class="nav-link" aria-current="page" href="index.php">
                            <i class="bi-house"></i> Home
                        </a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="now_playing.php">
                            <i class="bi-film"></i> Now Playing
                        </a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="coming_soon.php">
                            <i class="bi-clock"></i> Coming Soon
                        </a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="index_jadwal.php">
                            <i class="bi-map"></i> Jadwal
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
                                    <li><a class="dropdown-item" href="pesanan.php"><i class="bi bi-receipt"></i>
                                            Pesanan</a>
                                    </li>
                                    <li><a class="dropdown-item" href="tiket.php"><i class="bi bi-ticket"></i> Tiket</a>
                                    </li>
                                    <li><a class="dropdown-item" href="pengaturan_akun.php"><i class="bi bi-gear"></i>
                                            Pengaturan Akun</a>
                                    </li>
                                    <li><a class="dropdown-item" href="logout.php" id="konfirmasi-logout"><i
                                                class="bi bi-box-arrow-right"></i> Logout</a></li>

                                <?php endif; ?>
                            </ul>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>