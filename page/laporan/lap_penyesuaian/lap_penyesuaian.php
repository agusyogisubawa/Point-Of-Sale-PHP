<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>LAPORAN STOK OPNAME</h2>
    <br>
       <a class="btn btn-success" data-toggle="modal" data-target="#smallModal3"><i class="material-icons">print</i> Cetak</a>

    <br>
</div>
    <div class="body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr >
					<th rowspan = "2" style="vertical-align:middle; text-align:center;">Id</th>
                    <th rowspan = "2" style="vertical-align:middle; text-align:center;">Tanggal</th>
                    <th rowspan = "2" style="vertical-align:middle; text-align:center;">No bukti</th>
                    <th rowspan = "2" style="vertical-align:middle; text-align:center;">Stok riil</th>
                    <th colspan = "2" style="text-align: center;">Selisih</th>
                    <th rowspan = "2" style="vertical-align:middle; text-align:center;">Stok akhir</th>
                    <th rowspan = "2" style="vertical-align:middle; text-align:center;">Kategori</th>
                </tr>
                <tr>
                    <th style="text-align: center;">Masuk</th>
                    <th style="text-align: center;">Keluar</th>
                </tr>                                        	
             </thead>
             <tbody>
                <?php

                    $no = 1;
                    $sql1 = $koneksi->query("SELECT * FROM tb_barang, tb_stok WHERE tb_barang.nama_barang=tb_stok.nama_barang");
                    $sql = $koneksi->query("SELECT * FROM tb_stok order by id");
                    while ($data = mysqli_fetch_array($sql)) {
                        $data2 = mysqli_fetch_array($sql1); 
                        @$stok_akhir = $data2['stok_awal'] + $data['stok_masuk'] - $data['stok_keluar'];
                ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo date('d F Y', strtotime($data['tanggal']));?></td>
                        <td><?php echo $data['no_kartu'];?></td>
                        <td><?php echo $data2['stok_awal'];?></td>
                        <td><?php echo $data['stok_masuk'];?></td>
                        <td><?php echo $data['stok_keluar'];?></td>
                        <td><?php echo $stok_akhir;?></td>
                        <td><?php echo $data['kategori_barang'];?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal3" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Stok Opname</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/laporan/lap_penyesuaian/penyesuaian.php" target="blank">

               <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal1" class="form-control"/>
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir1" class="form-control"/>
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