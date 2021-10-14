<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>LAPORAN BUKU BESAR</h2>
    <br>
       <a class="btn btn-success" data-toggle="modal" data-target="#smallModal6"><i class="material-icons">print</i> Cetak</a>
    <br>
    </div>
        <div class="body">
            <div class="table-responsive">
            <?php
                $sql = $koneksi->query("SELECT * FROM tb_akun");
                while ($data = mysqli_fetch_array($sql)) {		
            ?>
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
	            <thead>
		            <br>
			        <tr>
                        <th colspan="7" style="text-align: left;">Perkiraan akun : <?php echo $data['nama_akun'] ?> <br style="text-align: left;">  No rek : <?php echo $data['kode_akun'] ?> </th>
			        </tr>
                    <tr>
                        <th width="5%">Id</th>
			            <th width="20%">Tanggal</th>
			            <th width="20%">Keterangan</th>
                        <th width="20%">Ref</th>
			            <th width="13%">Debet</th>
			            <th width="13%">Kredit</th>
			            <th width="20%">Saldo</th>
		            </tr>
	            </thead>
	            <tbody>
		            <?php 
                    $kode_akun = $data['kode_akun'];
                    $no=1;
			        $sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun LIKE '$kode_akun'");
			        while($data1=mysqli_fetch_array($sql1)){ 
                    $debet = $data1['debet'];
                    $kredit = $data1['kredit'];
                    $saldo = $debet+$kredit;?>
			        <tr>
                        <td><?php echo $no++; ?></td>
				        <td><?php echo date('d F Y', strtotime($data1['tgl_transaksi'])); ?></td>
				        <td><?php echo $data1['keterangan']; ?></td>
                        <td><?php echo $data['kode_akun']; ?></td>
				        <td><?php echo rupiah($debet); ?></td>
				        <td><?php echo rupiah($kredit); ?></td>
				        <td><?php echo rupiah($saldo); ?></td>
                    </tr>
                    <?php } 
                    ?>
                </tbody>
            </table>
            <?php }?>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal6" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Buku Besar</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/laporan/lap_bukubesar/buku_besar.php" target="blank">

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