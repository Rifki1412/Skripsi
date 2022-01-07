<?php
error_reporting(0);
ob_start();
session_start();
include "config/koneksi.php";
include "config/fungsi_alert.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href="http://localhost/spkjambu/">
	  <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logos.png">
    <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="assets/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="assets/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Summernote -->
    <link href="assets/vendor/summernote/summernote.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="text/javascript" src="assets/chartjs/Chart.js"></script>
    <script src="assets/icheck/icheck.js"></script>
    <script src="assets/ckeditor/ckeditor.js"></script>
    <script src="assets/Flot/jquery.flot.js"></script>
</head>
<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="assets/" class="brand-logo">
                <img class="logo-abbr" src="assets/images/logos.png" alt="">
                <img class="logo-compact" src="assets/images/logos-text.png" alt="">
                <img class="brand-title" src="assets/images/logos-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <!--<div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>-->
                        </div>
            
                        <ul class="navbar-nav header-right">
                            <?php
                                if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                            ?>
                            <li class="nav-item dropdown header-profile">
                                <a class="text-white" href="#" role="button" data-toggle="dropdown">
                                    <?php echo ucfirst($_SESSION['username']); ?> <img src="assets/images/avatar/6.png" style="width: 40px; height: 40px;">
                                    <span class="hidden-xs"><?php echo $user; ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a <?php if ($page == "bantuan") echo 'class="active"'; ?> href="bantuan" class="dropdown-item">
                                        <i class="icon icon-single-content-03"></i>
                                        <span class="ml-2">Bantuan</span>
                                    </a>
                                    <a <?php if ($page == "password") echo 'class="class="btn btn-default btn-flat active"'; ?> href="password" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Password</span>
                                    </a>
                                    <a href="JavaScript: confirmIt('Anda yakin akan logout dari aplikasi ?','logout.php','','','','u','n','Self','Self')" onMouseOver="self.status = ''; return true" onMouseOut="self.status = ''; return true" class="dropdown-item">
                                        <i class="icon-logout"></i>
                                        <span class="ml-2">Logout</span>
                                    </a>
                                </div>
                            </li>
                            <?php } else { ?>
                            <li class="nav-item dropdown header-profile">
                                <a <?php if ($page == "bantuan") echo 'class="active"'; ?> id="bantu" href="bantuan" data-toggle="tooltip" data-placement="bottom" data-delay='{"show":"300", "hide":"500"}' title="Silahkan klik link berikut, jika anda masih kurang paham tentang penggunaan aplikasi ini !" class="btn btn-outline-warning" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa fa-question-circle"></i> <span>Bantuan</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a <?php if ($page == "formlogin") echo 'class="active"'; ?> href="formlogin" class="btn btn-outline-warning" role="button">
                                    <i class="fa fa-sign-in"></i> <span>Login</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
            <?php include "menu.php"; ?>
          </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
           <?php include "content.php"; ?>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p> 
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="assets/vendor/global/global.min.js"></script>
    <script src="assets/js/quixnav-init.js"></script>
    <script src="assets/js/custom.min.js"></script>

    <!-- Vectormap -->
    <script src="assets/vendor/raphael/raphael.min.js"></script>
    <script src="assets/vendor/morris/morris.min.js"></script>

    <script src="assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="assets/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="assets/vendor/flot/jquery.flot.js"></script>
    <script src="assets/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="assets/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="assets/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="assets/vendor/jquery.counterup/jquery.counterup.min.js"></script>

    <script src="assets/js/dashboard/dashboard-1.js"></script>

    <!-- Datatable -->
    <script src="assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/plugins-init/datatables.init.js"></script>

    <!-- Summernote -->
    <script src="assets/vendor/summernote/js/summernote.min.js"></script>
    <!-- Summernote init -->
    <script src="assets/js/plugins-init/summernote-init.js"></script>

    <!-- Jquery Validation -->
    <script src="assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="assets/js/plugins-init/jquery.validate-init.js"></script>
</body>
</html>
<?php            
  ob_end_flush();
?>