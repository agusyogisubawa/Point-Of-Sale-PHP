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

<table border="1" width="100%" style="border-collapse: collapse;">
	<?php
        $sql20=$koneksi->query("SELECT * FROM tb_jurnal Where tgl_transaksi AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
        $data20 = mysqli_fetch_array($sql20);
    ?>
	<caption>
		<h3>UD SELARAS<br>
		LAPORAN NERACA SALDO<br>
		Periode <?php echo date('F Y', strtotime($data20['tgl_transaksi'])); ?> </h3>
	</caption>
	<thead>
		<br>
		<tr>
			<th>Kode akun</th>
			<th>Nama akun</th>
			<th>Debet</th>
			<th>Kredit</th>
		</tr>
	</thead>
	<tbody>
		<?php

	        @$bln = $_POST['bln'];
	        @$thn = $_POST['thn'];

	        $sql20=$koneksi->query("SELECT * FROM tb_jurnal Where tgl_transaksi AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");

		if (!empty($bln && $thn)){
			$sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='111'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
				while($data1=mysqli_fetch_array($sql1)){ 
					@$total_saldo1 = $total_saldo1+$data1['debet'] - $data1['kredit'];}
			$sql11 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='131'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
				while($data11=mysqli_fetch_array($sql11)){ 
					@$total_saldo11 = $total_saldo11+$data11['debet'] - $data11['kredit'];}
			$sql2 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='211'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
				while($data2=mysqli_fetch_array($sql2)){ 
					@$total_saldo2 = $total_saldo2+$data2['debet'] - $data2['kredit'];}
			$sql3 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='311'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
				while($data3=mysqli_fetch_array($sql3)){ 
					@$total_saldo3 = $total_saldo3+$data3['debet'] - $data3['kredit'];}
			$sql10 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='411'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
				while($data10=mysqli_fetch_array($sql10)){ 
					@$total_saldo10 = $total_saldo10+$data10['debet'] - $data10['kredit'];}
			$sql12 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='412'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
				while($data12=mysqli_fetch_array($sql12)){ 
					@$total_saldo12 = $total_saldo12+$data12['debet'] - $data12['kredit'];}
			$sql4 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='511'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
				while($data4=mysqli_fetch_array($sql4)){ 
					@$total_saldo4 = $total_saldo4+$data4['debet'] - $data4['kredit'];}
			$sql5 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='512'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
				while($data5=mysqli_fetch_array($sql5)){ 
					@$total_saldo5 = $total_saldo5+$data5['debet'] - $data5['kredit'];}
			$sql6 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='513'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
				while($data6=mysqli_fetch_array($sql6)){ 
					@$total_saldo6 = $total_saldo6+$data6['debet'] - $data6['kredit'];}
			$sql7 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='514'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
				while($data7=mysqli_fetch_array($sql7)){ 
					@$total_saldo7 = $total_saldo7+$data7['debet'] - $data7['kredit'];}
			$sql8 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='515'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
				while($data8=mysqli_fetch_array($sql8)){ 
					@$total_saldo8 = $total_saldo8+$data8['debet'] - $data8['kredit'];}
			$sql9 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='516'AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
				while($data9=mysqli_fetch_array($sql9)){ 
					@$total_saldo9 = $total_saldo9+$data9['debet'] - $data9['kredit'];}
			
        ?>
            <tr>
            	<td style="text-align: center;">111</td>
                <td>Kas</td>
				<?php if(@$total_saldo1 >='0'){
					$debet1=$total_saldo1;
					$kredit1='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet1);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit1);?></td>
				<?php } else{
				    $debet1='0';
					$kredit1=@$total_saldo1;?>
                <td><?php echo "Rp". "&nbsp". number_format($debet1);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit1);?></td>
				<?php } ?>    
            </tr>
            <tr>
            	<td style="text-align: center;">131</td>
                <td>Persediaan barang dagang</td>
                <?php if(@$total_saldo11 >='0'){
					$debet11=$total_saldo11;
					$kredit11='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet11);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit11);?></td>
				<?php } else{
				    $debet11='0';
					$kredit11=abs(@$total_saldo11);?>
                <td><?php echo "Rp". "&nbsp". number_format($debet11);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit11);?></td>
				<?php } ?>        
            </tr>
			<tr>
            	<td style="text-align: center;">211</td>
                <td>Utang usaha</td>
                <?php if(@$total_saldo2 >='0'){
					$debet2=$total_saldo2;
					$kredit2='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet2);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit2);?></td>
				<?php } else{
				    $debet2='0';
					$kredit2=abs(@$total_saldo2);?>
                <td><?php echo "Rp". "&nbsp". number_format($debet2);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit2);?></td>
				<?php } ?>         
            </tr>
			<tr>
            	<td style="text-align: center;">311</td>
                <td>Modal</td>
                <?php if(@$total_saldo3 >='0'){
					$debet3=$total_saldo3;
					$kredit3='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet3);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit3);?></td>
				<?php } else{
				    $debet3='0';
					$kredit3=abs(@$total_saldo3);?>
                <td><?php echo "Rp". "&nbsp". number_format($debet3);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit3);?></td>
				<?php } ?>         
            </tr>
           	<tr>
            	<td style="text-align: center;">411</td>
                <td>Penjualan</td>
                <?php if(@$total_saldo10 >='0'){
					$debet10=$total_saldo10;
					$kredit10='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet10);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit10);?></td>
				<?php } else{
				    $debet10='0';
					$kredit10=abs(@$total_saldo10);?>
                <td><?php echo "Rp". "&nbsp". number_format($debet10);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit10);?></td>
				<?php } ?>        
            </tr>
            <tr>
            	<td style="text-align: center;">412</td>
                <td>HPP</td>
                <?php if(@$total_saldo12 >='0'){
					$debet12=$total_saldo12;
					$kredit12='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet12);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit12);?></td>
				<?php } else{
				    $debet12='0';
					$kredit12=abs(@$total_saldo12);?>
                <td><?php echo "Rp". "&nbsp". number_format($debet12);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit12);?></td>
				<?php } ?>        
            </tr>
			<tr>
            	<td style="text-align: center;">511</td>
                <td>Beban gaji</td>
                <?php if(@$total_saldo4 >='0'){
					$debet4=$total_saldo4;
					$kredit4='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet4);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit4);?></td>
				<?php } else{
				    $debet4='0';
					$kredit4=@$total_saldo4;?>
                <td><?php echo "Rp". "&nbsp". number_format($debet4);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit4);?></td>
				<?php } ?>         
            </tr>
			<tr>
            	<td style="text-align: center;">512</td>
                <td>Beban telepon</td>
                <?php if(@$total_saldo5 >='0'){
					$debet5=$total_saldo5;
					$kredit5='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet5);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit5);?></td>
				<?php } else{
				    $debet5='0';
					$kredit5=@$total_saldo5;?>
                <td><?php echo "Rp". "&nbsp". number_format($debet5);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit5);?></td>
				<?php } ?>         
            </tr>
			<tr>
            	<td style="text-align: center;">513</td>
                <td>Beban air</td>
                <?php if(@$total_saldo6 >='0'){
					$debet6=$total_saldo6;
					$kredit6='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet6);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit6);?></td>
				<?php } else{
				    $debet6='0';
					$kredit6=@$total_saldo6;?>
                <td><?php echo "Rp". "&nbsp". number_format($debet6);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit6);?></td>
				<?php } ?>         
            </tr>
			<tr>
            	<td style="text-align: center;">514</td>
                <td>Beban listrik</td>
                <?php if(@$total_saldo7 >='0'){
					$debet7=$total_saldo7;
					$kredit7='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet7);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit7);?></td>
				<?php } else{
				    $debet7='0';
					$kredit7=@$total_saldo7;?>
                <td><?php echo "Rp". "&nbsp". number_format($debet7);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit7);?></td>
				<?php } ?>        
            </tr>
			<tr>
            	<td style="text-align: center;">515</td>
                <td>Beban lain-lain</td>
                <?php if(@$total_saldo8 >='0'){
					$debet8=$total_saldo8;
					$kredit8='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet8);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit8);?></td>
				<?php } else{
				    $debet8='0';
					$kredit8=@$total_saldo8;?>
                <td><?php echo "Rp". "&nbsp". number_format($debet8);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit8);?></td>
				<?php } ?>        
            </tr>
			<tr>
            	<td style="text-align: center;">516</td>
                <td>Beban sewa</td>
                <?php if(@$total_saldo9 >='0'){
					$debet9=$total_saldo9;
					$kredit9='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet9);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit9);?></td>
				<?php } else{
				    $debet9='0';
					$kredit9=@$total_saldo9;?>
                <td><?php echo "Rp". "&nbsp". number_format($debet9);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit9);?></td>
				<?php } ?>        
            </tr>
	
	</tbody>
	<?php
	$total_debet=$debet1+$debet2+$debet3+$debet4+$debet5+$debet6+$debet7+$debet8+$debet9+$debet10+$debet11+$debet12;
	$total_kredit=$kredit1+$kredit2+$kredit3+$kredit4+$kredit5+$kredit6+$kredit7+$kredit8+$kredit9+$kredit10+$kredit11+$kredit12;
	?>
	<tr>
		<th colspan="2" style="text-align: center;">Total Neraca Saldo</th>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_debet); ?>
		</td>
		<td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_kredit); }?>
		</td>
	</tr>
</table>

<br>

<input type="button" class="noPrint" value="Cetak PDF" onclick="window.print()">
