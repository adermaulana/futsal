<?php

    include 'koneksi.php';

    session_start();

    if(isset($_SESSION['status']) == 'login'){

        header("location:admin");
        
    }

    if (isset($_POST['registrasi'])) {
        $password = md5($_POST['password']);
        $email = $_POST['email'];

        // Check if the username already exists
        $checkEmail = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email='$email'");
        if (mysqli_num_rows($checkEmail) > 0) {
            echo "<script>
                    alert('Email sudah digunakan, pilih Email lain.');
                    document.location='registrasi.php';
                </script>";
            exit; // Stop further execution
        }

        // If the username is not taken, proceed with the registration
        $simpan = mysqli_query($koneksi, "INSERT INTO pelanggan (nama, alamat, email,telepon, password) VALUES ('$_POST[nama]','$_POST[alamat]','$_POST[email]','$_POST[telepon]','$password')");

        if ($simpan) {
            echo "<script>
                    alert('Berhasil Registrasi!');
                    document.location='index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Gagal!');
                    document.location='registrasi.php';
                </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registrasi</title>
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
						Registrasi
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nama">
						<span class="focus-input100" data-placeholder="Nama"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

                    <div class="wrap-input100 validate-input">
						<input class="input100" type="number" name="telepon">
						<span class="focus-input100" data-placeholder="Telepon"></span>
					</div>

                    <div class="wrap-input100 validate-input">
                        <textarea class="input100" name="alamat" rows="4"></textarea>
                        <span class="focus-input100" data-placeholder="Alamat"></span>
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
							<button class="login100-form-btn" type="submit" name="registrasi">
								Registrasi
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Sudah Punya Akun?
						</span>

						<a class="txt2" href="index.php">
							Login
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