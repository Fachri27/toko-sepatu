<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Hello, world!</title>
    <style>
        .mx-auto{
            width: 800px;
        }
    </style>
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
                        <a class="dropdown-item" href="../kategori/read_kategori.php">Kategori</a>
                        <a class="dropdown-item" href="read_produk.php">Produk</a>
                    </div>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- tutup navabar -->
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Tambah Data
            </div>
            <div class="card-body">
                <form action="act_create.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Kategori</label>
                        <select name="kategori" id="" class="form-control">
                            <option value="0">-pilih kategori-</option>
                            <?php 
                            include '../../koneksi.php';
                            $query = "SELECT * FROM kategori";
                            $result= mysqli_query($conn, $query);
                            while($data = mysqli_fetch_array($result)){
                            ?>
                            <option value="<?= $data['id'] ?>"><?= $data['nama_kategori'] ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="harga">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="" name="gambar">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Detail</label>
                        <textarea name="detail" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Stok :</label><br>
                        <input type="radio" class="" id="exampleFormControlInput1" placeholder="" name="stok" value="tersedia">Tersedia
                        <input type="radio" class="" id="exampleFormControlInput1" placeholder="" name="stok" value="habis">Habis
                    </div><br><br>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="simpan">Save</button>
                    </div>
                </form>
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