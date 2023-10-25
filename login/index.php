<?php
@session_start();

require 'connection.php';
if (@$_SESSION['Admin']) {
	header("location:" . base_url() . "layout/wrapperadmin/wrapper.php");
} else {
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Jasa Raharja Apps</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/vendors/images/apple-touch-icon_2.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/vendors/images/favicon-32x32_2.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/vendors/images/favicon-16x16_2.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/styles/style.css">
</head>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['login'])) { //user logging in
			require 'login.php';
		} elseif (isset($_POST['register'])) { //user registering
			require 'register.php';
		}
	}
	?>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="assets/vendors/images/logo_jasaraharja.svg" alt="">
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <!-- <li><a href="register.html">Register</a></li> -->
                    <li><button type="button" class="btn btn-link top_register"><i class="dw dw-logout"
                                aria-hidden="true"></i> <b>Sign Out</b></button></li>
                    <li><button type="button" class="btn btn-link top_login"><i class="dw dw-login"
                                aria-hidden="true"></i> <b>Sign In</b></button></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img class="pic_login" src="assets/vendors/images/login-page-img.png" alt="">
                    <img class="pic_register" src="assets/vendors/images/register-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <!-- FORM LOGIN -->
                    <div class="login-box bg-white box-shadow border-radius-10 tampil_login ">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To Apps</h2>
                        </div>
                        <form class="needs-validation" method="post" action="#" autocomplete="off">
                            <!-- <div class="select-role">
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn active">
											<input type="radio" name="options" id="admin">
											<div class="icon"><img src="assets/vendors/images/briefcase.svg" class="svg" alt=""></div>
											<span>I'm</span>
											Manager
										</label>
										<label class="btn">
											<input type="radio" name="options" id="user">
											<div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
											<span>I'm</span>
											Employee
										</label>
									</div>
								</div> -->
                            <div class="input-group custom">
                                <input type="text" name="username" class="form-control form-control-lg"
                                    placeholder="Username" required>
                            </div>
                            <div class="input-group custom">
                                <input type="password" name="password" class="form-control form-control-lg"
                                    placeholder="**********" required>
                            </div>
                            <!-- <div class="row pb-30">
									<div class="col-6">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck1">
											<label class="custom-control-label" for="customCheck1">Remember</label>
										</div>
									</div>
									<div class="col-6">
										<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
									</div>
								</div> -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="submit" class="btn btn-success btn-lg btn-block" name="login"><i
                                                class="icon-copy fa fa-send-o" aria-hidden="true"></i> Login</button>
                                        <!-- <button type="button" class="btn btn-primary btn-lg btn-block" id="login"><i class="fa fa-sign-in" aria-hidden="true"></i></i> Sign In</button> -->
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR
                                    </div>
                                    <div class="input-group mb-0">
                                        <button type="button" id="register"
                                            class="btn btn-outline-primary btn-lg btn-block"><i class="dw dw-logout"
                                                aria-hidden="true"></i> Register</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>




                    <!-- FORM REGISTER -->
                    <div class="login-box bg-white box-shadow border-radius-10 tampil_register ">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Register To Apps</h2>
                        </div>
                        <form class="needs-validation" method="post" action="#" autocomplete="off">
                            <!-- <div class="select-role">
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn active">
											<input type="radio" name="options" id="admin">
											<div class="icon"><img src="assets/vendors/images/briefcase.svg" class="svg" alt=""></div>
											<span>I'm</span>
											Manager
										</label>
										<label class="btn">
											<input type="radio" name="options" id="user">
											<div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
											<span>I'm</span>
											Employee
										</label>
									</div>
								</div> -->
                            <div class="input-group custom">
                                <input type="text" name="nama" class="form-control form-control-lg"
                                    placeholder="Nama Lengkap" required>
                            </div>
                            <div class=" input-group custom">
                                <input type="email" name="email" class="form-control form-control-lg"
                                    placeholder="Email" required>
                            </div>
                            <div class=" input-group custom">
                                <input type="text" name="username" class="form-control form-control-lg"
                                    placeholder="Username" required>
                            </div>
                            <div class="input-group custom">
                                <input type="password" name="password" class="form-control form-control-lg"
                                    placeholder="Password" required>
                            </div>

                            <!-- <div class="row pb-30">
									<div class="col-6">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck1">
											<label class="custom-control-label" for="customCheck1">Remember</label>
										</div>
									</div>
									<div class="col-6">
										<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
									</div>
								</div> -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-success btn-lg btn-block" name="register" type="submit"
                                            value="Register">
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR
                                    </div>
                                    <div class="input-group mb-0">
                                        <button type="button" class="btn btn-outline-primary btn-lg btn-block"
                                            id="login"><i class="dw dw-login"></i> Login</button>
                                        <!-- <a class="btn btn-outline-primary btn-lg btn-block " href="register.html">Sudah Memiliki Akun / Login</a> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> -->
    <script src="assets/vendors/scripts/core.js"></script>
    <script src="assets/vendors/scripts/script.min.js"></script>
    <script src="assets/vendors/scripts/layout-settings.js"></script>
    <script src="assets/src/plugins/jbvalidator/dist/jbvalidator.min.js"></script>
</body>

</html>

<script type="text/javascript">
$(document).ready(function() {

    $(".tampil_register").hide();
    $(".pic_register").hide();
    $(".top_login").hide();
    $('#register, .top_register').click(function() {
        $(".tampil_login").slideUp(500, "swing");
        // $(".tampil_login").hide();
        // $(".tampil_register").delay(500);
        // $(".tampil_register").fadeIn(500, "swing");
        $(".tampil_register").slideDown(1000, "swing");
        $(".pic_login").slideUp(500, "swing");
        $(".pic_register").slideDown(1000, "swing");
        $(".top_register").hide();
        $(".top_login").fadeIn();
    });


    $('#login, .top_login').click(function() {
        $(".tampil_register").slideUp(500, "swing");
        // $(".tampil_login").hide();
        // $(".tampil_register").delay(500);
        // $(".tampil_register").fadeIn(500, "swing");
        $(".tampil_login").slideDown(1000, "swing");
        $(".pic_register").slideUp(500, "swing");
        $(".pic_login").slideDown(1000, "swing");
        $(".top_login").hide();
        $(".top_register").fadeIn();
    });
});

$(function() {

    let validator = $('form.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
        language: 'assets/src/plugins/jbvalidator/dist/lang/en.json'
    });

    // //new custom validate methode
    // validator.validator.custom = function(el, event) {

    // 	if ($(el).is('[name=password]') && $(el).val().length < 5) {
    // 		return 'Your password is too weak.';
    // 	}

    // 	return '';
    // }

    // let validatorServerSide = $('form.validatorServerSide').jbvalidator({
    // 	errorMessage: true,
    // 	successClass: true,
});
</script>
<?php
}
?>