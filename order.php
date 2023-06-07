<?php  
session_start();

$id = $_GET['id'];


//jika produk sudah ada di keranjang makan ditambah 1
if (isset($_SESSION['chart'][$id])) {
	$_SESSION['chart'][$id] += 1;
}
//jika blm ada di keranjang 
else{
	$_SESSION['chart'][$id] = 1;
}


// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// larikan ke halaman keranjang 
echo "<script> 
		alert('Barang anda sudah masuk ke keranjang');
		location.replace('keranjang.php');
	</script>";

?>