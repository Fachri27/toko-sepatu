<?php 
include '../../koneksi.php';

$kategori   = $_GET['kategori'];

$cekdata    = "SELECT nama FROM kategori WHERE nama='$kategori'";
$ada        = mysqli_query($conn, $cekdata);

if(mysqli_num_rows($ada) > 0){
    echo "<script>alert('ERROR: Nama Kategori telah terdaftar, silahkan pakai Nama Kategori lain!');history.go(-1)</script>";
}else{
    $query  = "INSERT INTO kategori (nama_kategori) VALUES ('$kategori')";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>
				alert('Data berhasil disimpan!');
				location.replace('read_kategori.php')
			  </script>";
    }else{
        echo "Error updating record: " . mysqli_error($conn);
    }
}


?>