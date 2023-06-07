<?php  

session_start();
include 'koneksi.php';

?>
<!DOCTYPE html>
<html>
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

	<title>Nota Pembelian</title>
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

    <!-- detail pembelian -->
    <div class="container">
    	<h2 class="mb-5">Detail Pembelian</h2>
	    <?php  
	    	$query = mysqli_query($conn, "SELECT * FROM pembelian JOIN users ON pembelian.id_pelanggan=users.id WHERE id_pembelian = '$_GET[id]'");
	    	$data = mysqli_fetch_assoc($query);
	    ?>
	    <div class="container">
	    	<div class="row">
		    	<div class="col-md-4">
		    		<strong><?= $data['nama'] ?></strong><br>
				    <p>
				    	<?= $data['username'] ?><br>
				    	<?= $data['email'] ?>
				    </p>
				    <br>
				    <p>
				    	Tanggal : <?= $data['tanggal_pembelian'] ?><br>
				    	Total <?= $data['total_pembelian'] ?>
				    </p>
				</div>
				<div class="col-md-8">
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
			                            <th scope="col">Subtotal</th>
			                        </tr>
			                    </thead>
			                    <?php $total = 0; ?>
			                    <?php  
			                    	$ambil = mysqli_query($conn, "SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id WHERE pembelian_produk.id_pembelian = '$_GET[id]'");
			                    	
			                    	$no = 1;
			                    	while($tampil = mysqli_fetch_assoc($ambil)){
			                    ?>
			                    <tbody>
		                    	    <tr>
		                                <th scope="row"><?= $no; ?></th>
		                                <th scope="row"><?= $tampil['nama'] ?></th>
		                                <th scope="row"><?= number_format($tampil['harga']) ?></th>
		                                <th scope="row"><?= $tampil['jumlah'] ?></th>
		                                <th scope="row"><?= number_format($tampil['harga']*$tampil['jumlah']); ?></th>
		                            </tr>
			                    </tbody>
			                    <?php $total += $tampil['harga'] ?>
			        			<?php $no++; } ?>
			        			<tfoot>
			                      <th scope="col" colspan="4">Total Belanja</th>
			                      <th scope="row">Rp. <?= number_format($total) ?></th>
			                    </tfoot>
			                </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	<
	    

    
</body>
</html>