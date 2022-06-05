<?php 

    require '../function/function.php';

    session_start();

    $data = query("SELECT * FROM hijab WHERE id = $_GET[id]");

    $is_login;

    if(empty($_SESSION['user'])){
        $is_login = false;
    } else {
        $profile_picture =  ( !is_null($_SESSION['user']['gambar'])) ? '../assets/users/'. $_SESSION['user']['gambar'] : 'https://via.placeholder.com/140?text=tidak+ada+foto';
        $is_login = true;
    }

    if(isset($_POST['submit'])){
        if(addItem($_POST['id'], $_SESSION['user']['id'], $_POST['kuantitas'] ?? 1) > 0){
            header('Location: ./detail.php?id=' . $_GET['id']);
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
    <link rel="stylesheet" href="../css/style/detail.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Document</title>
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
                                <li><a class="dropdown-item" href="./hijab.php?category=all-c&harga=all-p">semua</a></li>
                                <li><a class="dropdown-item" href="./hijab.php?category=pasminah&harga=all-p">Pasminah</a></li>
                                <li><a class="dropdown-item" href="./hijab.php?category=rabbani&harga=all-p">Rabbani</a></li>
                                <li><a class="dropdown-item" href="./hijab.php?category=bego&harga=all-p">Bego</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">registrasi</a>
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
                    <li style="display: <?= ($is_login) ? 'block' : 'none' ?>;" ><a href="" class="dropdown-item">profil</a></li>
                    <li style="display: <?= ($is_login) ? 'none' : 'block' ?>;"><a href="./login.php" class="dropdown-item">login</a></li>
                    <li style="display: <?= ($is_login) ? 'block' : 'none' ?>;" ><a href="../function/logout.php" class="dropdown-item" >logout</a></li>
                </ul>
            </div>
            <a href="./keranjang.php" class="ms-3">
                <i class="bi bi-cart cart-btn"></i>          
            </a>
        </div>
    </nav>

    <div class="container mt-5 py-3">

        <div class="row ">
            <div class="col-3 d-flex justify-content-center">
                <div class="img-container" style="background-image: url('../img/hero.jpg');">
                    
                </div>
            </div>
            <div class="col-1 d-flex justify-content-center">
                <div class="divider"></div>
            </div>
            <div class="col-6 ps-3">
                <h3 class="title"><?= $data[0]['produk'] ?></h3>
                <p class="price mt-3">Rp <?= number_format($data[0]['harga']) ?></p>
                <p class="desc"><?= $data[0]['desk_produk'] ?></p>
                
                <div class="btn-container d-flex my-4">
                    <a class="button cart">tambah keranjang</a>
                </div>
                
                <p class="desc">
                    perhatian*
                    <br/>
                    anda tidak bisa melakukan pembelian jika anda belum login
                </p>
                
            </div>
        </div>

    </div>

    <div class="modal fade" id="quantityModal" tabindex="-1" aria-labelledby="quantityModalLabelled" aria-hidden="true">
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quantityModalLabelled">Masukan Jumlah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="number" name="kuantitas" id="" placeholder="masukan angka" class="quantity-input" min="1" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">batal</button>
                    <button type="buttin" class="btn btn-primary" name="submit">submit</button>
                </div>
                </div>
            </div>
        </form>
    </div>
    

    <script src="../js/bootstrap.min.js" ></script>
    <script>

        var modal = new bootstrap.Modal(document.getElementById('quantityModal'))
        document.querySelector('a.button.cart').addEventListener('click', (e) => {
            e.preventDefault()
            modal.show(modal)
            console.log(e)
        })

        console.log(c)

    </script>
</body>
</html>