<?php include "controller/connect.php"; ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ชีวะกะอาศรม World2</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico"> -->

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- CSS SweetAlert here -->
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>

</head>

<body>

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2 style="font-size: 36pt;">ชีวะกะอาศรม</h2">
                                <p>There are advances being made in science and technology
                                    everyday, and a good example of this is the</p>
                                <!-- <a href="#" class="btn_3">Create an Account</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                            <form class="row contact_form" id="loginform">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value="" placeholder="รหัสผู้ใช้งาน">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value="" placeholder="รหัสผ่าน">
                                </div>
                                <div class="col-md-12 form-group">
                                    <!-- <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div> -->
                                    <button type="submit" value="submit" class="btn_3" style="cursor: pointer;">
                                        เข้าสู่ระบบ
                                    </button>
                                    <a class="lost_pass" href="#">ลืมรหัสผ่าน?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

    <!-- JS here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    <script src="assets/sweetalert2/dist/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            var permission = false;
            $('#adviser_id').on('keyup keypress blur change', function(e) {
                let value = $(this).val();
                let getadviser = "";
                $.ajax({
                    type: "post",
                    url: "controller/select_adviser.php",
                    data: {
                        value,
                        getadviser
                    },
                    success: function(response) {
                        if (response != 0) {
                            $('#warning').css('color', 'green');
                            $('#warning').text('สามารถสมัครสมาชิกได้');
                            permission = true;
                        } else {
                            $('#warning').css('color', 'red');
                            $('#warning').text('ไม่พบรหัสผู้ใช้งานนี้');
                            permission = false;
                        }
                    }
                });
            });
            $('#loginform').submit(function(e) {
                e.preventDefault();
                let data = $(this).serializeArray();
                let login = "";
                $.ajax({
                    type: "post",
                    url: "controller/authentication.php",
                    data: {
                        login,
                        data
                    },
                    success: function(response) {
                        if (response == 1) {
                            window.location.href = "main.php";
                        } else if (response == 2) {
                            Swal.fire(
                                'ไม่สามารถเข้าสู่ระบบได้',
                                'รอการอนุญาต',
                                'info'
                            );
                        } else if (response == 3) {
                            Swal.fire(
                                'ไม่สามารถเข้าสู่ระบบได้',
                                'เนื่องจากบัญชีถูกระงับชั่วคราว',
                                'warning'
                            )
                        } else if (response == 4) {
                            Swal.fire(
                                'ไม่สามารถเข้าสู่ระบบได้',
                                'ไม่มีบัญชีดังกล่าว',
                                'warning'
                            )
                        } else {
                            Swal.fire(
                                'ไม่สามารถเข้าสู่ระบบได้',
                                'QUERY ERROR',
                                'error'
                            )
                        }
                    }
                });
            });
        });
    </script>

    <?php include_once "html/modal/authmodal.php"; ?>
</body>

</html>