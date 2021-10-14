<?php

	$no_transaksi = $_GET['no_transaksi'];
	$koneksi->query("DELETE from tb_jurnal_detail WHERE no_transaksi = '$no_transaksi'");
	$koneksi->query("DELETE from tb_jurnal WHERE no_transaksi = '$no_transaksi'");
?>

<script type="text/javascript">
	window.location.href="?page=jurnalentry";
</script>