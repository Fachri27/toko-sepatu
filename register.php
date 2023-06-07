<?php  
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container" style="height: 100%">
		<h1>Daftar</h1>
		<form action="" method="post">
			<label>Nama</label><br>
			<input type="text" name="nama">
			<br><br>
			<label>Email</label><br>
			<input type="email" name="email">
			<br><br>
			<label>Username</label><br>
			<input type="text" name="username">
			<br><br>
			<label>Password</label><br>
			<input type="password" name="pass1">
			<br><br>
			<button type="submit" name="registrasi">Daftar</button>
		</form>
	</div>
	<?php  
	if(isset($_POST['registrasi'])){
    $nama      = $_POST['nama'];
    $email     = $_POST['email'];
    $username  = $_POST['username'];
    $password1 = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
    $password2 = $_POST['pass2'];

    $cek_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    $cek_login = mysqli_num_rows($cek_user);

    if($cek_login > 0){
        echo "<script>
            alert('Username sudah terdaftar!');
            window.location = 'register.php';
            </script>";
    }else{

         mysqli_query($conn, "INSERT INTO users (username, email, password, nama) VALUES ('$username', '$email', '$password1', '$nama')");

          echo "<script>
                alert('Telah Berhasil!');
                window.location = 'login.php';
                </script>";
	}
	}
	?>
</body>
</html>