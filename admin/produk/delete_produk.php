<?php 
include '../../koneksi.php';

$id  = $_GET['id'];

$query  = "DELETE FROM produk WHERE id='$id'";
$result = mysqli_query($conn, $query);

if($result){
    echo "<script>
            alert('Data berhasil dihapus!');
            location.replace('read_produk.php')
          </script>";
}else{
    echo "Error updating record: " . mysqli_error($conn);
}


?>