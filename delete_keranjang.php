<?php  
session_start();

$id = $_GET['id'];

unset($_SESSION['chart'][$id]);

echo "<script> 
		alert('Barang anda telah di hapus dari keranjang');
		location.replace('keranjang.php');
	</script>";


?>