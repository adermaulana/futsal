<?php

    include 'koneksi.php';

    session_start();

    if(isset($_SESSION['status']) == 'login'){

        header("location:admin");
        
    }

    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $login = mysqli_query($koneksi, "SELECT * FROM admin WHERE email='$email' and password='$password'");
        $cek = mysqli_num_rows($login);

		$loginPelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email='$email' and password='$password'");
        $cekPelanggan = mysqli_num_rows($loginPelanggan);

        if($cek > 0) {
            $admin_data = mysqli_fetch_assoc($login);
            $_SESSION['id_admin'] = $admin_data['id'];
            $_SESSION['nama_admin'] = $admin_data['nama'];
            $_SESSION['email_admin'] = $email;
            $_SESSION['status'] = "login";
            header('location:admin');

        } else if($cekPelanggan > 0) {
            $admin_data = mysqli_fetch_assoc($loginPelanggan);
            $_SESSION['id_pelanggan'] = $admin_data['id'];
            $_SESSION['nama_pelanggan'] = $admin_data['nama'];
            $_SESSION['email_pelanggan'] = $email;
            $_SESSION['status'] = "login";
            header('location:index.php');
        
         }  else {
            echo "<script>
            alert('Login Gagal, Periksa Username dan Password Anda!');
            header('location:index.php');
                 </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="login">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Belum Punya Akun?
						</span>

						<a class="txt2" href="registrasi.php">
							Registrasi
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/js/main.js"></script>

</body>
</html>