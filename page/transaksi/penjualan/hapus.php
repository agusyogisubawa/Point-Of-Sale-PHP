<?php

	$id = $_GET['id'];
	$kode = $_GET['kode_nota'];
	$harga_jual = $_GET['harga_jual'];
	$kode_barang = $_GET['kode_barang'];
	$jumlah = $_GET['jumlah'];

	$sql = $koneksi->query("DELETE FROM tb_penjualan WHERE id = '$id' ");

	$sql2 = $koneksi->query("UPDATE tb_barang SET stok_akhir = (stok_akhir + $jumlah), stok_berkurang = (stok_berkurang + $jumlah) WHERE kode_barang = '$kode_barang' ");

	if ($sql || $sql2) {
		?>

			<script>
				window.location.href="?page=penjualan&kode_nota=<?php echo $kode ?>";
			</script>

		<?php
	}

?>