<?php 
include '../../koneksi.php';
include '../../function.php';

$kategori   = $_POST['kategori'];
$nam_produk = $_POST['nama'];
$nama_seo   = seo_title($_POST['nama']);
$harga      = $_POST['harga'];
$detail     = $_POST['detail'];
$stok       = $_POST['stok'];

//untuk gambar
$ekstensi   = ['jpg', 'png', 'jpeg'];
$filename   = $_FILES['gambar']['name'];
$ukuran     = $_FILES['gambar']['size'];
$lokasi     = $_FILES['gambar']['tmp_name'];
$ext        = pathinfo($filename, PATHINFO_EXTENSION);

$folder     = "gambar/$filename";
//cek data jika nama produk sama
$cekdata = "SELECT nama FROM produk WHERE nama='$nam_produk'";
$ada     = mysqli_query($conn, $cekdata);

if(mysqli_num_rows($ada) > 0){
    echo "<script>alert('ERROR: Nama Kategori telah terdaftar, silahkan pakai Nama Kategori lain!');history.go(-1)</script>";

} 
//cek extensi file
elseif(!in_array($ext, $ekstensi)){
    echo "<script>alert('ERROR: Ekstensi tidak di perbolehkan');history.go(-1)</script>";
}
//cek ukuran file
elseif($ukuran < 1044070){
    $foto = $filename;
    move_uploaded_file($lokasi, $folder);

    $query = "INSERT INTO produk (kategori_id, nama, nama_seo, harga, foto, detail, ketersediaan_stok) VALUE ('$kategori', '$nam_produk', '$nama_seo', '$harga', '$foto', '$detail', '$stok')";

    $result = mysqli_query($conn,$query);
    
    if($result){
        echo "<script>
				alert('Data berhasil disimpan!');
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


?>