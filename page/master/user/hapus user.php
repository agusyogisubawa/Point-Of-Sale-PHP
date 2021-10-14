<?php
	$admin = $_GET['admin'];
	$id = $_GET['id_user'];
	$sql=$koneksi->query("SELECT from tb_user WHERE id_user='$id'");
	$data_user=$sql->fetch_assoc();
	$nama=$data_user['nama'];
	if($admin = $nama){
		?><script type="text/javascript">
		alert('User Tidak Bisa dihapus');
		window.location.href="?page=user";
		</script><?php
	}else{
	$koneksi->query("DELETE from tb_user WHERE id_user='$id'");
	}

?>

<script type="text/javascript">
	window.location.href="?page=user";
</script>