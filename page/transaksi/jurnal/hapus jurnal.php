<?php

	$id = $_GET['id'];
    $tanggal = $_GET ['tanggal'];
    $no_transaksi = $_GET ['no_transaksi'];
    $nama = $_GET ['nama'];
    $jenis = $_GET ['jenis'];
    $debet = $_GET ['debet'];
    $kredit = $_GET ['kredit'];
    $keterangan = $_GET ['keterangan'];

	$sql = $koneksi->query("DELETE FROM tb_jurnal WHERE id='$id' ");

	if ($sql) {
		?>

			<script>
				window.location.href="?page=jurnal&no_transaksi=<?php echo $no_transaksi?>";
			</script>

		<?php
	}

?>