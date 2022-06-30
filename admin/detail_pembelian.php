<?php

require '../function/function.php';

    $tanggal_pembelian = $_GET['tgl'];

    $data = query(" SELECT * FROM pembelian 
        JOIN user 
        ON user.id = pembelian.user_id
        JOIN hijab
        ON hijab.id = pembelian.produk_id
        WHERE tanggal_pembelian = '$tanggal_pembelian'
    ");

    $total = 0;

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
        <div class="page-wrapper p-5 ">
            <div class="container-fluid bg-white shadow rounded-5">

                <a href="./pembelian.php" class="btn btn-primary mb-3 ">kembali</a>

                <div class="alert alert-primary d-flex justify-content-between " role="alert">
                    <b class="my-auto" >Nama pembeli:  <?= $data[0]['nama'] ?></b>
                    <a href="" class="btn btn-danger text-white">
                        <i class="bi bi-trash"></i>
                    </a>
                </div>

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">produk</th>
                            <th scope="col">jumlah</th>
                            <th scope="col">harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $i => $pembelian) : ?>
                            <tr>
                                <th scope="row"><?= $i + 1 ?></th>
                                <td><?= $pembelian['produk'] ?></td>
                                <td><?= $pembelian['kuantitas'] ?></td>
                                <td>Rp. <?= number_format($pembelian['harga']) ?></td>
                            </tr>
                        <?php $total += ($pembelian['harga'] * $pembelian['kuantitas']) ?>
                        <?php endforeach ?>
                        <tr class="bg-secondary text-white" >
                            <td colspan="3" > <b>total harga</b></td>
                            <td><b> Rp. <?= number_format($total) ?> </b> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>