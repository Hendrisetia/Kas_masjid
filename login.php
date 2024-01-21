<?php
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Masjid | Log in</title>
	<link rel="icon" href="dist/img/mushola.jpg">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	
	<style>
	    .login-logo a {
	        color: #000;
	        text-decoration: none;
	        font-size: 24px;
	        font-weight: bold;
	        letter-spacing: 2px;
	        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
	    }
	    
	    .login-page {
	    	background-image: url('dist/img/bg1.jpg'); /* Ganti dengan path gambar latar belakang */
	    	background-size: cover;
	    }
	</style>
</head>

<body class="hold-transition login-page">
	<div class="login-logo">
	    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
	    <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_qxTk8T2ezR.json" background="transparent" speed="1" style="width: 600px; height: 250px;" loop autoplay></lottie-player>

	    <a href="login.php">
	        <b>Aplikasi Pengelolaan <span style="color: #f00;">Kas</span> <span style="color: #0f0;">Masjid</span> <span style="color: #00f;">At-Taqwa</span></b>
	    </a>
	</div>

	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Login System</p>

				<form action="" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="username" placeholder="Username" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
								<b>Masuk</b>
							</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- Alert -->
	<script src="plugins/alert.js"></script>

</body>

</html>

<?php
include "inc/koneksi.php";
session_start();

if (isset($_POST['btnLogin'])) {  
	//anti inject sql
	$username = $_POST['username'];
	$password = $_POST['password'];

	//query login
	$sql_login = "SELECT * FROM tb_pengguna WHERE username='$username'";
	$query_login = mysqli_query($koneksi, $sql_login);
	$data_login = mysqli_fetch_array($query_login);
	$jumlah_login = mysqli_num_rows($query_login);

	if ($jumlah_login > 0) {
		$pwDb = $data_login['password'];

		$_SESSION["ses_id"] = $data_login["id_pengguna"];
		$_SESSION["ses_nama"] = $data_login["nama_pengguna"];
		$_SESSION["ses_username"] = $data_login["username"];
		$_SESSION["ses_password"] = $data_login["password"];
		$_SESSION["ses_level"] = $data_login["level"];

		if (password_verify($password, $pwDb)) {
			echo "<script>
				Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
				}).then((result) => {if (result.value)
					{window.location = 'http://localhost/kas_masjid/';}
				})</script>";
		} else {
			echo "<script>
				Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
				}).then((result) => {if (result.value)
					{window.location = 'login';}
				})</script>";
		}
	}
}
?>
