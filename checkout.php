<?php  
session_start();
include 'koneksi.php';
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>SepatuKu - Product Detail</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/flex-slider.css">
<!--
Tooplate 2114 Pixie
https://www.tooplate.com/view/2114-pixie
-->
  </head>

  <body>
    
    <!-- Pre Header -->
    <div id="pre-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span>Suspendisse laoreet magna vel diam lobortis imperdiet</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top mb-5">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/images/header-logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="produk.php">Products
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    
    <!-- tabel keranjang  -->
    <div class="container">
        <div class="card mx-auto">
            <div class="card-header text-white bg-secondary">
                Keranjang Belanja
            </div>
            <div class="card-body">
                <table class="table" style="color: black;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Subharga</th>
                        </tr>
                    </thead>
                    <?php $no = 1; ?>
                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION['chart'] as $id => $jumlah): ?>
                    	<!-- yang akan di ulang ulang -->
                    <?php  
                    	include 'koneksi.php';

                    	$query = mysqli_query($conn, "SELECT * FROM produk WHERE id = '$id'");
                    	$data = mysqli_fetch_array($query);
                    	$subharga = $data['harga'] * $jumlah;
                    ?>
                    <tbody>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <th scope="row"><?= $data['nama'] ?></th>
                                <th scope="row"><?= number_format($data['harga']) ?></th>
                                <th scope="row"><?= $jumlah ?></th>
                                <th scope="row"><?= number_format($subharga); ?></th>
                            </tr>
                    </tbody>
                    <?php $no++; ?>
                    <?php $total += $subharga ?>
                	  <?php endforeach?>
                    <tfoot>
                      <th scope="col" colspan="4">Total Belanja</th>
                      <th scope="row">Rp. <?= number_format($total) ?></th>
                    </tfoot>
                </table>
                <form method="post">
                  <div class="row">
                  	<div class="col-md-3">
                     <input type="text" readonly value="<?= $_SESSION['nama'] ?>" class="form-control"> 
                    </div>
                    <div class="col-md-3">
                     <input type="text" readonly value="<?= $_SESSION['email'] ?>" class="form-control"> 
                    </div>
                    <div class="col-md-3">
                     <select class="form-control" name="jenis_transaksi">
                       <option value="0">-pilih jenis transaksi-</option>
                       <option value="COD">COD</option>
                       <option value="BCA">BCA</option>
                       <option value="Alfamart">Alfamart</option>
                     </select>
                    </div>
                    <div class="col-md-3">
                     <select class="form-control" name="id_ongkir">
                       <option value="">-pilih ongkos kirim-</option>
                       <?php 

                        $query = mysqli_query($conn, "SELECT * FROM ongkir");

                        while($data = mysqli_fetch_array($query)){
                       ?>
                       <option value="<?= $data['id_ongkir'] ?>">
                         <?= $data['nama_kota'] ?> -
                         Rp. <?= number_format($data['tarif']) ?>
                       </option>
                       <?php } ?>
                     </select>
                    </div>
                  </div>
              </div>
              <a href="checkout.php"><button type="submit" name="checkout" class="btn btn-primary mb-4 ml-5">Checkout</button></a>
            </form>

            <?php 
              if (isset($_POST['checkout'])) {
                $id_pelanggan = $_SESSION['id'];
                $id_ongkir = $_POST['id_ongkir'];
                $date = date("Y-m-d");

                $query = mysqli_query($conn, "SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
                $data = mysqli_fetch_assoc($query);
                $tarif = $data['tarif'];

                $total_pembelian = $total + $tarif;


                // menyimpan ke tabel pembelian 
                $sql = mysqli_query($conn, "INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian) VALUES ('$id_pelanggan', '$id_ongkir', '$date', '$total_pembelian')");

                // mendapatkan id_pembelian barusan terjadi
                $id_pembelian_barusan = $conn->insert_id;

                foreach ($_SESSION['chart'] as $id_produk => $jumlah) {
                  $tambah = mysqli_query($conn, "INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah) VALUES ('$id_pembelian_barusan', '$id_produk', '$jumlah')");
                }


                // mengkosongkan keranjang
                unset($_SESSION['chart']);

                echo "<script> 
                        alert('pembelian sukses!');
                        location.replace('nota.php?id=$id_pembelian_barusan');
                      </script>";
              }


            ?> 
        </div>
    </div>    
    <!-- tutup keranjang  -->

    

    
    <!-- Footer Starts Here -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="logo">
              <img src="assets/images/header-logo.png" alt="">
            </div>
          </div>
          <div class="col-md-12">
            <div class="footer-menu">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">How It Works ?</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="social-icons">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Ends Here -->


    <!-- Sub Footer Starts Here -->
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
              <p>Copyright &copy; 2019 Company Name 
                
                - Design: <a rel="nofollow" href="https://www.facebook.com/tooplate">Tooplate</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sub Footer Ends Here -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/flex-slider.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>s