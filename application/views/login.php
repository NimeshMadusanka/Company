<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/public/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/main.css">
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>/public/js/sweetalert.min.js"></script>
</head>
<body>

<div class="container">
<div style="width: 400px; height: 200px;" class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="login-check" method="post">
					<span class="login100-form-title">
						Sign In
					</span>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Email">
                    <input class="input100" type="text" name="email" placeholder="Please enter Email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                <div style="margin-top: 10%" class="container-login100-form-btn">
                    <input type="submit" class="login100-form-btn" value="Login">
                </div>

                <div style="margin-top: -50%" class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

                    <a href="<?php echo base_url(); ?>register" class="txt3">
                        Sign up now
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>/public/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>/public/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>/public/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url(); ?>/public/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>/public/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>/public/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/public/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>/public/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>/public/js/main.js"></script>

</body>
</html>
<script>
    function showErrorMsg(msg) {
        swal({
            title: "Error",
            text: msg,
            icon: "warning",
            dangerMode: true,
        });
    }

    window.onload = function (e) {
        var x = "<?php if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
        }?>";
        if ("1" == x) {
            showErrorMsg("invalid email");
            <?php $this->session->set_flashdata("error", null); ?>
        }
        if ("2" == x) {
            showErrorMsg("Wrong Password");
            <?php $this->session->set_flashdata("error", null); ?>
        }

    }
</script>