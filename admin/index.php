<?php
include '../koneksi.php';
session_start();
//data user
$user = "SELECT * FROM users";
$result1 = mysqli_query($conn, $user);
$data = mysqli_num_rows($result1);

//data kategori
$kategori = "SELECT * FROM kategori";
$result2 = mysqli_query($conn, $kategori);
$data1 = mysqli_num_rows($result2);

//data produk
$produk = "SELECT * FROM produk";
$result3 = mysqli_query($conn, $produk);
$data2 = mysqli_num_rows($result3);


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-5" style="background: blue;">
        <div class="container">
            <a class="navbar-brand" href="../index.php">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Kelola
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="create_produk.php">Create Produk</a>
                        <a class="dropdown-item" href="../kategori/read_kategori.php">Kategori</a>
                        <a class="dropdown-item" href="read_keranjang.php">Kategori</a>
                    </div>
                </li>
                </ul>
                <a href="logout.php"><button type="submit" class="btn btn-danger" name="Hapus">logout</button></a>
            </div>
        </div>
    </nav>
    <!-- tutup navabar -->
    <!-- content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-user fa-5x"></i>
                            </div>
                            <div class="col-6">
                                <h3 class="card-title">Users</h3>
                                <p class="card-text"><?= $data ?> User</p>
                                <a href="users/read_users.php" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-align-justify fa-5x"></i>
                            </div>
                            <div class="col-6">
                                <h3 class="card-title">Kategori</h3>
                                <p class="card-text"><?= $data1 ?> Kategori</p>
                                <a href="kategori/read_kategori.php" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                         <div class="row">
                            <div class="col-6">
                                <i class="fas fa-shopping-bag fa-5x"></i>
                            </div>
                            <div class="col-6">
                                <h3 class="card-title">Produk</h3>
                                <p class="card-text"><?= $data2 ?> Produk</p>
                                <a href="produk/read_produk.php" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Selamat Datang <b><?= $_SESSION['username'] ?></b></h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    Anda masuk sebagai <strong><?php echo $_SESSION['username'] ?></strong>
									<br>
									<p>Pada halaman admin, Anda dapat menambah kategori produk, mengelola produk, 
									mengelola user dan admin, melihat konfirmasi pembayaran</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>