<?php
require_once "../config/config.php";
if (!isset($_SESSION['username'])) {
    echo "<script>window.location='" . base_url('') . "';</script>";
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> Sistem Prediksi</title>

        <!-- Custom fonts for this template-->
        <link href="<?= base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../datatable/css/datatables.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <link href="../sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">


                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <span>Sistem Prediksi</span>

                </a>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/dashboard/index.php">

                        <span>Beranda</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/dataprovinsi/index.php">

                        <span>Data Provinsi</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/datapanen/index.php">

                        <span>Data Panen</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/prediksi/index.php">
                        <span>Prediksi</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/tentang/index.php">
                        <span>Tentang</span></a>
                </li>
            </ul>

            <div id="content-wrapper" class="d-flex flex-column ">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow bg-success">
                        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                        </a>
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 ">
                            <i class="fa fa-bars text-white"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto ">

                            <li class="nav-item dropdown no-arrow">
                                <button class="btn btn-success btn-action btn-xs mr-1" data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" title="Ganti Password"><span>Ganti Password</span></button>

                            </li>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">

                                <a class="dropdown-item text-white" href="../auth/logout.php">
                                    Log out
                                </a>

                            </li>

                        </ul>


                    </nav>

                    <!-- MODAL -->

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ganyti Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="POST">

                                        <div class="form-group">
                                            <div class="section-title mt-0">Id Admin</div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="iduser" value="<?php echo $_SESSION['id_admin'] ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="section-title mt-0">Password</div>
                                            <div class="input-group mb-2">
                                                <input type="password" class="form-control" name="pwd">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="section-title mt-0">Komfirmasi Password</div>
                                            <div class="input-group mb-2">
                                                <input type="password" class="form-control" name="kompwd">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-primary mr-1" type="submit" name="submit">Simpan</button>

                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                        </div>
                                </div>
                                </form>



                                <?php
                                if (isset($_POST['submit'])) {
                                    $id_user = $_POST['iduser'];
                                    $pwd = $_POST['pwd'];
                                    $kompwd = $_POST['kompwd'];
                                    if ($kompwd == $pwd) {
                                        $update = mysqli_query($con, "UPDATE `admin` SET `password` = '$kompwd' WHERE `admin`.id_admin = '$_SESSION[id_admin]'") or die(mysqli_error($con));

                                        echo "<script type='text/javascript'>
                                        setTimeout(function () { 
                                            swal({ 
                                                title: 'Sukssess', 
                                                text: 'Pasword Berhasil Di Rubah', 
                                                type: 'success',
                                                 timer: 5000,
                                                  showConfirmButton: false });
                                        },10);  
                                        window.setTimeout(function(){ 
                                          window.location.replace('index.php');
                                        } ,3000); 
                                        </script>";
                                    } else {
                                        echo "<script type='text/javascript'>
                                        setTimeout(function () { 
                                            swal({ 
                                                title: 'Maaf', 
                                                text: 'Password Tidak Sama , Mohon Isi Kembali', 
                                                type: 'warning',
                                                 timer: 5000,
                                                  showConfirmButton: false });
                                        },10);  
                                        window.setTimeout(function(){ 
                                          window.location.replace('index.php');
                                        } ,3000); 
                                        </script>";
                                    }
                                }
                                ?>

                                </section>
                            </div>

                        </div>
                    </div>


                    <!-- Bootstrap core JavaScript-->
                    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
                    <script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="../datatable/js/datatables.min.js"></script>

                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
                    <script src="../sweetalert/sweetalert.min.js"></script>

                    <!-- Core plugin JavaScript-->
                    <script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

                    <!-- Custom scripts for all pages-->
                    <script src="<?= base_url() ?>/js/sb-admin-2.min.js"></script>

                    <script type="text/javascript" src="<?= base_url() ?>/chartjs/Chart.js"></script>
                <?php

            }
                ?>