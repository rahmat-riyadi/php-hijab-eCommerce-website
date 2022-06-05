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
                                <li><a class="dropdown-item" href="./pages/hijab.php?category=pasminah&harga=all-p">Pasminah</a></li>
                                <li><a class="dropdown-item" href="./pages/hijab.php?category=rabbani&harga=all-p">Rabbani</a></li>
                                <li><a class="dropdown-item" href="./pages/hijab.php?category=bego&harga=all-p">Bego</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">registrasi</a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>

    <div class="container-fluid wrapper">

        <div class="row justify-content-end">
            <div class="col-6 left-side d-flex ms-4 px-5">
                <div class="form-container px-4 py-4 pb-5">
                    <div class="header-wrapper mb-4 d-flex-row">
                        <p class="header">Daftar</p>
                        <div class="form-divider my-2"></div>
                    </div>
                    <form action="../function/registrasi.php" method="post">
                        <div class="mb-4">
                            <label for="nama" class="form-label label">nama</label>
                            <input type="text" class="form-control form-input"  name="nama" id="nama" autocomplete="off">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label label">email</label>
                            <input type="text" class="form-control form-input" name="email" id="email" autocomplete="off">
                        </div>
                        <div class="mb-4">
                            <label for="username" class="form-label label">username</label>
                            <input type="text" class="form-control form-input" name="username" id="username" autocomplete="off">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label label">password</label>
                            <input type="text" class="form-control form-input" name="password" id="password" autocomplete="off">
                        </div>
                        <div class="mb-4">
                            <label for="password transaksi" class="form-label label">password transaksi</label>
                            <input type="text" class="form-control form-input" name="password_transaksi" id="password transaksi" autocomplete="off">
                        </div>
                        <div class="btn-submit-group d-flex ">
                            <button class="btn btn-submit px-3">
                                daftar
                            </button>
                            <p class="note my-auto ms-3">suah punya akun ? ayo <span><a href="./login.php">masuk</a></span></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
    <script src="../js/bootstrap.min.js" ></script>
</body>
</html>