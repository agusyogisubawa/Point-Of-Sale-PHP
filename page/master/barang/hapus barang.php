<?php

	$id = $_GET['id'];
	$koneksi->query("DELETE from tb_barang WHERE id_barang = '$id'");

?>

<script type="text/javascript">
	window.location.href="?page=barang";
</script>