<?php

	$id = $_GET['id'];
	$koneksi->query("DELETE from tb_jurnal_detail WHERE id = '$id'");

?>

<script type="text/javascript">
	window.location.href="?page=jurnalumum";
</script>