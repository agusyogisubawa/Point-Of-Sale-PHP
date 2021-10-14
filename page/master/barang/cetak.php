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
	<caption>LAPORAN DATA BARANG</caption>
	<thead>
		<tr>
			<th>Id</th>
			<th>Kode</th>
			<th>Nama barang</th>
			<th>Jenis</th>
			<th>Stok</th>
			<th>Harga beli</th>
			<th>Harga jual</th>
		</tr>
	</thead>
	<tbody>
        <?php
            $no = 1; 
            $sql = $koneksi->query("SELECT * FROM tb_barang order by id_barang asc");
            while ($data = mysqli_fetch_array($sql)) :                
        ?>
            <tr> 
                <td><?php echo $no++;?></td>
                <td><?php echo $data['kode_barang'];?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['jenis_barang'];?></td>
                <td><?php echo $data['stok_akhir'];?></td>
                <td><?php echo "Rp". "&nbsp". number_format($data['harga_beli']);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($data['harga_jual']);?></td>    
            </tr>
                <?php endwhile; // penutup perulangan while ?>
	</tbody>
</table>

<br>

<input type="button" class="noPrint" value="Print" onclick="window.print()">
