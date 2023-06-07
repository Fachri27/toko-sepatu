<?php  
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<form action="" method="post">
			<label>Username</label><br>
			<input type="text" name="username">
			<br><br>
			<label>Password</label><br>
			<input type="password" name="pass">
			<br><br>
			<button type="submit" name="submit">masuk</button>
			<a href="register.php">daftar</a>
		</form>
	</div>
	

	<?php  

		if(isset($_POST['submit'])){
			$username = htmlspecialchars($_POST['username']);
			$password = htmlspecialchars($_POST['pass']);

			$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
			$count = mysqli_num_rows($query);
			$data = mysqli_fetch_array($query);

			if ($count > 0) {

				if (password_verify($password, $data['password'])) {
					$_SESSION['login'] = true;
					$_SESSION['username'] = $data['username'];
					$_SESSION['role'] = $data['role'];
					$_SESSION['nama'] = $data['nama'];
					$_SESSION['email'] = $data['email'];
					$_SESSION['id'] = $data['id'];

					header("location: index.php");
				}
				else{
					echo "password kamu tidak valid";
				}
			}
			else{
				echo "your account not exists";
			}
		}


	?>

</body>
</html>