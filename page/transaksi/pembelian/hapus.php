<?php

	$id = $_GET['id'];
	$kode_faktur = $_GET['kode_faktur'];
	$harga_beli = $_GET['harga_beli'];
	$kode_barang = $_GET['kode_barang'];
	$jumlah = $_GET['jumlah'];

	$sql = $koneksi->query("DELETE FROM tb_pembelian WHERE id = '$id' ");

	$sql2 = $koneksi->query("UPDATE tb_barang SET stok_akhir=(stok_akhir - $jumlah), stok_bertambah = (stok_bertambah - $jumlah) WHERE kode_barang = '$kode_barang' ");

	if ($sql || $sql2) {
		?>

			<script>
				window.location.href="?page=pembelian&kode_faktur=<?php echo $kode_faktur ?>";
			</script>

		<?php
	}

?>