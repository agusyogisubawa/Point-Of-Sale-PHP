<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>LAPORAN JURNAL UMUM</h2>
    <br>
       <a class="btn btn-success" data-toggle="modal" data-target="#smallModal5"><i class="material-icons">print</i> Cetak</a>

    <br>
</div>
    <div class="body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tanggal</th>
                    <th>No jurnal</th>
                    <th>Ref</th>
                    <th>Deskripsi</th>
                    <th>Nama akun</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                </tr>                                        	
             </thead>
             <tbody>
                <?php
                    $no=1;
                    $sql = $koneksi->query("SELECT * FROM tb_jurnal order by id");
                    while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                        <td><?php echo $data['no_transaksi'];?></td>
                        <td><?php echo $data['ref'];?></td>
                        <td><?php echo $data['keterangan'];?></td>
                        <td><?php echo $data['nama_akun'];?></td>
                        <td><?php echo rupiah($data['debet']);?></td>
                        <td><?php echo rupiah($data['kredit']);?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal5" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Jurnal Umum</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/laporan/lap_jurnal/jurnal.php" target="blank">

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