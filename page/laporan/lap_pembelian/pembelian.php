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
		Jl. Pulau Belitung No. 45 Denpasar<br>
		Telp. 0361 - 9211000</h3>
		<hr>
		<h3>LAPORAN PEMBELIAN</h3>
	</caption>
	<thead>
		<br>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Kode faktur</th>
			<th>Supplier</th>
			<th>Alamat</th>
			<th>Qty</th>
			<th>Harga</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
        <?php

        	$tgl_awal1 = $_POST['tgl_awal1'];
        	$tgl_akhir1 = $_POST['tgl_akhir1'];

            $no = 1; 
            $sql = $koneksi->query("SELECT * FROM tb_pembelian WHERE tgl_transaksi between '$tgl_awal1' and '$tgl_akhir1'");
            while ($data = mysqli_fetch_array($sql)) {  
            
        ?>
            <tr> 
                <td style="text-align: center;"><?php echo $no++;?></td>
                <td style="text-align: center;"><?php echo date('d F Y', strtotime ($data['tgl_transaksi'] ))?></td>
                <td style="text-align: center;"><?php echo $data['kode_faktur'];?></td>
                <td><?php echo $data['supplier'];?></td>
                <td><?php echo $data['alamat'];?></td>
                <td style="text-align: center;"><?php echo $data['jumlah'];?></td>
                <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($data['harga']);?></td>
                <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($data['total']);?></td>   
            </tr>
                <?php 

                @$total_pembelian = $total_pembelian + $data['total'];

                }
                

                ?>
	</tbody>
	<tr>
		<th colspan="7" style="text-align: center;">Total Pembelian</th>
		<td style="text-align: center; font-weight: bold;"><?php echo "Rp". "&nbsp". number_format(@$total_pembelian); ?>
		</td>
		</td>
	</tr>
</table>

<br>

<h4 style="text-align: right; margin-right: 50px;">Denpasar, <?php echo date("d M Y"); ?> <br>
Mengetahui <br>
Pemilik UD SELARAS <br><br><br><br>
Lanang Oka </h4>

<input type="button" class="noPrint" value="Cetak PDF" onclick="window.print()">
