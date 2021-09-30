<?php  
// Lampirkan dbconfig (KONEKSI DATABASE)
require_once "../config.php"; 

// Cek status login user 
if($user->isLoggedIn()){ 

    header("location: ../Index/index.php"); //Jika registasi selesai ke index 

} 

//Cek adanya data yang dikirim 
if(isset($_POST['input'])) { 

    $usser = $_POST['usser']; 
    $email = $_POST['email']; 
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    // Registrasi user baru 
    if($user->register($usser, $email, $username, $password)){ 

    // Jika berhasil set variable success ke true 
    $success = true; 

    }else{ 

    // Jika gagal, ambil pesan error 
    $error = $user->getLastError(); 

    }

} 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
            <link rel="icon" type="image/png" href="RegisterCSS/images/logo1.png"/>
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="RegisterCSS/css/bootstrap.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="RegisterCSS/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="RegisterCSS/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="RegisterCSS/fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="RegisterCSS/vendor/animate/animate.css">
        <!--===============================================================================================-->	
            <link rel="stylesheet" type="text/css" href="RegisterCSS/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="RegisterCSS/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="RegisterCSS/vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
            <link rel="stylesheet" type="text/css" href="RegisterCSS/vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="RegisterCSS/css/util.css">
            <link rel="stylesheet" type="text/css" href="RegisterCSS/css/cess.css">
        <!--===============================================================================================-->
    </head>
    <body style="background-color: #999999;">
        <form method="post">
            <div class="limiter">
                <div class="container-login100">
                    <div class="login100-more" style="background-image: url('RegisterCSS/images/bg-02.jpg');"></div>

                    <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                        <form class="login100-form validate-form" method="POST" action="../Login/login.php">
                        <?php if (isset($error)): ?> 

                        <div class="error"> 

                        <?php echo $error ?> 

                        </div> 

                        <?php endif; ?> 

                        <?php if (isset($success)): ?> 

                        <div class="success"> 

                        Berhasil mendaftar. Silakan <a href="../Login/login.php">login</a>. 

                        </div> 

                        <?php endif; ?> 
                            <span class="login100-form-title p-b-59">
                                Sign Up
                            </span>

                            <div class="wrap-input100 validate-input" data-validate="Name is required">
                                <span class="label-input100">Full Name</span>
                                <input class="input100" type="text" name="usser" placeholder="Name">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                <span class="label-input100">Email</span>
                                <input class="input100" type="text" name="email" placeholder="Email addess">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Username is required">
                                <span class="label-input100">Username</span>
                                <input class="input100" type="text" name="username" placeholder="Username">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                <span class="label-input100">Password</span>
                                <input class="input100" type="password" name="password" placeholder="*************">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="flex-m w-full p-b-33">
                                <div class="contact100-form-checkbox">
                                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                    <label class="label-checkbox100" for="ckb1">
                                        <span class="txt1">
                                            I agree to the Terms of User
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button class="login100-form-btn" name="input">
                                        Sign Up
                                    </button>
                                </div>

                                <a href="login.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                                    Sign in
                                    <i class="fa fa-long-arrow-right m-l-5"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>
        <!--===============================================================================================-->
            <script src="RegisterCSS/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
            <script src="RegisterCSS/vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
            <script src="RegisterCSS/vendor/bootstrap/js/popper.js"></script>
            <script src="RegisterCSS/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
            <script src="RegisterCSS/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
            <script src="RegisterCSS/vendor/daterangepicker/moment.min.js"></script>
            <script src="RegisterCSS/vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
            <script src="RegisterCSS/vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
            <script src="RegisterCSS/js/main.js"></script>
    </body>
</html>

