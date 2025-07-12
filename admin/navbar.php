<?php include "header.php"; ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-4">
    <div class="container">
        <img src="../assets/img/2.png" style="width: 50px;" alt="" srcset="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <div class="ms-auto">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-4">
                        <a class="nav-link" aria-current="page" href="index.php">
                            <i class="bi-house"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" aria-current="page" href="jadwal_index.php">
                            <i class="bi bi-calendar"></i> Jadwal Film
                        </a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" aria-current="page" href="laporan_index.php">
                            <i class="bi bi-clipboard-data"></i> Laporan
                        </a>
                    </li>
                    <li class="nav-item me-4">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-list"></i>
                                Data - data
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dataSubMenu">
                                <li><a class="dropdown-item" href="ads_index.php"><i class="bi bi-newspaper"></i> Data
                                        Ads</a></li>
                                <li><a class="dropdown-item" href="users_index.php"><i class="bi bi-people"></i> Data
                                        Users</a>
                                </li>
                                <li><a class="dropdown-item" href="cast_index.php"><i class="bi bi-people"></i> Data
                                        Cast Film</a>
                                </li>
                                <li><a class="dropdown-item" href="film_index.php"><i class="bi bi-film"></i> Data
                                        Film</a></li>
                                <li><a class="dropdown-item" href="pembelian_index.php"><i class="bi bi-cart"></i> Data
                                        Pembelian
                                        Tiket</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item ml-7">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                                halo,
                                <?= $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="pengaturan_akun_index.php"><i class="bi bi-gear"></i>
                                        pengaturan akun</a>
                                </li>
                                <li><a class="dropdown-item" id="konfirmasi-logout" href="logout.php"><i
                                            class="bi bi-box-arrow-right"></i>
                                        Logout</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>