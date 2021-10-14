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
        LAPORAN LABA RUGI<br>
        Periode <?php echo date('F Y', strtotime($data20['tgl_transaksi'])); ?> </h3>
    </caption>
    <thead>
        <br>
        <tr>
            <th colspan="3" style="text-align: left;">PENDAPATAN :</th>
                </tr>
                <tr><?php 
                $sql1=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='411' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                while ($data1=mysqli_fetch_array($sql1)) {
                    @$total_saldo_penjualan = $total_saldo_penjualan-$data1['debet'] + $data1['kredit'];}
                ?>
                    <td style="text-align: left; text-indent: 30px;">Penjualan</td>
                    <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($total_saldo_penjualan);?></td>
                    <th></th>
                </tr>
                <tr>
                    <th colspan="1" style="text-align: center;">Total pendapatan</th>
                    <th></th>
                    <td style="text-align: center; font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_saldo_penjualan);?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3" style="text-align: left;">BEBAN :</th>
                </tr>
                <tr>
                <?php 
                
                @$bln = $_POST['bln'];
                @$thn = $_POST['thn'];

                $sql20=$koneksi->query("SELECT * FROM tb_jurnal Where tgl_transaksi AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");

                $sql2=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='511' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql3=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='512' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql4=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='513' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql5=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='514' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql6=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='515' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql7=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='516' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                $sql8 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='412' AND MONTH(tgl_transaksi)='$bln' AND YEAR(tgl_transaksi)='$thn'");
                while ($data2=mysqli_fetch_array($sql2)) {
                    @$total_b_gaji = $total_b_gaji+$data2['debet'] - $data2['kredit'];}
                while ($data3=mysqli_fetch_array($sql3)) {
                    @$total_b_telepon = $total_b_telepon+$data3['debet'] - $data3['kredit'];}
                while ($data4=mysqli_fetch_array($sql4)) {
                @$total_b_air = $total_b_air+$data4['debet'] - $data4['kredit'];}
                while ($data5=mysqli_fetch_array($sql5)) {
                @$total_b_listrik = $total_b_listrik+$data5['debet'] - $data5['kredit'];}
                while ($data6=mysqli_fetch_array($sql6)) {
                @$total_b_lain = $total_b_lain+$data6['debet'] - $data6['kredit'];}
                while ($data7=mysqli_fetch_array($sql7)) {
                @$total_b_sewa = $total_b_sewa+($data7['debet']);}
                while ($data8=mysqli_fetch_array($sql8)) {
                    @$total_hpp = $total_hpp + $data8['debet'] - $data8['kredit'];}
                ?>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban gaji</td>
                    <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($total_b_gaji);?></td>
                    <th></th>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban telepon</td>
                    <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($total_b_telepon);?></td>
                    <th></th>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban air</td>
                    <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($total_b_air);?></td>
                    <th></th>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban listrik</td>
                    <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($total_b_listrik);?></td>
                    <th></th>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban lain-lain</td>
                    <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($total_b_lain);?></td>
                    <th></th>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban sewa</td>
                    <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($total_b_sewa);?></td>
                    <th></th>
                </tr>  
                <tr>
                    <td style="text-indent: 30px;">HPP</td>
                    <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($total_hpp);?></td>
                    <th></th>
                </tr>
                    
                </tr>
                <?php
                @$saldo_beban = $total_b_gaji+$total_b_telepon+$total_b_air+$total_b_listrik+$total_b_lain+$total_b_sewa+$total_hpp;
                @$saldo_keseluruhan = $total_saldo_penjualan-$saldo_beban;
                ?>  
    </thead>
    <tr>
        <th colspan="1" style="text-align: center;">Total beban</th>
        <td></td>
        <td style="text-align: center; font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($saldo_beban);?>
        </td>
    </tr>
    <tr>
        <th colspan="1" style="text-align: center;">Laba/Rugi Bersih</th>
        <td></td>
        <td style="text-align: center; font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($saldo_keseluruhan);?>
        </td>
    </tr>
</table>

<br>

<input type="button" class="noPrint" value="Cetak PDF" onclick="window.print()">
