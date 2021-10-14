<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>LAPORAN LABA RUGI</h2>
    <br>
       <a class="btn btn-success" data-toggle="modal" data-target="#smallModal9"><i class="material-icons">print</i> Cetak</a>

    <br>
</div>
    <div class="body">
        <div class="table-responsive">
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th colspan="3">PENDAPATAN :</th>
                </tr>
                <tr>
                <?php 
                $sql1 = $koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='411'");
                while ($data1=mysqli_fetch_array($sql1)) {
                    @$total_penjualan = $total_penjualan-$data1['debet']+$data1['kredit'];}
                ?>
                    <td style="text-indent: 30px;">Penjualan</td>
                    <td><?php echo "Rp". "&nbsp". number_format($total_penjualan);?></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="1" style="text-indent: 30px; font-weight: bold;">Total pendapatan</td>
                    <td></td>
                    <td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_penjualan);?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">BEBAN :</th>
                </tr>
                <tr>
                <?php 
                $sql2=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='511'");
                $sql3=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='512'");
                $sql4=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='513'");
                $sql5=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='514'");
                $sql6=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='515'");
                $sql7=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='516'");
                $sql8=$koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='412'");
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
                    @$total_b_sewa = $total_b_sewa+$data7['debet'];}
                while ($data8=mysqli_fetch_array($sql8)) {
                    @$total_hpp = $total_hpp + $data8['debet'] - $data8['kredit'];}
                ?>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban sewa</td>
                    <td><?php echo "Rp". "&nbsp". number_format($total_b_sewa);?></td>
                    <th></th>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban gaji</td>
                    <td><?php echo "Rp". "&nbsp". number_format($total_b_gaji);?></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban telepon</td>
                    <td><?php echo "Rp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". number_format($total_b_telepon);?></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban listrik</td>
                    <td><?php echo "Rp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". number_format($total_b_listrik);?></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban air</td>
                    <td><?php echo "Rp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". number_format($total_b_air);?></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban lain-lain</td>
                    <td><?php echo "Rp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp"."&nbsp". "&nbsp". "&nbsp". number_format($total_b_lain);?></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">HPP</td>
                    <td><?php echo "Rp". "&nbsp". number_format($total_hpp);?></td>
                    <td></td>
                </tr>
                    <?php
                        @$saldo_beban = $total_b_gaji+$total_b_telepon+$total_b_air+$total_b_listrik+$total_b_lain+$total_b_sewa+$total_hpp;
                        @$saldo_keseluruhan = $total_penjualan-$saldo_beban;
                    ?>  
                <tr>
                    <td colspan="1" style="text-indent: 30px; font-weight: bold;">Total beban</td>
                    <td></td>
                    <td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($saldo_beban);?>
                    </td>
                </tr>

                <tr>
                    <td colspan="1" style="text-indent: 30px; font-weight: bold;">Laba/Rugi Bersih</td>
                    <td></td>
                    <td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". "&nbsp". "&nbsp". number_format($saldo_keseluruhan);?>
                    </td>
                </tr>

                </tr>
                </tr>                            	
             </thead>
        </table>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="smallModal9" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Laba Rugi</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/laporan/lap_labarugi/labarugi.php" target="blank">

                <label for="">Pilih bulan</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="bln">
                            <?php
                                $bln = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

                                for($a=1; $a<=12; $a++){

                                echo "<option value=$a>$bln[$a]</option>";
                                echo "</selected>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

               <label for="">Pilih tahun</label>
                <div class="form-group">
                    <div class="form-line">
                    <div class="form-line">
                        <select name="thn">
                            <?php
                            $thn = date('Y');
                            for ($x = 2020; $x <= $thn; $x++) {
                            
                            echo "<option value=$x>$thn </option>"; }
                            echo "</selected>";
                            
                            ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary-link waves-effect">Cetak</button>
                <button type="button" class="btn btn-primary-link waves-effect" data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>