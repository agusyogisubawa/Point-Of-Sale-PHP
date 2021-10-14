<?php
	
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'db_selaras';

	$koneksi = new mysqli("$host", "$username", "$password", "$dbname");	

	$admin = $_GET['admin'];
	
	$kode_faktur = $_GET['kode_faktur'];
?>

<h4>Struk Belanjaan</h4>

<table>

	<tr>
		<td>UD SELARAS</td>
	</tr>
	<tr>
		<td>Jl. Pulau Belitung No 45, Denpasar Selatan</td>
	</tr>

</table>

<table>

	<hr>

	<?php 

		$sql = $koneksi->query("SELECT * FROM tb_pembelian WHERE kode_faktur='$kode_faktur'");
		$tampil = $sql->fetch_assoc();

	?>

	<tr>
		<td>Kode Faktur &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['kode_faktur']; ?></td>
	</tr>
	<tr>
		<td>Tanggal transaksi &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['tgl_transaksi']; ?></td>
	</tr>
	<tr>
		<td>Supplier &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil['supplier']; ?></td>
	</tr>
	<tr>
		<td>Admin &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $admin; ?></td>
	</tr>

	<td><hr></td>

	<?php 

		$sql2 = $koneksi->query("SELECT * FROM tb_pembelian, tb_pembelian_detail, tb_barang 
			WHERE tb_pembelian.kode_faktur=tb_pembelian_detail.kode_faktur 
			and tb_pembelian.kode_barang=tb_barang.kode_barang
			and tb_pembelian.kode_faktur='$kode_faktur'");

		while ($tampil2 = $sql2->fetch_assoc()) {

	?>

	<tr>
		<td>Nama barang &nbsp&nbsp</td>
		<td>: &nbsp&nbsp <?php echo $tampil2['nama_barang']; ?></td>
		<td><?php echo '&nbsp'.'Rp '.number_format( $tampil2['harga_beli'] ). ',-'.'&nbsp'.'&nbsp'.'x'.'&nbsp'.'&nbsp'.$tampil2['jumlah'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp' ?></td>
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