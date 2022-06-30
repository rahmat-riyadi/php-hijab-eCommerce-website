<?php

    require '../function/function.php';

    session_start();

    if(isset($_GET['deleteId'])){

        $id = $_GET['deleteId'];
        mysqli_query($db, "DELETE FROM hijab WHERE id = $id");
        header('Location: ./index.php');

    }

    $id = $_GET['id'];

    $data = query("SELECT * FROM kategori JOIN hijab ON hijab.id_kategori = kategori.id WHERE hijab.id = '$id'");

    $data = $data[0];

    $_SESSION['gambar_tmp'] = $data['gambar'];

    $product_picture =  (!is_null($data['gambar'])) ? '../assets/product/'. $data['gambar'] : 'https://via.placeholder.com/140?text=tidak+ada+foto';

?>


<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="../assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link waves-dark" href="" id="navbarDropdown">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./index.php" aria-expanded="false"><i class="me-2 bi bi-filter-left"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item">
                            <a href="./penjualan.php" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                                <i class="me-2 bi bi-file-text"></i>
                                <span class="hide-menu">Penjualan</span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="" aria-expanded="false">
                                <i class="me-2 bi bi-person-fill"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <main>

                    <form action="../function/update_item.php" method="post" enctype="multipart/form-data">  

                        <input type="hidden" name="id" value="<?= $data['id'] ?>" >

                        <div class="py-2 mb-3">
                            <img class="mb-4 rounded" src="<?= $product_picture ?>" alt="" width="300">
                            <input type="file" name="gambar" id="" class="d-block">
                        </div>

                        
    
                        <div class="row g-5">
                            <div class="col-md-7 col-lg-8">
                                <h4 class="mb-3">Info Produk</h4>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="address" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" name="produk" value="<?= $data['produk'] ?>" >
                                    </div>
                                    <div class="col-6">
                                        <label for="address" class="form-label">Harga</label>
                                        <input type="text" class="form-control" name="harga" value="<?= $data['harga'] ?>" >
                                    </div>
                                    <div class="col-6">
                                        <label for="address" class="form-label">kategori</label>
                                        <input type="number" class="form-control" name="id_kategori" value="<?= $data['id_kategori'] ?>" min="1" max="3" >
                                    </div>
                                    <div class="col-12">
                                        <label for="floatingTextarea2">Deskripsi</label>
                                        <textarea class="form-control" name="desk_produk" id="floatingTextarea2" style="height: 270px">
                                            <?= $data['desk_produk'] ?>
                                        </textarea>
                                    </div>
                                </div>
    
                                <hr class="my-4">
    
                                <a href="./product-detail.php?deleteId=<?= $id ?>" class="w-100 btn btn-danger mb-2 btn-lg text-white">hapus produk</a>
                                <button class="w-100 btn btn-primary btn-lg" type="submit">submit</button>
                            </div>
                        </div>

                    </form>
                </main>

            </div>
        </div>
    </div>

    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>