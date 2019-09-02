<?php
session_start();
include_once "../base_url.php";
include_once("../config/config.php");
?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dasboard Admin </title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/c3/c3.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/dist/css/theme.min.css">
        <script src="<?php echo $base_url ?>assets/src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
<!--Header-->
<div class="wrapper">
    <header class="header-top" header-theme="light">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="top-menu d-flex align-items-center">
                    <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                    <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                </div>
                <div class="top-menu d-flex align-items-center">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="<?php echo $base_url ?>assets/img/user.jpg" alt=""></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="index.php"><i class="ik ik-power dropdown-icon"></i>Logout</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </header>
<!--End Header-->
<!--Sidebar-->
    <div class="page-wrap">
        <div class="app-sidebar colored">
            <div class="sidebar-header">
                <a class="header-brand">
                    <span class="text">ASET</span>
                </a>
                <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            </div>
            
            <div class="sidebar-content">
                <div class="nav-container">
                    <nav id="main-menu-navigation" class="navigation-main">
                        <div class="nav-item active">
                            <a href="dash_admin.php"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                        </div>
                        <div class="nav-item">
                            <a href="table-kategori.php"><i class="ik ik-inbox"></i><span>Kategori</span></a>
                        </div>
                        <div class="nav-item">
                            <a href="table-aset.php"><i class="ik ik-menu"></i><span>Aset</span></a>
                        </div>
                        <div class="nav-item">
                            <a href="table-penyusutan.php"><i class="ik ik-credit-card"></i><span>Penyusutan</span></a>
                        </div>
                        <!-- <div class="nav-item">
                            <a href="table-laporan.php"><i class="ik ik-layout"></i><span>Laporan</span></a>
                        </div> -->
                    </nav>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Kategori</h6>
                                            <?php 
                                            $result = mysqli_query($mysqli,"SELECT * FROM tb_kategori") ?>

                                            <?php $data = array();
                                                while (($row =mysqli_fetch_array($result)) != null) {
                                                    $data[] = $row;
                                                }
                                                $count = count($data);
                                            ?>
                                            <h2><?php echo $count; ?></h2>
                                        </div>
                                    <div class="icon">
                                        <i class="ik ik-award"></i>
                                        </div>
                                    </div>
                                        <small class="text-small mt-10 d-block">Jumlah Kategori</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Aset</h6>
                                                <?php 
                                            $result = mysqli_query($mysqli,"SELECT * FROM tb_asset") ?>

                                            <?php $data = array();
                                                while (($row =mysqli_fetch_array($result)) != null) {
                                                    $data[] = $row;
                                                }
                                                $count = count($data);
                                            ?>
                                            <h2><?php echo $count; ?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-thumbs-up"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Jumlah data Aset</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Penyusutan</h6>
                                                <?php 
                                                $result = mysqli_query($mysqli,"SELECT * FROM tb_penyusutan") ?>

                                                <?php $data = array();
                                                    while (($row =mysqli_fetch_array($result)) != null) {
                                                        $data[] = $row;
                                                    }
                                                    $count = count($data);
                                                    ?>
                                                <h2><?php echo $count; ?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-calendar"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Jumlah data penyusutan</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--End Sidebar-->

<!-- main content-->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            </div>
        </div>
    </div>
</div>
    
<!--End Main content-->
<!--Footer-->
        <footer class="footer">
            <div class="w-100 clearfix">
                <span class="text-center text-sm-left d-md-inline-block">Copyright © 2019</span>
            </div>
        </footer>
    <!--END Footer-->
    </div>
</div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $base_url ?>assets/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="<?php echo $base_url ?>assets/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?php echo $base_url ?>assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo $base_url ?>assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?php echo $base_url ?>assets/plugins/screenfull/dist/screenfull.js"></script>
        <script src="<?php echo $base_url ?>assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo $base_url ?>assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo $base_url ?>assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo $base_url ?>assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo $base_url ?>assets/plugins/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="<?php echo $base_url ?>assets/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo $base_url ?>assets/plugins/moment/moment.js"></script>
        <script src="<?php echo $base_url ?>assets/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="<?php echo $base_url ?>assets/plugins/c3/c3.min.js"></script>
        <script src="<?php echo $base_url ?>assets/js/tables.js"></script>
        <script src="<?php echo $base_url ?>assets/js/widgets.js"></script>
        <script src="<?php echo $base_url ?>assets/js/charts.js"></script>
        <script src="<?php echo $base_url ?>assets/dist/js/theme.min.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
