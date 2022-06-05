<?php

    session_start();

    $is_login;

    if(empty($_SESSION['user'])){
        $is_login = false;
    } else {
        $profile_picture =  ( !is_null($_SESSION['user']['gambar'])) ? './assets/users/'. $_SESSION['user']['gambar'] : 'https://via.placeholder.com/140?text=tidak+ada+foto';
        $is_login = true;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style/style.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>hijabku</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="#">Nurhkma</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse d-flex " id="navbarNav">
                    <ul class="navbar-nav m-auto ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="">beranda</a>
                        </li>
                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                kategory
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./pages/hijab.php?category=pasminah&harga=all-p">Pasminah</a></li>
                                <li><a class="dropdown-item" href="./pages/hijab.php?category=rabbani&harga=all-p">Rabbani</a></li>
                                <li><a class="dropdown-item" href="./pages/hijab.php?category=bego&harga=all-p">Bego</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./pages/registrasi.php">registrasi</a>
                        </li>
                    </ul>
                </div>
            <div class="dropdown dropstart">
                <button 
                    class="avatar " 
                    id="user-menu" 
                    type="button" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false"
                    style="background-image: url('<?= $profile_picture ?>');"
                ></button>
                <ul class="dropdown-menu" aria-labelledby="user-menu">
                    <li style="display: <?= ($is_login) ? 'block' : 'none' ?>;" ><a href="./pages/profile.php" class="dropdown-item">profil</a></li>
                    <li style="display: <?= ($is_login) ? 'none' : 'block' ?>;"><a href="./pages/login.php" class="dropdown-item">login</a></li>
                    <li style="display: <?= ($is_login) ? 'block' : 'none' ?>;" ><a href="./function/logout.php" class="dropdown-item" >logout</a></li>
                </ul>
            </div>
            <a href="./pages/keranjang.php" class="ms-3">
                <i class="bi bi-cart cart-btn"></i>          
            </a>
        </div>
    </nav>

    <div class="container-xxl hero">

        <form action="" class="position-absolute start-50 translate-middle-x search-box">
            <div class="input-group input-container">
                <i class="bi bi-search search-icon"></i>
                <input type="text" class="form-control" placeholder="cari hijab lebih banyak">
                <button class="btn btn-search">cari</button>
            </div>
        </form>
    </div>

    <div class="container mt-5 pt-5">
        <div class="row gy-5">
            <?php for($i = 0; $i < 8; $i++): ?>
                <div class="col-md-3 col-6 col-sm-4 d-flex">
                    <form action="">
                        <div class="card item-card m-auto" style="width: 18rem;">
                            <div class="card-body">
                                <img src="img/hero.jpg" class="card-img-top" alt="...">
                                <h5 class="card-title card-home-title mt-3">Hijab Syantik ByRahmat</h5>
                                <p class="card-text card-home-text">Rp 65,000,00</p>
                            </div>
                            <div class="card-footer mt-2 item-card d-flex">
                                <a href="#" class="btn-detail d-flex justify-content-center align-items-center flex-grow-1">
                                    detail
                                </a>
                                <button class="btn d-flex justify-content-center align-items-center flex-grow-2" >
                                    <i class="bi bi-cart2 cart-btn"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endfor ?>
        </div>
        <a href="./pages/hijab.php?category=all-c&harga=all-p" class="more-btn d-flex justify-content-center align-items-center mt-5">
            lebih banyak lagi <i class="bi bi-arrow-right arrow ms-2"></i>
        </a>
    </div>

    <section class="footer mt-5">
        <div class="container-fluid footer-container py-5 px-5">
            <div class="row">
                <div class="col-md-4 col-xs-12 d-flex align-items-center justify-content-xs-end">
                    <p class="web-title">
                        hijabku.com
                    </p>
                </div>
                <div class="col-md-4 col-xs-12 d-flex justify-content-md-center justify-content-sm-start">
                    <ul class="list-group footer-contact">
                        <li class="list-group-item contact footer-contact-list contact mb-3">
                            contact us
                        </li>
                        <li class="list-group-item footer-contact-list mb-2">
                            <i class="bi bi-instagram"></i> rahmat_riyadi_syam
                        </li>
                        <li class="list-group-item footer-contact-list mb-2">
                            <i class="bi bi-envelope"></i> rahmatriyadi1711@gmail.com
                        </li>
                        <li class="list-group-item footer-contact-list mb-2">
                            <i class="bi bi-whatsapp"></i> 0878-1958-2058
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-xs-12 d-flex justify-content-md-end justify-content-sm-start">
                    <ul class="list-group footer-contact">
                        <li class="list-group-item contact footer-contact-list contact mb-3">
                            Owner of hijabku
                        </li>
                        <li class="list-group-item footer-contact-list mb-2">
                            Nurhikma
                        </li>
                        <li class="list-group-item footer-contact-list mb-2">
                            Rahmat Riyadi
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <script src="js/bootstrap.min.js" ></script>
</body>
</html>