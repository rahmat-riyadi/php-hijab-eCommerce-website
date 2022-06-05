<?php

    session_start();

    require '../function/function.php';

    if(isset($_GET['logout'])){
        $_SESSION['isAdmin'] = false;
    }

    if(!$_SESSION['isAdmin']){
        header('Location: ./auth/index.php');
    }

    $user_data = query("SELECT * FROM user");

    if(isset($_POST['submit'])){

        $category = $_POST['category'];

        if($category == '0')
            $data = query("SELECT * FROM kategori JOIN hijab ON hijab.id_kategori = kategori.id");
        else
            $data = query("SELECT * FROM kategori JOIN hijab ON hijab.id_kategori = kategori.id WHERE id_kategori = $category");

    } else {
        $data = query("SELECT * FROM kategori JOIN hijab ON hijab.id_kategori = kategori.id");
    }


?>


<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="css/style.min.css" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
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
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false">
                                <i class="me-2 bi bi-filter-left"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                            <i class="me-2 bi bi-file-text"></i>
                                <span class="hide-menu">Penjualan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./users.php" aria-expanded="false">
                                <i class="me-2 bi bi-person-fill"></i>
                                <span class="hide-menu">Users</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./index.php?logout=1" aria-expanded="false">
                                <i class="me-2 bi bi-box-arrow-left"></i>
                                <span class="hide-menu">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Jumlah Produk</h4>
                                <div class="text-start">
                                    <h2 class="font-light mb-0"><?= count($data) ?></h2>
                                    <span class="text-muted">jumlah item</span>
                                </div>
                                <div class="row text-end">
                                    <div class="col  ">
                                        <a href="" class="btn btn-primary" style="visibility: hidden;">
                                            detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Jumlah Akun Terdaftar</h4>
                                <div class="text-start">
                                    <h2 class="font-light mb-0"><?= count($user_data) ?></h2>
                                    <span class="text-muted">jumlah pengguna</span>
                                </div>
                                <div class="row text-end">
                                    <div class="col">
                                        <a href="" class="btn btn-primary">
                                            detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex">
                                    <h4 class="card-title col-md-10 mb-md-0 mb-3 align-self-center">Daftar Produk</h4>
                                    <div class="col-md-2 ms-auto ">
                                        <form action="" method="post">
                                            <div class="input-group">
                                                <select class="form-select" name="category" >
                                                    <option value="0" class="all" >semua</option>
                                                    <option value="1" class="pasminah" >Pasminah</option>
                                                    <option value="2" class="rabbani" >Rabbani</option>
                                                    <option value="3" class="bego">Bego'</option>
                                                </select>
                                                <button class="btn btn-outline-primary" type="submit" name="submit" >Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive mt-5">
                                    <table class="table stylish-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0" colspan="2">produk</th>
                                                <th class="border-top-0">harga</th>
                                                <th class="border-top-0">aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data as $item): ?>
                                            <?php $product_picture =  (!is_null($item['gambar'])) ? '../assets/product/'. $item['gambar'] : 'https://via.placeholder.com/140?text=tidak+ada+foto'; ?>
                                            <tr>
                                                <td>
                                                    <div class="round" style="background-image: url('<?= $product_picture ?>'); background-size: cover; background-position: center;"></div>
                                                </td>
                                                <td class="align-middle">
                                                    <h6><?= $item['produk'] ?></h6>
                                                    <small class="text-muted">kategori : <?= $item['kategori'] ?></small>
                                                </td>
                                                <td class="align-middle">Rp <?= number_format($item['harga']) ?></td>
                                                <td class="align-middle">
                                                    <a href="./product-detail.php?id=<?= $item['id'] ?>" class="btn btn-success">
                                                        detail
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach?>
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    <a href="./tambah_produk.php" class="btn btn-primary">
                                                        tambah produk
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>


        var category_id = '<?= $category ?>'
        var category
        
        switch (category_id) {
            case '0':
                category = "all"
                break;
            case '1':
                category = "pasminah"
                break;
            case '2':
                category = "rabbani"
                break;
            case '3':
                category = "bego"
                break;
        }

        console.log(category)

        var opt = document.querySelector(`option.${category}`)
        console.log(opt)
        opt.setAttribute('selected', 'selected')

    </script>
</body>

</html>