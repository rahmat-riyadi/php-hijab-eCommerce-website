<?php

require '../function/function.php';

$data = query("SELECT * FROM user");

if (isset($_GET['deleteId'])) {

    $id = $_GET['deleteId'];
    mysqli_query($db, "DELETE FROM user WHERE id = $id");
    header('Location: ./users.php');
}

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./index.php" aria-expanded="false">
                                <i class="me-2 bi bi-filter-left"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./users.php" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                            <i class="me-2 bi bi-file-text"></i>
                                <span class="hide-menu">Penjualan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./users.php" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
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
        <div class="page-wrapper p-5">
            <div class="container-fluid bg-white shadow rounded-5 p-0">
                <div class="container-fluid">
                    <div class="card">
                        <form action="../function/add_new_item.php" method="post" enctype="multipart/form-data">
                            <div class="card-body row justify-content-center">
                                <div class="card-header bg-primary text-white text-bold fs-4 col-8 ">
                                    tambah produk
                                </div>
                                <div class=" row gy-2 col-8">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>nama produk</label>
                                            <input class="form-control" type="text" name="produk">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>harga</label>
                                            <input class="form-control" type="text" name="harga" type="number">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_kategori" id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">pasminah</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_kategori" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">rabbani</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_kategori" id="inlineRadio3" value="3" >
                                            <label class="form-check-label" for="inlineRadio3">bego</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <input type="file" name="gambar" id="">
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="floatingTextarea2">deskripsi</label>
                                            <textarea class="form-control" name="desk_produk"  id="floatingTextarea2" style="height: 200px;">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary">tambah produk</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>