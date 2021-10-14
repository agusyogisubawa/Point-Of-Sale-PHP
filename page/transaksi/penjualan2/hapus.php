<?php

	$kode = $_GET['kode_nota'];
	$koneksi->query("DELETE from tb_penjualan_detail WHERE kode_nota = '$kode'");
	$koneksi->query("DELETE from tb_penjualan WHERE kode_nota = '$kode'");

?>

<script type="text/javascript">
	window.location.href="?page=penjualan2";
</script>