<?php 

    require '../function/function.php';

    session_start();
    
    $is_login;
    
    if(empty($_SESSION['user'])){
        $is_login = false;
        header('Location: ../index.php');
    } else {
        $is_login = true;
    }

    $userId = $_SESSION['user']['id'];
    $total = 0;

    $data = query("SELECT * FROM keranjang JOIN hijab ON keranjang.id_produk = hijab.id WHERE id_user = '$userId'");

    $_SESSION['keranjang'] = $data;

    $profile_picture =  ( !is_null($_SESSION['user']['gambar'])) ? '../assets/users/'. $_SESSION['user']['gambar'] : 'https://via.placeholder.com/140?text=tidak+ada+foto';

    if(isset($_GET['id']) && isset($_GET['produkId'])){

        if(deleteItem($_GET['produkId'], $_GET['id']) > 0){
            header('Location: ./keranjang.php');
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style/style.css">
    <link rel="stylesheet" href="../css/style/keranjang.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>keranjang</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light hijab">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="#">Nurhkma</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse d-flex " id="navbarNav">
                    <ul class="navbar-nav m-auto ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">beranda</a>
                        </li>
                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                kategory
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./hijab.php?category=pasminah&harga=all-p">Pasminah</a></li>
                                <li><a class="dropdown-item" href="./hijab.php?category=rabbani&harga=all-p">Rabbani</a></li>
                                <li><a class="dropdown-item" href="./hijab.php?category=bego&harga=all-p">Bego</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./registrasi.php">registrasi</a>
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
                    <li style="display: <?= ($is_login) ? 'block' : 'none' ?>;" ><a href="./profile.php" class="dropdown-item">profil</a></li>
                    <li style="display: <?= ($is_login) ? 'none' : 'block' ?>;"><a href="./login.php" class="dropdown-item">login</a></li>
                    <li style="display: <?= ($is_login) ? 'block' : 'none' ?>;" ><a href="../function/logout.php" class="dropdown-item" >logout</a></li>
                </ul>
            </div>
            <a href="./keranjang.php" class="ms-3">
                <i class="bi bi-cart cart-btn"></i>          
            </a>
        </div>
    </nav>

    <div class="container-fluid wrapper">

        <div class="row">
            <div class="col-9 left-side">

            <form action="../function/transaction.php" method="post">
                <div class="form-wrapper">
                    <div class="row gy-4">
                        <div class="col-12 form-detail d-flex ">
                            <i class="bi bi-cart2"></i>
                            <p class="my-auto ms-3" >keranjang</p>
                        </div>
                        <div class="col-12 ">
                            <div class="d-flex ps-4 py-2 form-header">
                                <p class="my-auto" >Detail</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="nama" class="form-label input-label">nama penerima</label>
                            <input type="text" class="form-control py-2 input-form " name="nama" id="nama">
                        </div>
                        <div class="col-6">
                            <label for="nomor" class="form-label input-label">nomor hp</label>
                            <input type="text" class="form-control py-2 input-form " name="nomor_hp" id="nomor">
                        </div>
                        <div class="col-12">
                            <label for="alamat" class="form-label input-label">alamat</label>
                            <input type="text" class="form-control py-2 input-form " name="alamat" id="alamat">
                        </div>
                        <div class="col-6">
                            <label for="pass_transaksi" class="form-label input-label">password transaksi</label>
                            <input type="password" class="form-control py-2 input-form " name="password_transaksi" id="pass_transaksi">
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label input-label text-white">password transaksi</label>
                            <button class="btn form-control form-button" >
                                Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            </div>
            <div class="col-3 right-side">
    
                <ul class="list-group mt-4">
                    <li class="list-group-item item-list order-header ">Orderan anda</li>
                    <li class="list-group-item item-list mb-3 "><hr class="dropdown-divider divider"></li>
                    <?php foreach($data as $item): ?>
                        <li class="list-group-item item-list mb-3 d-flex justify-content-between">
                            <div class="item-wrapper d-flex">
                                <div class="img-container" style="background-image: url('../img/hero.jpg');"></div>
                                <div class="detail ms-2">
                                    <p class="title"><?= $item['produk'] ?></p>
                                    <p class="kuantitas my-1 ">jumlah : <?= $item['kuantitas'] ?> item</p>
                                    <p class="harga">Rp <?= number_format($item['harga']) ?></p>
                                </div>
                            </div>
                            <a href="./keranjang.php?id=<?= $item['id_user'] ?>&produkId=<?= $item['id_produk'] ?>" class="bi bi-trash" style="color: gray; font-size: 1.3rem;"></a>
                        </li>
                        <li class="list-group-item item-list mb-3 "><hr class="dropdown-divider divider"></li>
                    <?php $total+= ($item['harga'] * $item['kuantitas'] ) ?>
                    <?php endforeach ?>
                    <li class="list-group-item item-list mb-3 d-flex justify-content-between">
                        <p class="price" >total harga : </p>
                        <p class="num"><?= number_format($total) ?></p> 
                    </li>
                </ul>

            </div>
        </div>

    </div>
    

    <script src="../js/bootstrap.min.js" ></script>
</body>
</html>