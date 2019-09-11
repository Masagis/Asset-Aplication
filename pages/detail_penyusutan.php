<?php
session_start();
include_once "../base_url.php";
include_once("../config/config.php");

$id_penyusutan = $_POST['id'];
$tahun = $_POST['umur_ekonomis'];



?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Detail Penyusutan | Admin</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/dist/css/theme.min.css">
        <script src="<?php echo $base_url ?>assets/src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>

<!--Header-->
        <div class="wrapper">
            <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                            <button type="button" id="navbar-fullscreen" class="nav-link" style="margin-right: 5px;"><i class="ik ik-maximize"></i></button>
                            &nbsp
                            <button  type='button' onclick="history.go(-1);" class='btn btn-danger'><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</button>
                        </div>
                        <div class="top-menu d-flex align-items-center">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="<?php echo $base_url ?>assets/img/user.jpg" alt=""></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="login.php"><i class="ik ik-power dropdown-icon"></i>Logout</a>
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
                        <a class="header-brand" >
                            <span class="text">ASET</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-item">
                                    <a href="dash_admin.php"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="table-kategori.php"><i class="ik ik-inbox"></i><span>Kategori</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="table-aset.php"><i class="ik ik-archive"></i><span>Aset</span></a>
                                </div>
                                <div class="nav-item active">
                                    <a href="table-penyusutan.php"><i class="ik ik-box"></i><span>Penyusutan</span></a>
                                </div>
                                <!-- <div class="nav-item">
                                    <a href="table-laporan.php"><i class="ik ik-layout"></i><span>Laporan</span></a>
                                </div> -->
                            </nav>
                        </div>
                    </div>
                </div>
        <!--End Sidebar-->
<!-- main content-->
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8"></div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="<?php echo $base_url ?>dash_admin.php"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Tabel</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Penyusutan</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header d-block">
                                        <h3>Detail Penyusutan</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="text-center">
                                            <form method='post' action='../controller/download.php' target="_blank" rel="nofollow">
                                                            
                                                            <?php 
                                                        $result = mysqli_query($mysqli,"SELECT * FROM tb_asset WHERE id_asset = '$id_penyusutan'") ?>
                                                        <?php while ($data = mysqli_fetch_assoc($result)) {?>
                                                            <a href="../controller/download.php" target="_blank" rel="nofollow">
                                                            <input type='submit' name='detail_susut' value='Cetak Laporan' target="_blank" class='btn btn-primary'>
                                                            <input type='hidden' name='id' value="<?php echo $data['id_asset']; ?>">
                                                            <input type='hidden' name='umur' value="<?php echo $data['umur_ekonomis']; ?>"></a>
                                                        <?php 
                                                    } 
                                                    ?>
                                            </form>
                                        </div>
                                        <div class="dt-responsive">
                                            <?php
                                                include '../config/config.php';
                                                $nilai_susut = mysqli_query($mysqli,"SELECT * FROM tb_asset  WHERE id_asset = '$id_penyusutan'");
                                                if($row = mysqli_fetch_array($nilai_susut)){
                                            ?>
                                            <div class="form-horizontal">
                                                <div class="input-group">
                                                    <h6 style="margin-right: 5px;">ID Aset</h6>
                                                    <h4 style="margin-left: 105px; margin-right: 5px;">:</h4>
                                                    <div class="col-xs-15">
                                                        <input class="form-control" readonly type="text" value="<?php echo $row['id_asset']; ?>">
                                                    </div> 
                                                </div>
                                                <div class="input-group">
                                                    <h6 style="margin-right: 5px;">Nomor Polisi</h6>
                                                    <h4 style="margin-left: 65px; margin-right: 5px;">:</h4>
                                                    <div class="col-xs-15">
                                                        <input class="form-control" readonly type="text" value="<?php echo $row['nopol']; ?>">
                                                    </div> 
                                                </div><div class="input-group">
                                                    <h6 style="margin-right: 5px;">Keterangan</h6>
                                                    <h4 style="margin-left: 76px; margin-right: 5px;">:</h4>
                                                    <div class="col-xs-15">
                                                        <input class="form-control" readonly type="text" value="<?php echo $row['kete_aset']; ?>">
                                                    </div> 
                                                </div><div class="input-group">
                                                    <h6 style="margin-right: 5px;">Tgl Perolehan</h6>
                                                    <h4 style="margin-left: 59px; margin-right: 5px;">:</h4>
                                                    <div class="col-xs-15">
                                                        <input class="form-control" readonly type="text" value="<?php echo $row['tgl_perolehan']; ?>">
                                                    </div> 
                                                </div><div class="input-group">
                                                    <h6 style="margin-right: 5px;">Harga Baku</h6>
                                                    <h4 style="margin-left: 70px; margin-right: 5px;">:</h4>
                                                    <div class="col-xs-15">
                                                        <input class="form-control" readonly type="text" value="<?php echo $row['hrg_baku']; ?>">
                                                    </div> 
                                                </div>
                                                
                                            </div>
                                        <?php } ?>

                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <ul></ul>
                                        <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Penyusutan Ke</th>
                                            <th class="text-center">Tahun Penyusutan</th>
                                            <th class="text-center">Nilai Sisa</th>
                                            <th class="text-center">Nilai Susut</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include '../config/config.php';
                                                $nilai_susut = mysqli_query($mysqli,"SELECT * FROM tb_asset  WHERE id_asset = '$id_penyusutan'");
                                                $no = 1;
                                                if($nilai_susut && isset($_POST['id'])){
                                                    while($row = mysqli_fetch_array($nilai_susut))
                                                    {
                                                        $nilai = ($row['hrg_baku'] - $row['nilai_sisa']) / $tahun;
                                                        $susut = $row['hrg_baku'];
                                                        for($i = 1; $i <= $tahun; $i++){
                                                            $susut = $susut - $nilai;
                                                            $y = strtotime("$i year");
                                                            echo "<tr>
                                                            <td>".$no++."</td>
                                                            <td>".$i."</td>
                                                            <td>".$year = date('Y', "+$y")."</td>
                                                            <td>".$row['nilai_sisa']."</td>
                                                            <td>".$susut."</td>
                                                            </tr>";
                                                            
                                                        }
                                                    }
                                                }
                                                
                                            ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Language - Comma Decimal Place table end -->
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © 2019 D.A.M</span>
                    </div>
                </footer>
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
        <script src="<?php echo $base_url ?>assets/dist/js/theme.min.js"></script>
        <script src="<?php echo $base_url ?>assets/js/datatables.js"></script>
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
