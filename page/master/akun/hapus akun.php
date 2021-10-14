<?php

	$id = $_GET['id'];
	$koneksi->query("DELETE from tb_akun WHERE id = '$id'");

?>

<script type="text/javascript">
	window.location.href="?page=akun";
</script>