<?php

session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_selaras';

    $koneksi = new mysqli("$host", "$username", "$password", "$dbname")
    or die(mysqli_error($koneksi));

    if (@$_SESSION['admin'] || @$_SESSION['pemilik'] || @$_SESSION['akunting']  ) {
    	header("location:index.php");
    }else{
    	
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
<body class="login-page">
	<div class="login-box">
		<br><br><br>
		<div class="card">
			<div class="body">
				<form id="sign_in" method="POST">
					<h3 style="text-align: center;">Silahkan Login</h3>
					<br>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">person</i>
						</span>
						<div class="form-line">
							<input type="text" name="username" class="form-control" placeholder="Username" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">lock</i>
						</span>
						<div class="form-line">
							<input type="password" name="password" class="form-control" placeholder="Password" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="form-line">
						<br>
						<div class="form-line" style="padding-bottom: 30px">
							<input type="submit" name="login" value="Login" class="btn btn-block bg-pink waves-effect">
						</div>
					</div>
				</form>
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

<?php  
	@$username = $_POST ['username'];
	@$password = $_POST ['password'];
	@$login = $_POST ['login'];

		if ($login) {
		
		$sql = $koneksi->query("SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'");

		$masuk = $sql->num_rows;
		$data = mysqli_fetch_assoc($sql);

		if ($masuk > 0) {
			header("location:index.php");   
			if ($data['level'] == "admin") {
				$_SESSION['admin'] = $data[id_user];                
				header("location:index.php");
			} elseif ($data['level'] == "pemilik") {
				$_SESSION['pemilik'] = $data[id_user];
				header("location:index.php"); 
			} elseif ($data['level'] == "akunting") {
				$_SESSION['akunting'] = $data[id_user];
				header("location:index.php");
			} 
		}else{
			echo "<script type='text/javascript'>
				alert('Maaf, Username atau Password salah');
			</script>";
		}
	
	}
}

?>
