<?php

	$kode_faktur = $_GET['kode_faktur'];
	$koneksi->query("DELETE from tb_pembelian_detail WHERE kode_faktur = '$kode_faktur'");
	$koneksi->query("DELETE from tb_pembelian WHERE kode_faktur = '$kode_faktur'");

?>

<script type="text/javascript">
	window.location.href="?page=pembelian2";
</script>