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
        <title>Tabel Kategori | Admin</title>
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
        <script src="<?php echo $base_url ?>assets/js/jquery-3.1.1.min.js"></script>
        
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
                                <div class="nav-item active">
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
        <!--End Sidebar-->
<!-- main content-->
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="<?php echo $base_url ?>dash_admin.php"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Tabel</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h3>Tabel Kategori</h3>
                                        
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="text-center"> 
                                            <button type='button' class='btn btn-primary ' data-toggle='modal' data-target='#tambah_kategori'><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah Kategori
                                            </button>
                                        </div>
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <ul></ul>
                                        <thead>
                                        <tr>
                                            <th class="text-center">ID Kategori</th>
                                            <th class="text-center">Nomor Polisi</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include '../config/config.php';
                                                $kategori = mysqli_query($mysqli,"SELECT * FROM tb_kategori");
                                                $no = 1;
                                                if($kategori){
                                                    while($row = mysqli_fetch_array($kategori))
                                                    {
                                                        echo "<tr>
                                                        <td>".$row['id_kategori']."</td>
                                                        <td>".$row['nopol']."</td>
                                                        <td>".$row['kete_kategori']."</td>
                                                        <td>
                                                        <form method='post' action='".$base_url."controller/delete_kategori.php'>
                                                            <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#edit_kategori' data-id=".$row['id_kategori']."><i class='ik ik-edit'></i>
                                                            </button>
                                                            
                                                                <button type'button' class='btn btn-danger' name='hapus'><i class='ik ik-trash-2'></i>
                                                                <input type='hidden' name='id' value=".$row['id_kategori']."></button>
                                                            </form>
                                                        </td>
                                                    </tr>";
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                    <div class="modal fade" id="tambah_kategori" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-weight-bold">Tambah Kategori</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body mx-3">
                                        <form action="tambah_kategori.php" method="post">
                                        <div class="form-group">

                                            <label>Id Kategori</label>
                                                <select name='id' class="form-control select2">
                                                    <option value="R2">R2</option>
                                                    <option value="R4">R4</option>
                                                    </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Polisi / Plat Kendaraan</label>
                                            <input type="text" class="form-control" name="plat" placeholder="Masukan Nomor polisi atau Plat kendaraan">
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" class="form-control" name="keterangan" placeholder="Masukan Keteranagan Kendaraan">
                                        </div>

                                        <button class="btn btn-primary" type="submit">Tambah</button>

                                    </form>
                                    </div>
                                    
                                
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="edit_kategori" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-weight-bold">Edit Kategori</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body mx-3">
                                        <div class="hasil-data"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <script type="text/javascript">

                        $(document).ready(function(){

                            $('#edit_kategori').on('show.bs.modal', function (e) {

                                var idx = $(e.relatedTarget).data('id');

                                //menggunakan fungsi ajax untuk pengambilan data

                                $.ajax({

                                    type : 'post',

                                    url : 'detail.php',

                                    data :  'idx='+ idx,

                                    success : function(data){

                                    $('.hasil-data').html(data);//menampilkan data ke dalam modal

                                    }

                                });

                            });

                        });

                    </script>


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
