<?php
// Lampirkan dbconfig (KONEKSI DATABASE)
require_once "../config.php";

// Cek status login user 
if ($user->isLoggedIn()) {

    header("location: ../Index/index.php"); //Jika registasi ke index 

}

//jika ada data yg dikirim 
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Proses login user 
    if ($user->login($username, $password)) {

        header("location: ../Index/index.php");
    } else {

        // Jika login gagal, ambil pesan error 
        $error = $user->getLastError();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login Pitnes Club's</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
		<link rel="icon" type="image/png" href="LoginCSS/images/logo1.png"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="LoginCSS/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="LoginCSS/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="LoginCSS/vendor/animate/animate.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="LoginCSS/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="LoginCSS/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="LoginCSS/css/util.css">
		<link rel="stylesheet" type="text/css" href="LoginCSS/css/cssLogin.css">
	<!--===============================================================================================-->
	</head>
	<body>
		<div class="limiter">
			<div class="container-login100" style="background-image: url('LoginCSS/images/bg-01.png');">
				<div class="wrap-login100">
					<div class="login100-pic js-tilt" data-tilt>
						<img src="LoginCSS/images/logo1.png" alt="IMG">
					</div>

					<form class="login100-form validate-form" method="POST">
						
						<span class="login100-form-title">
							L O G I N
						</span>

						<span class="notif">
							<?php if (isset($error)) : ?>
							<div class="error">
								<?php echo $error ?>
							</div>
							<?php endif; ?>
						</span>
						
						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input100" type="text" name="username" placeholder="Username" required>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="password" name="password" placeholder="Password" required>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>
						
						<div class="container-login100-form-btn">
							<input class="login100-form-btn" type="submit" value="Login" name="submit">
						</div>

						<div class="container-login100-form-btn">
							<a class="txt2" href="register.php">
								Create your Account
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!--===============================================================================================-->	
		<script src="LoginCSS/vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="LoginCSS/vendor/bootstrap/js/popper.js"></script>
		<script src="LoginCSS/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="LoginCSS/vendor/select2/select2.min.js"></script>
		<!--===============================================================================================-->
		<script src="LoginCSS/vendor/tilt/tilt.jquery.min.js"></script>
		<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
		</script>
		<!--===============================================================================================-->
		<script src="js/main.js"></script>
	</body>
</html>