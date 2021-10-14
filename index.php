<?php

session_start();

include "kode_nota.php";
include "kode_faktur.php";
include "no_transaksi.php";

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_selaras';

    $koneksi = new mysqli("$host", "$username", "$password", "$dbname")
    or die(mysqli_error($koneksi));

    if (@$_SESSION['admin'] || @$_SESSION['pemilik'] || @$_SESSION['akunting'] ) {

    function rupiah($angka) {
        $hasil = "Rp ". number_format($angka,2,',','.');
        return $hasil;
    }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>UD SELARAS</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
     <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->   
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../../index.html">UD SELARAS</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <?php

        if (@$_SESSION['admin']) {
            $user = $_SESSION['admin'];
        }else if (@$_SESSION['pemilik']) {
            $user = $_SESSION['pemilik'];
        }else if (@$_SESSION['akunting']) {
            $user = $_SESSION['akunting'];
        }

        $sql = $koneksi->query("SELECT * FROM tb_user WHERE id_user='$user'");
        $data = $sql->fetch_assoc();

    ?>
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $data['nama']; ?></div>
                    <div class="email">Anda login sebagai <?php echo $data['level']; ?> </div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="profile.php"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="logout.php"><i class="material-icons">input</i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU UTAMA</li>
                    <li>
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li>
                    <?php if (@$_SESSION['admin']) { ?>
                    <li class>
                        <a href="javascript:void(0);"class="menu-toggle">
                            <i class="material-icons">folder_open</i>
                            <span>Data Master</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="">
                                <a href="?page=user">Data User</a>
                            </li>
                            <li class="">
                                <a href="?page=akun">Data Akun</a>
                            </li>
                            <li class="">
                                <a href="?page=barang">Data Barang</a>
                            </li>
                        </ul>
                    </li>
                    <?php } if (@$_SESSION['admin']) { ?>
                    <li class=>
                        <a class="menu-toggle">
                            <i class="material-icons">folder_open</i>
                            <span>Data Transaksi</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="">
                                <a href="?page=penjualan&kode_nota=<?php echo $kode; ?>">Transaksi Penjualan</a>
                            </li>
                            <li class="">
                                <a href="?page=pembelian&kode_faktur=<?php echo $kode_faktur; ?>">Transaksi Pembelian</a>
                            </li>
                            <li class="">
                                <a href="?page=penjualan2">Data Transaksi Penjualan</a>
                            </li>
                            <li class="">
                                <a href="?page=pembelian2">Data Transaksi Pembelian</a>
                            </li>
                        </ul>
                    </li>
                    <?php } if (@$_SESSION['akunting']) { ?> 
                    <li class=>
                        <a class="menu-toggle">
                            <i class="material-icons">folder_open</i>
                            <span>Data Jurnal Entry</span>
                        </a>
                            <ul class="ml-menu">
                            <li class="">
                                <a href="?page=jurnal&no_transaksi=<?php echo $no_transaksi; ?>">Transaksi Jurnal Entry</a>
                            </li>
                            <li class="">
                                <a href="?page=jurnalumum">Data Transaksi Jurnal Umum</a>
                            </li>
                            <li class="">
                                <a href="?page=jurnalentry">Data Transaksi Jurnal Entry</a>
                            </li>
                        </ul>
                        </a>
                    </li>
                    <?php } if (@$_SESSION['pemilik'] || @$_SESSION['akunting']) { ?>

                    <li>
                        <a href="javascript:void(0);"class="menu-toggle">
                            <i class="material-icons">folder</i>
                            <span>Laporan</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="">
                                <a href="?page=lap_penjualan">Laporan Penjualan</a>
                            </li>
                            <li class="">
                                <a href="?page=lap_pembelian">Laporan Pembelian</a>
                            </li>
                            <li class="">
                                <a href="?page=lap_stok_barang">Laporan Stok Barang</a>
                            </li>
                            <li class="">
                                <a href="?page=lap_penyesuaian">Laporan Stok Opname</a>
                            </li>
                            <li class="">
                                <a href="?page=lap_jurnal">Laporan Jurnal Umum</a>
                            </li>
                            <li class="">
                                <a href="?page=lap_bukubesar">Laporan Buku Besar</a>
                            </li>
                            <li class="">
                                <a href="?page=lap_neracasaldo">Laporan Neraca Saldo</a>
                            </li>
                            <li class="">
                                <a href="?page=lap_labarugi">Laporan Laba Rugi</a>
                            </li>
                            <li class="">
                                <a href="?page=lap_neraca">Laporan Neraca</a>
                            </li>
                        </ul>
                    </li>
                    
                    <?php } ?>

                    <li class=>
                        
                        <ul class="ml-menu">
                            <li class="active">
                                
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 - 2021 <a href="javascript:void(0);">UD SELARAS</a>
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <?php

                    @$page = $_GET['page'];
                    @$aksi = $_GET['aksi'];

                    if ($page == "barang") {
                            if ($aksi == "") 
                            {
                                include "page/master/barang/barang.php";
                            }elseif ($aksi == "tambah") {
                                include "page/master/barang/tambah barang.php";
                            }elseif ($aksi == "ubah") {
                                include "page/master/barang/ubah barang.php";
                            }elseif ($aksi == "hapus") {
                                include "page/master/barang/hapus barang.php";
                            }elseif ($aksi == "tambah1") {
                                include "page/master/barang/tambah jenis.php";
                            }
                        }elseif ($page == "stok") {
                            if ($aksi == "") 
                            {
                                include "page/master/stok/stok.php";
                            }elseif ($aksi == "tambah") {
                                include "page/master/stok/tambah stok.php";
                            }elseif ($aksi == "lihat") {
                                include "page/master/stok/lihat stok.php";
                            }elseif ($aksi == "kembali") {
                                include "page/master/stok/stok.php";
                            }
                        }elseif ($page == "akun") {
                            if ($aksi == "") 
                            {
                                include "page/master/akun/akun.php";
                            }elseif ($aksi == "tambah") {
                                include "page/master/akun/tambah akun.php";
                            }elseif ($aksi == "ubah") {
                                include "page/master/akun/ubah akun.php";
                            }elseif ($aksi == "hapus") {
                                include "page/master/akun/hapus akun.php";
                            }
                        }elseif ($page == "user") {
                            if ($aksi == "") 
                            {
                                include "page/master/user/user.php";
                            }elseif ($aksi == "tambah") {
                                include "page/master/user/tambah user.php";
                            }elseif ($aksi == "ubah") {
                                include "page/master/user/ubah user.php";
                            }elseif ($aksi == "hapus") {
                                include "page/master/user/hapus user.php";
                            }
                        }elseif ($page == "penjualan") {
                            if ($aksi == "") 
                            {
                                include "page/transaksi/penjualan/penjualan.php";
                            }elseif ($aksi == "hapus") {
                                include "page/transaksi/penjualan/hapus.php";
                            }
                        }elseif ($page == "pembelian") {
                            if ($aksi == "") 
                            {
                                include "page/transaksi/pembelian/pembelian.php";
                            }elseif ($aksi == "hapus") {
                                include "page/transaksi/pembelian/hapus.php";
                            }
                        }elseif ($page == "jurnal") {
                            if ($aksi == "") 
                            {
                                include "page/transaksi/jurnal/jurnal.php";
                            }elseif ($aksi == "hapus") {
                                include "page/transaksi/jurnal/hapus jurnal.php";
                            }
                        }elseif ($page == "jurnalumum") {
                            if ($aksi == "") 
                            {
                                include "page/transaksi/jurnalumum/jurnalumum.php";
                            }elseif ($aksi == "hapus") {
                                include "page/transaksi/jurnalumum/hapus.php";
                            }elseif ($aksi == "lihat") {
                                include "page/transaksi/jurnalumum/lihat.php";
                            }elseif ($aksi == "kembali") {
                                include "page/transaksi/jurnalumum/jurnalumum.php";
                            }
                        }elseif ($page == "jurnalentry") {
                            if ($aksi == "") 
                            {
                                include "page/transaksi/jurnalentry/jurnalentry.php";
                            }elseif ($aksi == "hapus") {
                                include "page/transaksi/jurnalentry/hapus.php";
                            }elseif ($aksi == "ubah") {
                                include "page/transaksi/jurnalentry/ubah.php";
                            }elseif ($aksi == "lihat") {
                                include "page/transaksi/jurnalentry/lihat.php";
                            }elseif ($aksi == "kembali") {
                                include "page/transaksi/jurnalentry/jurnalentry.php";
                            }
                        }elseif ($page == "penjualan2") {
                            if ($aksi == "") 
                            {
                                include "page/transaksi/penjualan2/penjualan2.php";
                            }elseif ($aksi == "hapus") {
                                include "page/transaksi/penjualan2/hapus.php";
                            }elseif ($aksi == "lihat") {
                                include "page/transaksi/penjualan2/lihat.php";
                            }elseif ($aksi == "ubah") {
                                include "page/transaksi/penjualan2/ubah.php";
                            }elseif ($aksi == "kembali") {
                                include "page/transaksi/penjualan2/penjualan2.php";
                            }
                        }elseif ($page == "pembelian2") {
                            if ($aksi == "") 
                            {
                                include "page/transaksi/pembelian2/pembelian2.php";
                            }elseif ($aksi == "hapus") {
                                include "page/transaksi/pembelian2/hapus.php";
                            }elseif ($aksi == "lihat") {
                                include "page/transaksi/pembelian2/lihat.php";
                            }elseif ($aksi == "ubah") {
                                include "page/transaksi/pembelian2/ubah.php";
                            }elseif ($aksi == "kembali") {
                                include "page/transaksi/pembelian2/pembelian2.php";
                            }
                        }elseif ($page == "saldo") {
                            if ($aksi == "") 
                            {
                                include "page/transaksi/saldo/saldo.php";
                            }elseif ($aksi == "tambah") {
                                include "page/transaksi/saldo/tambah.php";
                            }elseif ($aksi == "ubah") {
                                include "page/transaksi/saldo/ubah.php";
                            }elseif ($aksi == "hapus") {
                                include "page/transaksi/saldo/hapus.php";
                            }
                        }elseif ($page == "lap_penjualan") {
                            if ($aksi == "") 
                            {
                                include "page/laporan/lap_penjualan/lap_penjualan.php";
                            }elseif ($aksi == "cetak") {
                                include "page/laporan/lap_neraca/cetak.php";
                            }
                        }elseif ($page == "lap_pembelian") {
                            if ($aksi == "") 
                            {
                                include "page/laporan/lap_pembelian/lap_pembelian.php";
                            }elseif ($aksi == "cetak") {
                                include "page/laporan/lap_pembelian/cetak.php";
                            }
                        }elseif ($page == "lap_penyesuaian") {
                            if ($aksi == "") 
                            {
                                include "page/laporan/lap_penyesuaian/lap_penyesuaian.php";
                            }elseif ($aksi == "cetak") {
                                include "page/laporan/lap_penyesuaian/cetak.php";
                            }
                        }elseif ($page == "lap_stok_barang") {
                            if ($aksi == "") 
                            {
                                include "page/laporan/lap_stok_barang/lap_stok.php";
                            }elseif ($aksi == "cetak") {
                                include "page/laporan/lap_stok_barang/stok.php";
                            }
                        }elseif ($page == "lap_jurnal") {
                            if ($aksi == "") 
                            {
                                include "page/laporan/lap_jurnal/lap_jurnal.php";
                            }elseif ($aksi == "cetak") {
                                include "page/laporan/lap_jurnal/cetak.php";
                            }
                        }elseif ($page == "lap_bukubesar") {
                            if ($aksi == "") 
                            {
                                include "page/laporan/lap_bukubesar/lap_bukubesar.php";
                            }elseif ($aksi == "cetak") {
                                include "page/laporan/lap_bukubesar/cetak.php";
                            }
                        }elseif ($page == "lap_neracasaldo") {
                            if ($aksi == "") 
                            {
                                include "page/laporan/lap_neracasaldo/lap_neracasaldo.php";
                            }elseif ($aksi == "cetak") {
                                include "page/laporan/lap_neracasaldo/cetak.php";
                            }
                        }elseif ($page == "lap_neraca") {
                            if ($aksi == "") 
                            {
                                include "page/laporan/lap_neraca/lap_neraca.php";
                            }elseif ($aksi == "cetak") {
                                include "page/laporan/lap_neraca/cetak.php";
                            }
                        }elseif ($page == "lap_labarugi") {
                            if ($aksi == "") 
                            {
                                include "page/laporan/lap_labarugi/lap_labarugi.php";
                            }elseif ($aksi == "cetak") {
                                include "page/laporan/lap_labarugi/cetak.php";
                            }
                        }


                        if ($page == "") {
                            include "home.php";
                        }

                ?>
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>

    <!-- Custom Js -->
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

</body>
</html>

<?php
}else{
        header('location:login.php');
    }
?>



<div class="modal fade" id="smallModal2" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Pembelian</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/laporan/lap_pembelian/pembelian.php" target="blank">

               <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal1" class="form-control"/>
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir1" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary-link waves-effect">Cetak</button>
                <button type="button" class="btn btn-primary-link waves-effect" data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal3" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Stok Opname</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/laporan/lap_penyesuaian/penyesuaian.php" target="blank">

               <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal2" class="form-control"/>
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir2" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary-link waves-effect">Cetak</button>
                <button type="button" class="btn btn-primary-link waves-effect" data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal4" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Stok Barang</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/laporan/lap_stok_barang/stok.php" target="blank">

               <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal" class="form-control"/>
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary-link waves-effect">Cetak</button>
                <button type="button" class="btn btn-primary-link waves-effect" data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="modal fade" id="smallModal5" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Jurnal Umum</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/laporan/lap_jurnal/jurnal.php" target="blank">

               <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal" class="form-control"/>
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary-link waves-effect">Cetak</button>
                <button type="button" class="btn btn-primary-link waves-effect" data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="modal fade" id="smallModal6" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Buku Besar</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/laporan/lap_bukubesar/buku_besar.php" target="blank">

               <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal" class="form-control"/>
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary-link waves-effect">Cetak</button>
                <button type="button" class="btn btn-primary-link waves-effect" data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="modal fade" id="smallModal7" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Neraca Saldo</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/laporan/lap_neracasaldo/neraca_saldo.php" target="blank">

               <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal" class="form-control"/>
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary-link waves-effect">Cetak</button>
                <button type="button" class="btn btn-primary-link waves-effect" data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal9" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Laba Rugi</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/laporan/lap_labarugi/labarugi.php" target="blank">

               <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal" class="form-control"/>
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary-link waves-effect">Cetak</button>
                <button type="button" class="btn btn-primary-link waves-effect" data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>