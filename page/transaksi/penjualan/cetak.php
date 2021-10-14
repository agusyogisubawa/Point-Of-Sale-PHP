<?php
	
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'db_selaras';

	$koneksi = new mysqli("$host", "$username", "$password", "$dbname");	

	$admin = $_GET['admin'];
	
	$kode = $_GET['kode_nota'];
?>

<h4>Nota Penjualan</h4>

<table>

	<tr>
		<td>UD SELARAS</td>
	</tr>
	<tr>
		<td>Jl. Pulau Belitung No 45, Denpasar Selatan<br>
		Telp. 0361 - 9211000</td>
	</tr>

</table>

<table>

	<hr>

	<?php 

		$sql = $koneksi->query("SELECT * FROM tb_penjualan WHERE kode_nota='$kode'");
		$tampil = $sql->fetch_assoc();

	?>

	<tr>
		<td>Kode Nota &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['kode_nota']; ?></td>
	</tr>
	<tr>
		<td>Tanggal transaksi &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['tgl_transaksi']; ?></td>
	</tr>
	<tr>
		<td>Pelanggan &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['pelanggan']; ?></td>
	</tr>
	<tr>
		<td>Admin &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $admin; ?></td>
	</tr>

	<td><hr></td>

	<?php 

		$sql2 = $koneksi->query("SELECT * FROM tb_penjualan, tb_penjualan_detail, tb_barang 
			WHERE tb_penjualan.kode_nota=tb_penjualan_detail.kode_nota 
			and tb_penjualan.kode_barang=tb_barang.kode_barang
			and tb_penjualan.kode_nota='$kode'");

		while ($tampil2 = $sql2->fetch_assoc()) {

	?>

	<tr>
		<td>Nama barang &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil2['nama_barang']; ?></td>
		<td><?php echo '&nbsp'.'Rp '.number_format( $tampil2['harga_jual'] ). ',-'.'&nbsp'.'&nbsp'.'x'.'&nbsp'.'&nbsp'.$tampil2['jumlah'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp' ?></td>
		<td>= &nbsp&nbsp <?php echo 'Rp '.number_format ($tampil2['total'] ). ',-'; ?></td>
	</tr>

	<?php 
		@$total_dibayar = $tampil2['total_dibayar'];
		}
	?>
	<tr>
		<td colspan="3">Total bayar &nbsp&nbsp </td>
		<td>= &nbsp&nbsp <?php echo 'Rp '.number_format (@$total_dibayar). ',-'; ?></td>
	</tr>

</table>

<hr>

<table>

	<tr>
		<td>Barang yang sudah dibeli, tidak dapat dikembalikan</td>
	</tr>

</table>

<hr>

<input type="button" value="Print" onclick="window.print()">