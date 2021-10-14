<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_selaras';

    $koneksi = new mysqli("$host", "$username", "$password", "$dbname")
    or die(mysqli_error($koneksi));
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

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>BIODATA DIRI</h2>
</div>
    <div class="body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama User</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Level</th>
                </tr>                                           
             </thead>
             <tbody>
                <?php
                    $no = 1; 
                    $sql = $koneksi->query("SELECT * FROM tb_user order by id_user asc");
                    while ($data = mysqli_fetch_array($sql)) :             
                ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['nama'];?></td>
                        <td><?php echo $data['alamat'];?></td>
                        <td><?php echo $data['email'];?></td>
                        <td><?php echo $data['level'];?></td>
                    </tr>
                        <?php endwhile; // penutup perulangan while ?>
                </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js-->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>
</html>