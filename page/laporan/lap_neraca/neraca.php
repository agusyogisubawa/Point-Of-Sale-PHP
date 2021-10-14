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
		LAPORAN NERACA<br>
		Periode <?php echo date('F Y', strtotime($data20['tgl_transaksi'])); ?> </h3>
	</caption>
	<thead>
		<br>
		<tr>
			<th colspan="2" style="text-align: left;">AKTIVA</th>
			<th colspan="2" style="text-align: left;">PASIVA</th>
		</tr>
		<tr>
            <?php

                @$bln = $_POST['bln'];
                @$thn = $_POST['thn'];

                $sql20=$koneksi->query("SELECT * FROM tb_jurnal Where tgl_transaksi AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");

                $sql1=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='111' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql2=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='211' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql3=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='511' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql4=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='512' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql5=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='513' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql6=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='514' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql7=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='515' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql8=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='516' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql9=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='411' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql10=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='412' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                
                while ($data1=mysqli_fetch_array($sql1)) {
                    @$total_saldo_kas = $total_saldo_kas+$data1['debet'] - $data1['kredit'];}
                while ($data2=mysqli_fetch_array($sql2)) {
                    @$total_saldo_utang =$total_saldo_utang + $data2['debet']+$data2['kredit'];}

                while ($data3=mysqli_fetch_array($sql3)) {
                    @$total_b_gaji = $total_b_gaji+$data3['debet'] - $data3['kredit'];}
                while ($data4=mysqli_fetch_array($sql4)) {
                    @$total_b_telepon = $total_b_telepon+$data4['debet'] - $data4['kredit'];}
                while ($data5=mysqli_fetch_array($sql5)) {
                    @$total_b_air = $total_b_air+$data5['debet'] - $data5['kredit'];}
                while ($data6=mysqli_fetch_array($sql6)) {
                    @$total_b_listrik = $total_b_listrik+$data6['debet'] - $data6['kredit'];}
                while ($data7=mysqli_fetch_array($sql7)) {
                    @$total_b_lain = $total_b_lain+$data7['debet'] - $data7['kredit'];}
                while ($data8=mysqli_fetch_array($sql8)) {
                    @$total_b_sewa = $total_b_sewa+($data8['debet']);}
                while ($data9=mysqli_fetch_array($sql9)) {
                    @$total_penjualan = $total_penjualan-$data9['debet'] + $data9['kredit'];}
                while ($data10=mysqli_fetch_array($sql10)) {
                    @$total_b_hpp = $total_b_hpp+($data10['debet']);}
                
                ?>
                    <td style="text-indent: 30px;">Kas</td>
                    <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($total_saldo_kas);?></td>
                    <td style="text-indent: 30px;">Utang usaha</td>
                    <td style="text-align: center;"><?php echo "Rp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". number_format($total_saldo_utang);?></td>
                </tr>
                <tr><?php 
                $sql3=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='131' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql4=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='311' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                while ($data3=mysqli_fetch_array($sql3)) {
                    @$total_saldo_barang += $data3['debet']-$data3['kredit'];}
                while ($data4=mysqli_fetch_array($sql4)) {
                    @$total_saldo_modal += $data4['kredit']+($total_penjualan)-($total_b_gaji+$total_b_telepon+$total_b_air+$total_b_listrik+$total_b_lain+$total_b_hpp+$total_b_sewa);}
                ?>
                    <td style="text-indent: 30px;">Persediaan barang dagang</td>
                    <td style="text-align: center;"><?php echo "Rp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". number_format($total_saldo_barang);?></td>
                    <td style="font-weight: bold;">MODAL</td>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="text-indent: 30px;">Modal akhir</td>
                        <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($total_saldo_modal);?></td>
                    </tr>
                </tr>
                <?php
                @$saldo_kasdanbarang = $total_saldo_kas+$total_saldo_barang;
                @$saldo_utangdanmodal = $total_saldo_utang+$total_saldo_modal;
                ?>  
	</thead>
	<tr>
		<th colspan="1" style="text-align: left;" "text-indent: 30px;">Total aktiva</th>
		<td style="text-align: center; font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($saldo_kasdanbarang);?>
		</td>
		<th colspan="1" style="text-align: left;" "text-indent: 30px;">Total pasiva</th>
		<td style="text-align: center; font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($saldo_utangdanmodal);?>
		</td>
	</tr>
</table>

<br>

<input type="button" class="noPrint" value="Cetak PDF" onclick="window.print()">
