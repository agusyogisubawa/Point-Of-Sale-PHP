<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_selaras';

    $koneksi = new mysqli("$host", "$username", "$password", "$dbname")
    or die(mysqli_error($koneksi));
?>

<style>

	@media print{
		input.noPrint{
			display: none;
		}
	}
	
</style>

<table border="1" width="100%" style="border-collapse: collapse;">
	<?php

        	$tgl_awal1 = $_POST['tgl_awal1'];
        	$tgl_akhir1 = $_POST['tgl_akhir1'];

    ?>
	<caption>
		<h3>UD SELARAS<br>
		LAPORAN JURNAL UMUM<br>
		Periode 
		<?php echo date('F Y', strtotime($tgl_awal1)); ?> 
    </h3>
	</caption>
	<thead>
		<br>
		<tr>
			<th rowspan="2">Tanggal</th>
			<th rowspan="2">Nama akun</th>
			<th rowspan="2">Ref</th>
			<th colspan="2">Saldo</th>
		</tr>
		<tr>
			<th>Debet</th>
			<th>Kredit</th>
		</tr>
	</thead>
	<tbody>
        <?php

        	$tgl_awal1 = $_POST['tgl_awal1'];
        	$tgl_akhir1 = $_POST['tgl_akhir1'];

            $sql = $koneksi->query("SELECT * FROM tb_jurnal WHERE tgl_transaksi between '$tgl_awal1' and '$tgl_akhir1' ");
            while ($data = mysqli_fetch_array($sql)) { 
        ?>
            <tr> 
                <td style="text-align: center;"><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                <td><?php echo $data['nama_akun'];?></td>
            	<td><?php echo $data['ref'];?></td>
            	<td><?php echo "Rp". "&nbsp". number_format($data['debet']);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($data['kredit']);?></td>
            </tr>
                <?php 

                @$total_debet = $total_debet + $data['debet'];
                @$total_kredit = $total_kredit + $data['kredit'];
                }
                

                ?>
	</tbody>
	<tr>
		<th colspan="3" style="text-align: center;">Total</th>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_debet); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_kredit); ?>
		</td>
	</tr>
</table>

<br>

<input type="button" class="noPrint" value="Cetak PDF" onclick="window.print()">
