<?php 

    require '../function/function.php';

    session_start();

    $is_login;

    if(empty($_SESSION['user'])){
        $is_login = false;
    } else {
        $is_login = true;
        $profile_picture =  ( !is_null($_SESSION['user']['gambar'])) ? '../assets/users/'. $_SESSION['user']['gambar'] : 'https://via.placeholder.com/140?text=tidak+ada+foto';
    }


    $categori = $_GET['category'];
    $harga = $_GET['harga'];

    if($_GET['category'] == 'pasminah'){
        $categori = 1;
    } 

    if($_GET['category'] == 'rabbani'){
        $categori = 2;
    } 

    if($_GET['category'] == 'bego'){
        $categori = 3;
    } 

    if($_GET['harga'] == 'under-50'){
        $harga = 50000;
    } 

    if($_GET['harga'] == 'under-100'){
        $harga = 100000;
    } 

    if( ($categori == 'all-c') && ($harga == 'all-p') ){
        $data = query("SELECT * FROM kategori JOIN hijab ON hijab.id_kategori = kategori.id");
    } else if( ($categori == 'all-c') && ($harga != 'all-p') ) {

        if($harga == 'above-100')
            $data = query("SELECT * FROM kategori JOIN hijab ON hijab.id_kategori = kategori.id WHERE harga >= 100000 ");
        else
            $data = query("SELECT * FROM kategori JOIN hijab ON hijab.id_kategori = kategori.id WHERE harga <= $harga ");

    } else if( ($categori != 'all-c') && ($harga == 'all-p') ) {
        $data = query("SELECT * FROM kategori JOIN hijab ON hijab.id_kategori = kategori.id WHERE id_kategori = $categori ");
    } else {

        if($harga == 'above-100')
            $data = query("SELECT * FROM kategori JOIN hijab ON hijab.id_kategori = kategori.id WHERE id_kategori = $categori AND harga >= 100000");
        else
            $data = query("SELECT * FROM kategori JOIN hijab ON hijab.id_kategori = kategori.id WHERE id_kategori = $categori AND harga <= $harga");

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
    <link rel="stylesheet" href="../css/style/hijab.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>hijabku.com</title>
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
                    class="avatar" 
                    id="user-menu" 
                    type="button" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false"
                    style="background-image: url('<?= $profile_picture ?>'); backround-size: cover;"
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-2 side-bar pt-4">
                <form action="http://localhost/hijab-procedural/pages/hijab.php" method="get">

                    <ul class="list-group mx-2">
                        <li class="list-group-item list mb-3 d-flex align-items-center category-header">
                            <i class="bi bi-filter-left icon"></i>
                            category
                        </li>
                        <li class="list-group-item list mb-3">
                            <input class="form-check-input me-2 radio" id="all-c" name="category" type="radio" value="all-c" >
                            <label class="radio" for="all-c">semua</label>
                        </li>
                        <li class="list-group-item list mb-3">
                            <input class="form-check-input me-2 radio" id="pasminah" name="category" type="radio" value="pasminah"  >
                            <label class="radio" for="pasminah">pasminah</label>
                        </li>
                        <li class="list-group-item list mb-3">
                            <input class="form-check-input me-2 radio" id="rabbani" name="category" type="radio" value="rabbani" >
                            <label class="radio" for="rabbani">rabbani</label>
                        </li>
                        <li class="list-group-item list mb-3">
                            <input class="form-check-input me-2 radio" id="bego" name="category" type="radio" value="bego" >
                            <label class="radio" for="bego">bego'</label>
                        </li>
                        <li class="list-group-item list mb-3" ><hr class="dropdown-divider"></li>
                        <li class="list-group-item list mb-3">
                            <input class="form-check-input me-2 radio" id="all-p" name="harga" type="radio" value="all-p" >
                            <label class="radio" for="all-p">semua harga</label>
                        </li>
                        <li class="list-group-item list mb-3">
                            <input class="form-check-input me-2 radio" id="under-50" name="harga" type="radio" value="under-50" >
                            <label class="radio" for="under-50">0 < 50,000</label>
                        </li>
                        <li class="list-group-item list mb-3">
                            <input class="form-check-input me-2 radio" id="under-100" name="harga" type="radio" value="under-100" >
                            <label class="radio" for="under-100">< 100,000</label>
                        </li>
                        <li class="list-group-item list mb-3">
                            <input class="form-check-input me-2 radio" id="above-100" name="harga" type="radio" value="above-100" >
                            <label class="radio" for="above-100">>100,000</label>
                        </li>
                        <li class="list-group-item list mb-3" ><hr class="dropdown-divider"></li>
                        <li class="list-group-item list mb-3">
                            <button class="btn-filter" type="submit">
                                terapkan filter
                            </button>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="col-10 menu">
                <div class="container-fluid pt-5">
                    <div class="row gy-5">
                    <?php foreach($data as $item): ?>
                        <div class="col-md-3 col-6 col-sm-4 d-flex">
                            <form action="">
                                <div class="card item-card m-auto" style="width: 18rem;">
                                    <div class="card-body">
                                        <img src="../assets/product/<?= $item['gambar'] ?>" height="155" style="object-fit: cover; object-position: center;" class="card-img-top" alt="...">
                                        <h5 class="card-title card-home-title mt-3"><?= $item['produk'] ?></h5>
                                        <p class="card-text "><?= $item['kategori'] ?></p>
                                        <p class="card-text card-home-text">Rp <?= number_format($item['harga']) ?>,00</p>
                                    </div>
                                    <div class="card-footer mt-2 item-card d-flex">
                                        <a href="./detail.php?id=<?= $item['id'] ?>" class="btn-detail d-flex justify-content-center align-items-center flex-grow-1">
                                            detail
                                        </a>
                                        <a href="../function/add_item.php?id=<?= $item['id'] ?>" class="btn d-flex justify-content-center align-items-center flex-grow-2" >
                                            <i class="bi bi-cart2 cart-btn"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="welcomeModalLabel">Login Berhasil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>selamat datang <?= $_SESSION['user']['nama'] ?> </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">ok</button>
            </div>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.min.js" ></script>
    <script>

        var modal = new bootstrap.Modal(document.getElementById('welcomeModal'))
        if(<?php echo $_SESSION['first_login'] ?>)
            modal.show(modal)

        <?php unset($_SESSION['first_login']) ?>

    </script>
    <script>

        var category = '<?php echo $_GET['category'] ?>'                        
        var price = '<?php echo $_GET['harga'] ?>'                        
        var c = document.querySelector(`input#${category}`)
        var p = document.querySelector(`input#${price}`)
        c.setAttribute('checked', 'checked')
        p.setAttribute('checked', 'checked')
        
    </script>
</body>
</html>