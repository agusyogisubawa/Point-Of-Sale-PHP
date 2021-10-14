<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_selaras';

    $koneksi = new mysqli("$host", "$username", "$password", "$dbname")
	or die(mysqli_error($koneksi));

	@$bln = date($_POST['bln']);
	@$thn = date($_POST['thn']);

?>

<style>

	@media print{
		input.noPrint{
			display: none;
		}
	}
	
</style>
	<?php

        $sql20=$koneksi->query("SELECT * FROM tb_jurnal Where tgl_transaksi AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
        $data20 = mysqli_fetch_array($sql20);
    ?>
<caption>

	<h3 align="center">UD SELARAS<br>
		LAPORAN BUKU BESAR<br>
		Periode <?php echo date('F Y', strtotime($data20['tgl_transaksi'])); ?> </h3>

</caption>

<!-- Tabel Kas -->
<table border="1" width="100%" style="border-collapse: collapse;">	
	<thead>
		<br>
		<tr>
			<tr>
				<th colspan="6" style="text-align: left;">Perkiraan akun : Kas <br style="text-align: left;">  No rek : 111 </th>
			</tr>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Ref</th>
			<th>Debet</th>
			<th>Kredit</th>
			<th>Saldo</th>

		</tr>
	</thead>
	<tbody>
			
		<?php

		$sql2=$koneksi->query("SELECT * FROM tb_jurnal where kode_akun='111' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		$data2=mysqli_fetch_array($sql2);
		if(empty($data2)){?>
			<tr>
				<td colspan="6" style="text-align:center;">Tidak Ada Data Jurnal</td>
			</tr>
			</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		</tr>
		<?php } else { 
			if (!empty($bln && $thn)){
			$sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='111'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		}
			while($data1=mysqli_fetch_array($sql1)){ 
				@$total_saldo =$total_saldo+$data1['debet'] - $data1['kredit'];
				?>
			<tr>
				<td style="text-align: center;"><?php echo date('d F Y', strtotime($data1['tgl_transaksi'])); ?></td>
				<td><?php echo $data1['keterangan']; ?></td>
				<td style="text-align: center;"><?php echo $data1['kode_akun']; ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['debet']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['kredit']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format(@$total_saldo); ?></td>
			</tr>
			<?php 
			@$total_debet += $data1['debet'];
			@$total_kredit +=$data1['kredit'];
			}
		?>		
	</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_debet); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_kredit); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_saldo); }?>
		</td>
		</tr>
</table>
<br>
<!--Akhir Tabel Kas-->

<!--Tabel Persediaan barang dagang-->
<table border="1" width="100%" style="border-collapse: collapse;">	
	<thead>
		<br>
		<tr>
			<tr>
				<th colspan="6" style="text-align: left;">Perkiraan akun : Persediaan barang dagang <br style="text-align: left;">  No rek : 131 </th>
			</tr>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Ref</th>
			<th>Debet</th>
			<th>Kredit</th>
			<th>Saldo</th>
		</tr>
	</thead>
	<tbody>
			
		<?php 
		$sql2=$koneksi->query("SELECT * FROM tb_jurnal where kode_akun='131' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		$data2=mysqli_fetch_array($sql2);
		if(empty($data2)){?>
			<tr>
				<td colspan="6" style="text-align:center;">Tidak Ada Data Jurnal</td>
			</tr>
			</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		</tr>
		<?php } else { 
			if (!empty($bln && $thn)){
			$sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='131'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		}
			while($data1=mysqli_fetch_array($sql1)){ 
				@$total_saldo13 = $total_saldo13 + $data1['debet'] - $data1['kredit']; ?>
			<tr>
				<td style="text-align: center;"><?php echo date('d F Y', strtotime($data1['tgl_transaksi'])); ?></td>
				<td><?php echo $data1['keterangan']; ?></td>
				<td style="text-align: center;"><?php echo $data1['kode_akun']; ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['debet']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['kredit']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format(@$total_saldo13); ?></td>
			</tr>
			<?php 
			@$total_debet13 += $data1['debet'];
			@$total_kredit13 += $data1['kredit'];
			}
		?>		
	</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_debet13); ?>
		</td>
		<td style="font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_kredit13); ?>
		</td>
		<td style="font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_saldo13); }?>
		</td>
		</tr>
</table>
<br>
<!--Akhir Tabel Persediaan barang dagang-->

<!--Tabel Utang Usaha-->
<table border="1" width="100%" style="border-collapse: collapse;">	
	<thead>
		<br>
		<tr>
			<tr>
				<th colspan="6" style="text-align: left;">Perkiraan akun : Utang Usaha <br style="text-align: left;">  No rek : 211 </th>
			</tr>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Ref</th>
			<th>Debet</th>
			<th>Kredit</th>
			<th>Saldo</th>
		</tr>
	</thead>
	<tbody>
			
		<?php $sql2=$koneksi->query("SELECT * FROM tb_jurnal where kode_akun='211' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		$data2=mysqli_fetch_array($sql2);
		if(empty($data2)){?>
			<tr>
				<td colspan="6" style="text-align:center;">Tidak Ada Data Jurnal</td>
			</tr>
			</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		</tr>
		<?php } else { 
			if (!empty($bln && $thn)){
			$sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='211'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		}
			while($data1=mysqli_fetch_array($sql1)){ 
				@$total_saldo3 = $total_saldo3 + $data1['debet'] - $data1['kredit']; ?>
			<tr>
				<td style="text-align: center;"><?php echo date('d F Y', strtotime($data1['tgl_transaksi'])); ?></td>
				<td><?php echo $data1['keterangan']; ?></td>
				<td style="text-align: center;"><?php echo $data1['kode_akun']; ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['debet']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['kredit']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format(abs(@$total_saldo3)); ?></td>
			</tr>
			<?php 
			@$total_debet3 += $data1['debet'];
			@$total_kredit3 += $data1['kredit'];
			}
		?>		
	</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_debet3); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_kredit3); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format(abs($total_saldo3)); }?>
		</td>
		</tr>
</table>
<br>
<!--Akhir Tabel Utang Usaha-->

<!--Tabel Modal-->
<table border="1" width="100%" style="border-collapse: collapse;">	
	<thead>
		<br>
		<tr>
			<tr>
				<th colspan="6" style="text-align: left;">Perkiraan akun : Modal <br style="text-align: left;">  No rek : 311 </th>
			</tr>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Ref</th>
			<th>Debet</th>
			<th>Kredit</th>
			<th>Saldo</th>
		</tr>
	</thead>
	<tbody>
			
		<?php 
		$sql2=$koneksi->query("SELECT * FROM tb_jurnal where kode_akun='311' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		$data2=mysqli_fetch_array($sql2);
		if(empty($data2)){?>
			<tr>
				<td colspan="6" style="text-align:center;">Tidak Ada Data Jurnal</td>
			</tr>
			</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		</tr>
		<?php } else { 
			if (!empty($bln && $thn)){
			$sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='311'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		}
			while($data1=mysqli_fetch_array($sql1)){ 
				@$total_saldo4 = $total_saldo4 + $data1['debet'] - $data1['kredit']; ?>
			<tr>
				<td style="text-align: center;"><?php echo date('d F Y', strtotime($data1['tgl_transaksi'])); ?></td>
				<td><?php echo $data1['keterangan']; ?></td>
				<td style="text-align: center;"><?php echo $data1['kode_akun']; ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['debet']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['kredit']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format(abs(@$total_saldo4)); ?></td>
			</tr>
			<?php 
			@$total_debet4 += $data1['debet'];
			@$total_kredit4 += $data1['kredit'];
			}
		?>		
	</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_debet4); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_kredit4); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format(abs($total_saldo4)); }?>
		</td>
		</tr>
</table>
<br>
<!--Akhir Tabel Modal-->


<!--Tabel Penjualan-->
<table border="1" width="100%" style="border-collapse: collapse;">		
	<thead>
		<br>
		<tr>
			<tr>
				<th colspan="6" style="text-align: left;">Perkiraan akun : Penjualan <br style="text-align: left;">  No rek : 411 </th>
			</tr>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Ref</th>
			<th>Debet</th>
			<th>Kredit</th>
			<th>Saldo</th>
		</tr>
	</thead>
	<tbody>
			
		<?php 
		$sql2=$koneksi->query("SELECT * FROM tb_jurnal where kode_akun='411' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		$data2=mysqli_fetch_array($sql2);
		if(empty($data2)){?>
			<tr>
				<td colspan="6" style="text-align:center;">Tidak Ada Data Jurnal</td>
			</tr>
			</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		</tr>
		<?php } else { 
			if (!empty($bln && $thn)){
			$sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='411'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		}
			while($data1=mysqli_fetch_array($sql1)){ 
				@$total_saldo12 = $total_saldo12 + $data1['debet'] - $data1['kredit']; ?>
			<tr>
				<td style="text-align: center;"><?php echo date('d F Y', strtotime($data1['tgl_transaksi'])); ?></td>
				<td><?php echo $data1['keterangan']; ?></td>
				<td style="text-align: center;"><?php echo $data1['kode_akun']; ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['debet']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['kredit']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format(abs(@$total_saldo12)); ?></td>
			</tr>
			<?php 
			@$total_debet12 += $data1['debet'];
			@$total_kredit12 += $data1['kredit'];
			}
		?>		
	</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_debet12); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_kredit12); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format(abs($total_saldo12)); }?>
		</td>
		</tr>
</table>
<br>
<!--Akhir Tabel Penjualan-->

<!--Tabel HPP-->
<table border="1" width="100%" style="border-collapse: collapse;">		
	<thead>
		<br>
		<tr>
			<tr>
				<th colspan="6" style="text-align: left;">Perkiraan akun : HPP <br style="text-align: left;">  No rek : 412 </th>
			</tr>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Ref</th>
			<th>Debet</th>
			<th>Kredit</th>
			<th>Saldo</th>
		</tr>
	</thead>
	<tbody>
			
		<?php 
		$sql2=$koneksi->query("SELECT * FROM tb_jurnal where kode_akun='412' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		$data2=mysqli_fetch_array($sql2);
		if(empty($data2)){?>
			<tr>
				<td colspan="6" style="text-align:center;">Tidak Ada Data Jurnal</td>
			</tr>
			</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		</tr>
		<?php } else { 
			if (!empty($bln && $thn)){
			$sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='412'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		}
			while($data1=mysqli_fetch_array($sql1)){ 
				@$total_saldo14 = $total_saldo14 + $data1['debet'] - $data1['kredit']; ?>
			<tr>
				<td style="text-align: center;"><?php echo date('d F Y', strtotime($data1['tgl_transaksi'])); ?></td>
				<td><?php echo $data1['keterangan']; ?></td>
				<td style="text-align: center;"><?php echo $data1['kode_akun']; ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['debet']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['kredit']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format(abs(@$total_saldo14)); ?></td>
			</tr>
			<?php 
			@$total_debet14 += $data1['debet'];
			@$total_kredit14 += $data1['kredit'];
			}
		?>		
	</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_debet14); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_kredit14); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format(abs($total_saldo14)); }?>
		</td>
		</tr>
</table>
<br>
<!--Akhir Tabel HPP-->

<!--Tabel Beban Gaji-->
<table border="1" width="100%" style="border-collapse: collapse;">	
	<thead>
		<br>
		<tr>
			<tr>
				<th colspan="6" style="text-align: left;">Perkiraan akun : Beban Gaji <br style="text-align: left;">  No rek : 511 </th>
			</tr>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Ref</th>
			<th>Debet</th>
			<th>Kredit</th>
			<th>Saldo</th>
		</tr>
	</thead>
	<tbody>
			
		<?php 
		$sql2=$koneksi->query("SELECT * FROM tb_jurnal where kode_akun='511' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		$data2=mysqli_fetch_array($sql2);
		if(empty($data2)){?>
			<tr>
				<td colspan="6" style="text-align:center;">Tidak Ada Data Jurnal</td>
			</tr>
			</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		</tr>
		<?php } else { 
			if (!empty($bln && $thn)){
			$sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='511'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		}
			while($data1=mysqli_fetch_array($sql1)){ 
				@$total_saldo6 = $total_saldo6 + $data1['debet'] - $data1['kredit']; ?>
			<tr>
				<td style="text-align: center;"><?php echo date('d F Y', strtotime($data1['tgl_transaksi'])); ?></td>
				<td><?php echo $data1['keterangan']; ?></td>
				<td style="text-align: center;"><?php echo $data1['kode_akun']; ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['debet']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['kredit']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format(@$total_saldo6); ?></td>
			</tr>
			<?php 
			@$total_debet6 += $data1['debet'];
			@$total_kredit6 += $data1['kredit'];
			}
		?>		
	</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_debet6); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_kredit6); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_saldo6); }?>
		</td>
		</tr>
</table>
<br>
<!--Akhir Tabel Beban Gaji-->

<!--Tabel Beban Telepon-->
<table border="1" width="100%" style="border-collapse: collapse;">	
	<thead>
		<br>
		<tr>
			<tr>
				<th colspan="6" style="text-align: left;">Perkiraan akun : Beban Telepon <br style="text-align: left;">  No rek : 512 </th>
			</tr>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Ref</th>
			<th>Debet</th>
			<th>Kredit</th>
			<th>Saldo</th>
		</tr>
	</thead>
	<tbody>
			
		<?php 
		$sql2=$koneksi->query("SELECT * FROM tb_jurnal where kode_akun='512' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		$data2=mysqli_fetch_array($sql2);
		if(empty($data2)){?>
			<tr>
				<td colspan="6" style="text-align:center;">Tidak Ada Data Jurnal</td>
			</tr>
			</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		</tr>
		<?php } else { 
			if (!empty($bln && $thn)){
			$sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='512'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		}
			while($data1=mysqli_fetch_array($sql1)){ 
				@$total_saldo7 = $total_saldo7 + $data1['debet'] - $data1['kredit']; ?>
			<tr>
				<td style="text-align: center;"><?php echo date('d F Y', strtotime($data1['tgl_transaksi'])); ?></td>
				<td><?php echo $data1['keterangan']; ?></td>
				<td style="text-align: center;"><?php echo $data1['kode_akun']; ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['debet']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['kredit']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format(@$total_saldo7); ?></td>
			</tr>
			<?php 
			@$total_debet7 += $data1['debet'];
			@$total_kredit7 += $data1['kredit'];
			}
		?>		
	</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_debet7); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_kredit7); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_saldo7); }?>
		</td>
		</tr>
</table>
<br>
<!--Akhir Tabel Beban Telepon-->

<!--Tabel Beban Air-->
<table border="1" width="100%" style="border-collapse: collapse;">		
	<thead>
		<br>
		<tr>
			<tr>
				<th colspan="6" style="text-align: left;">Perkiraan akun : Beban Air <br style="text-align: left;">  No rek : 513 </th>
			</tr>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Ref</th>
			<th>Debet</th>
			<th>Kredit</th>
			<th>Saldo</th>
		</tr>
	</thead>
	<tbody>
			
		<?php 
		$sql2=$koneksi->query("SELECT * FROM tb_jurnal where kode_akun='513' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		$data2=mysqli_fetch_array($sql2);
		if(empty($data2)){?>
			<tr>
				<td colspan="6" style="text-align:center;">Tidak Ada Data Jurnal</td>
			</tr>
			</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		</tr>
		<?php } else { 
			if (!empty($bln && $thn)){
			$sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='513'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		}
			while($data1=mysqli_fetch_array($sql1)){ 
				@$total_saldo8 = $total_saldo8 + $data1['debet'] - $data1['kredit']; ?>
			<tr>
				<td style="text-align: center;"><?php echo date('d F Y', strtotime($data1['tgl_transaksi'])); ?></td>
				<td><?php echo $data1['keterangan']; ?></td>
				<td style="text-align: center;"><?php echo $data1['kode_akun']; ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['debet']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['kredit']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format(@$total_saldo8); ?></td>
			</tr>
			<?php 
			@$total_debet8 += $data1['debet'];
			@$total_kredit8 += $data1['kredit'];
			}
		?>		
	</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_debet8); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_kredit8); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_saldo8); }?>
		</td>
		</tr>
</table>
<br>
<!--Akhir Tabel Beban Air-->

<!--Tabel Beban Listrik-->
<table border="1" width="100%" style="border-collapse: collapse;">		
	<thead>
		<br>
		<tr>
			<tr>
				<th colspan="6" style="text-align: left;">Perkiraan akun : Beban Listrik <br style="text-align: left;">  No rek : 514 </th>
			</tr>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Ref</th>
			<th>Debet</th>
			<th>Kredit</th>
			<th>Saldo</th>
		</tr>
	</thead>
	<tbody>
			
		<?php 
		$sql2=$koneksi->query("SELECT * FROM tb_jurnal where kode_akun='514' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		$data2=mysqli_fetch_array($sql2);
		if(empty($data2)){?>
			<tr>
				<td colspan="6" style="text-align:center;">Tidak Ada Data Jurnal</td>
			</tr>
			</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		</tr>
		<?php } else { 
			if (!empty($bln && $thn)){
			$sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='514'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		}
			while($data1=mysqli_fetch_array($sql1)){ 
				@$total_saldo9 = $total_saldo9 + $data1['debet'] - $data1['kredit']; ?>
			<tr>
				<td style="text-align: center;"><?php echo date('d F Y', strtotime($data1['tgl_transaksi'])); ?></td>
				<td><?php echo $data1['keterangan']; ?></td>
				<td style="text-align: center;"><?php echo $data1['kode_akun']; ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['debet']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['kredit']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format(@$total_saldo9); ?></td>
			</tr>
			<?php 
			@$total_debet9 += $data1['debet'];
			@$total_kredit9 += $data1['kredit'];
			}
		?>		
	</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_debet9); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_kredit9); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_saldo9); }?>
		</td>
		</tr>
</table>
<br>
<!--Akhir Tabel Beban Listrik-->

<!--Tabel Beban lain-lain-->
<table border="1" width="100%" style="border-collapse: collapse;">		
	<thead>
		<br>
		<tr>
			<tr>
				<th colspan="6" style="text-align: left;">Perkiraan akun : Beban lain-lain <br style="text-align: left;">  No rek : 515 </th>
			</tr>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Ref</th>
			<th>Debet</th>
			<th>Kredit</th>
			<th>Saldo</th>
		</tr>
	</thead>
	<tbody>
			
		<?php 
		$sql2=$koneksi->query("SELECT * FROM tb_jurnal where kode_akun='515' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		$data2=mysqli_fetch_array($sql2);
		if(empty($data2)){?>
			<tr>
				<td colspan="6" style="text-align:center;">Tidak Ada Data Jurnal</td>
			</tr>
			</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		</tr>
		<?php } else { 
			if (!empty($bln && $thn)){
			$sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='515'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		}
			while($data1=mysqli_fetch_array($sql1)){ 
				@$total_saldo10 = $total_saldo10 + $data1['debet'] - $data1['kredit']; ?>
			<tr>
				<td style="text-align: center;"><?php echo date('d F Y', strtotime($data1['tgl_transaksi'])); ?></td>
				<td><?php echo $data1['keterangan']; ?></td>
				<td style="text-align: center;"><?php echo $data1['kode_akun']; ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['debet']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['kredit']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format(@$total_saldo10); ?></td>
			</tr>
			<?php 
			@$total_debet10 += $data1['debet'];
			@$total_kredit10 += $data1['kredit'];
			}
		?>		
	</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_debet10); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_kredit10); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_saldo10); }?>
		</td>
		</tr>
</table>
<br>
<!--Akhir Tabel Beban lain-lain-->

<!--Tabel Beban sewa-->
<table border="1" width="100%" style="border-collapse: collapse;">	
	<thead>
		<br>
		<tr>
			<tr>
				<th colspan="6" style="text-align: left;">Perkiraan akun : Beban sewa <br style="text-align: left;">  No rek : 516 </th>
			</tr>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Ref</th>
			<th>Debet</th>
			<th>Kredit</th>
			<th>Saldo</th>
		</tr>
	</thead>
	<tbody>
			
		<?php 
		$sql2=$koneksi->query("SELECT * FROM tb_jurnal where kode_akun='516' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		$data2=mysqli_fetch_array($sql2);
		if(empty($data2)){?>
			<tr>
				<td colspan="6" style="text-align:center;">Tidak Ada Data Jurnal</td>
			</tr>
			</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		<td style="text-align: center; font-weight: bold;">Rp 0</td>
		</tr>
		<?php } else { 
			if (!empty($bln && $thn)){
			$sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='516'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
		}
			while($data1=mysqli_fetch_array($sql1)){ 
				@$total_saldo11 = $total_saldo11 + $data1['debet'] - $data1['kredit']; ?>
			<tr>
				<td style="text-align: center;"><?php echo date('d F Y', strtotime($data1['tgl_transaksi'])); ?></td>
				<td><?php echo $data1['keterangan']; ?></td>
				<td style="text-align: center;"><?php echo $data1['kode_akun']; ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['debet']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format($data1['kredit']); ?></td>
				<td><?php echo "Rp". "&nbsp". number_format(@$total_saldo11); ?></td>
			</tr>
			<?php 
			@$total_debet11 += $data1['debet'];
			@$total_kredit11 += $data1['kredit'];
			}
		?>		
	</tbody>
		<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_debet11); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_kredit11); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_saldo11); }?>
		</td>
		</tr>
</table>
<br>
<!--Akhir Tabel Beban sewa-->

<input type="button" class="noPrint" value="Cetak PDF" onclick="window.print()">