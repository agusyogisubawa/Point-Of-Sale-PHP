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

        	$tgl_awal = $_POST['tgl_awal'];
        	$tgl_akhir = $_POST['tgl_akhir'];

    ?>
	<caption>
		<h3>UD SELARAS<br>
		Jl. Pulau Belitung No. 45 Denpasar<br>
		Telp. 0361 - 9211000</h3>
		<hr>
		<h3>LAPORAN PENJUALAN</h3>
	</caption>
	<thead>
		<br>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Kode nota</th>
			<th>Pelanggan</th>
			<th>Alamat</th>
			<th>Total</th>
			<th>HPP</th>
			<th>Laba</th>
		</tr>
	</thead>
	<tbody>
        <?php

        	$tgl_awal = $_POST['tgl_awal'];
        	$tgl_akhir = $_POST['tgl_akhir'];

            $no = 1; 
            $sql = $koneksi->query("SELECT * FROM tb_penjualan_detail WHERE tgl_transaksi between '$tgl_awal' and '$tgl_akhir' ");
            while ($data = mysqli_fetch_array($sql)) {
         
        ?>
            <tr> 
                <td style="text-align: center;"><?php echo $no++;?></td>
                <td style="text-align: center;"><?php echo date('d F Y', strtotime ($data['tgl_transaksi'] ))?></td>
                <td style="text-align: center;"><?php echo $data['kode_nota'];?></td>
                <td style="text-align: center;"><?php echo $data['pelanggan'];?></td>
                <td style="text-align: center;"><?php echo $data['alamat'];?></td>
                <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($data['total_dibayar']);?></td>
                <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($data['hpp']);?></td>
                <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($data['laba']);?></td>
                   
            </tr>
                <?php 

                @$total_pj = $total_pj + $data['total_dibayar'];
                @$total_hpp = $total_hpp + $data['hpp'];
                @$total_laba = $total_laba + $data['laba'];

                }
                

                ?>
	</tbody>
	<tr>
		<th colspan="5" style="text-align: center;">Total Penjualan</th>
		<td style="text-align: center; font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_pj); ?>
		</td>
		<td style="text-align: center; font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_hpp); ?>
		</td>
		<td style="text-align: center; font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_laba); ?>
		</td>
	</tr>
</table>

<br>

<h4 style="text-align: right; margin-right: 50px;">Denpasar, <?php echo date("d M Y"); ?> <br>
Mengetahui <br>
Pemilik UD SELARAS <br><br><br><br>
Lanang Oka </h4>

<input type="button" class="noPrint" value="Cetak PDF" onclick="window.print()">
