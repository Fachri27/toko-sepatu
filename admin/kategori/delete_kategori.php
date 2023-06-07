<?php 
include '../../koneksi.php';

$id  = $_GET['id'];

$query  = "DELETE FROM kategori WHERE id='$id'";
$result = mysqli_query($conn, $query);

if($result){
    echo "<script>
            alert('Data berhasil dihapus!');
            location.replace('read_kategori.php')
          </script>";
}else{
    echo "Error updating record: " . mysqli_error($conn);
}


?>