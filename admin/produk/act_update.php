<?php 
include '../../koneksi.php';

$id             = $_POST['id'];
$kategori       = $_POST['kategori'];
$nam_produk     = $_POST['nama'];
$nam_produklama = $_POST['nama'];
$harga          = $_POST['harga'];
$detail         = $_POST['detail'];
$stok           = $_POST['stok'];

//untuk gambar
$ekstensi   = ['jpg', 'png', 'jpeg'];
$filename   = $_FILES['gambar']['name'];
$ukuran     = $_FILES['gambar']['size'];
$lokasi     = $_FILES['gambar']['tmp_name'];
$ext        = pathinfo($filename, PATHINFO_EXTENSION);
$foto       = $filename;

$folder     = "gambar/$filename";
//cek data jika nama produk sama
$cekdata = "SELECT nama FROM produk WHERE nama='$nam_produk' and not nama='$nam_produklama'";
$ada     = mysqli_query($conn, $cekdata);

if(mysqli_num_rows($ada) > 0){
    echo "<script>alert('ERROR: Nama Kategori telah terdaftar, silahkan pakai Nama Kategori lain!');history.go(-1)</script>";
}
elseif(move_uploaded_file($lokasi, $folder)){
    if(! in_array($ext, $ekstensi)){
        echo "<script>alert('ERROR: Ekstensi tidak di perbolehkan');history.go(-1)</script>";
    }
    elseif($ukuran < 1044070){
    
        $query = "UPDATE produk SET kategori_id='$kategori', nama='$nam_produk', harga='$harga', foto='$foto', detail='$detail', ketersediaan_stok='$stok' WHERE id='$id'";

        $result = mysqli_query($conn,$query);

        if($result){
            echo "<script>
                    alert('Data berhasil diupdate!');
                    location.replace('read_produk.php');
                  </script>";
        }
        else{
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
    else{
        echo "<script>alert('ERROR: file terlalu besar');history.go(-1)</script>";
    }
}
else{

    $query2 = "UPDATE produk SET kategori_id='$kategori', nama='$nam_produk', harga='$harga',detail='$detail', ketersediaan_stok='$stok' WHERE id='$id'";

    $result2 = mysqli_query($conn,$query2);

    if($result2){
        echo "<script>
                alert('Data berhasil diupdate');
                location.replace('read_produk.php');
                </script>";
    }
    else{
        echo "Error updating record: " . mysqli_error($conn);
    }
}

?>