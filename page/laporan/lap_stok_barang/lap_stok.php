<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>LAPORAN STOK BARANG</h2>
    <br>
       <a class="btn btn-success" data-toggle="modal" data-target="#smallModal4"><i class="material-icons">print</i> Cetak</a>

    <br>
</div>
    <div class="body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
					<th rowspan="2" style="vertical-align:middle; text-align:center;">Id</th>
                    <th rowspan="2" style="vertical-align:middle; text-align:center;">Nama barang</th>
                    <th rowspan="2" style="vertical-align:middle; text-align:center;">Kode barang</th>
                    <th rowspan="2" style="vertical-align:middle; text-align:center;">Stok riil</th>
                    <th colspan="2" style="text-align: center;">Jumlah barang</th>
                    <th rowspan="2" style="vertical-align:middle; text-align:center;">Stok akhir</th>
                </tr> 
                <tr>
                    <th>Stok masuk</th>
                    <th>Stok keluar</th>
                </tr>                                       	
             </thead>
             <tbody>
                <?php

                    $no = 1;
                    $sql = $koneksi->query("SELECT * FROM tb_barang order by id_barang");
                    while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['nama_barang'];?></td>
                        <td><?php echo $data['kode_barang'];?></td>
                        <td><?php echo $data['stok_awal'];?></td>
                        <td><?php echo $data['stok_bertambah'];?></td>
                        <td><?php echo $data['stok_berkurang'];?></td>
                        <td><?php echo $data['stok_akhir'];?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal4" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Stok Barang</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/laporan/lap_stok_barang/stok.php" target="blank">

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