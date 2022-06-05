<?php 

    session_start();

    if(empty($_SESSION['user']))
        header('Location: ./hijab.php?category=all-c&harga=all-p');
    
    $user = $_SESSION['user'];

    $profile_picture =  ( !is_null($user['gambar'])) ? '../assets/users/'. $user['gambar'] : 'https://via.placeholder.com/140?text=tidak+ada+foto';

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
    <link rel="stylesheet" href="../css/style/profile.css">
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
                    style="background-image: url('<?= $profile_picture ?>');"
                    ></button>
                <ul class="dropdown-menu" aria-labelledby="user-menu">
                    <li style="display: <?= ($is_login) ? 'block' : 'none' ?>;"><a href="" class="dropdown-item">profil</a></li>
                    <li style="display: <?= ($is_login) ? 'none' : 'block' ?>;"><a href="./login.php" class="dropdown-item">login</a></li>
                    <li style="display: <?= ($is_login) ? 'block' : 'none' ?>;"><a href="../function/logout.php" class="dropdown-item">logout</a></li>
                </ul>
            </div>
            <a href="./keranjang.php" class="ms-3">
                <i class="bi bi-cart cart-btn"></i>
            </a>
        </div>
    </nav>


    <div class="container pt-3">
        <div class="row flex-lg-nowrap">
            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <form action="../function/update_profile.php" method="post" enctype="multipart/form-data" >
                            <div class="card">
                                <div class="card-body">
                                    <div class="e-profile">
                                        <div class="row">
                                            <div class="col-12 col-sm-auto mb-3">
                                                <div class="mx-auto" style="width: 140px;">
                                                    <div class="d-flex justify-content-center align-items-center rounded" 
                                                        style="height: 140px; background-color: rgb(233, 236, 239); background-image: url('<?= $profile_picture ?>'); background-size: cover; background-position: center;">
                                                    </div>
                                                    <i class="fa fa-fw fa-camera"></i>
                                                </div>
                                            </div>
                                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                <div class="text-sm-left mb-2 mb-sm-0">
                                                    <h4 class="pt-sm-2 mt-3 pb-1 mb-0 text-nowrap"><?= $user['nama'] ?></h4>
                                                    <div class="mt-2">
                                                        <input type="file" name="gambar" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                        </ul>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active">
                                                    <input class="form-control" type="hidden" name="id" value="<?= $user['id']?>" >
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input class="form-control" type="text" name="nama" value="<?= $user['nama']?>" >
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Username</label>
                                                                        <input class="form-control" type="text" name="username" value="<?= $user['username']?>" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input class="form-control" type="text" name="email" value="<?= $user['email']?>" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-12 mb-3">
                                                            <div class="mb-2"><b>Ganti Password</b></div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Password Akun</label>
                                                                        <input class="form-control pass-form" name="password" type="text" value="<?= $user['password'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Password Transaksi</label>
                                                                        <input class="form-control" type="text" name="password_transaksi" value="<?= $user['password_transaksi']?>" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-primary" type="submit" name="submit">Simpan Perubahan</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="px-xl-3">
                                    <form action="../function/logout.php" method="get">
                                            <button class="btn btn-block btn-secondary" href="../function/logout.php" >
                                            <i class="bi bi-box-arrow-in-left"></i>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="../js/bootstrap.min.js"></script>
</body>

</html>