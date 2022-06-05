<?php 

    require '../function/function.php';

    session_start();

    if(!empty($_SESSION['user'])){
        header('Location: ./hijab.php?category=all-c&harga=all-p');
        die;
    }

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $pass = $_POST['password'];

        $data = query("SELECT * FROM `user` WHERE username = '$username'");

        if(count($data) == 1 ){

            if($data[0]['password'] == $pass){

                $_SESSION['user']= [
                    'id' => $data[0]['id'],
                    'nama' => $data[0]['nama'],
                    'gambar' => $data[0]['gambar'],
                    'email' => $data[0]['email'],
                    'username' => $data[0]['username'],
                    'password' => $data[0]['password'],
                    'password_transaksi' => $data[0]['password_transaksi'],
                ];

                $_SESSION['first_login'] = true;
                header('Location: ./hijab.php?category=all-c&harga=all-p');

            } else {
                echo "
                    <script>
                        alert('login gagal')
                        window.location.href = './login.php'
                    </script>
                ";
            }

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
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style/style.css">
    <link rel="stylesheet" href="../css/style/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>login</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light login">
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
                            <a class="nav-link" href="#">registrasi</a>
                        </li>
                    </ul>
                </div>
            <div class="dropdown dropstart">
                <button 
                    class="avatar dropdown-toggle" 
                    id="user-menu" 
                    type="button" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false"
                    style="background-image: url('./img/hero.jpg');"                
                ></button>
                <ul class="dropdown-menu" aria-labelledby="user-menu">
                    <li><a href="./profile.php" class="dropdown-item hijab">profil</a></li>
                    <li><a href="" class="dropdown-item hijab">login</a></li>
                    <li><a href="" class="dropdown-item hijab">logout</a></li>
                </ul>
            </div>
            <a href="" class="ms-3 login">
                <i class="bi bi-cart cart-btn login"></i>          
            </a>
        </div>
    </nav>

    <div class="container-fluid wrapper">

        <div class="row">
            <div class="col-6 left-side d-flex ms-4 px-5">
                <div class="form-container px-4 py-4 pb-5">
                    <div class="header-wrapper mb-4 d-flex-row">
                        <p class="header">Masuk</p>
                        <div class="form-divider my-2"></div>
                        <p class="title">silahkan masuk agar anda dapat membeli produk kami</p>
                    </div>
                    <form action="" method="post">
                        <div class="mb-4">
                            <label for="username" class="form-label label">username</label>
                            <input type="text" class="form-control form-input"  name="username" id="username" autocomplete="off">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label label">password</label>
                            <input type="text" class="form-control form-input" name="password" id="password" autocomplete="off">
                        </div>
                        <div class="btn-submit-group d-flex ">
                            <button type="submit" class="btn btn-submit px-3" name="login">
                                masuk
                            </button>
                            <p class="note my-auto ms-3">belum punya akun ? ayo <span><a href="./registrasi.php">daftar</a></span></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
    <script src="../js/bootstrap.min.js" ></script>

</body>
</html>