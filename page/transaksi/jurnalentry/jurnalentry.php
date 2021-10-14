<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>DATA TRANSAKSI JURNAL ENTRY</h2>
    <br>
        <div class="btn-group" role="group">
            <a href="#" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">menu</i> Tindakan</a>
            <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                <li><a href="?page=saldo">Saldo awal</a></li>
            </ul>
        </div>
    <br>
</div>
    <div class="body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tanggal</th>
                    <th>No Jurnal</th>
                    <th>User Id</th>
                    <th>Total</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>                                        	
             </thead>
             <tbody>
                <?php
                    $no = 1; 
                    $sql = $koneksi->query("SELECT * FROM tb_jurnal_detail order by id");
                    while ($data = mysqli_fetch_array($sql)) : 

                    if ($data['total_debet']!==$data['total_kredit']) {
                         ?> <script>
                             alert('Total Debet dan Kredit belum balance \r \r <?php while ($tampil2 = $sql1->fetch_assoc()) {
                                ?> No transaksi = <?php echo $tampil2["no_transaksi"];?>\r <?php }; ?>');
                            </script>"
                        <?php
                        } 
                    if ($data['keterangan']=='Penjualan Barang'|| $data['keterangan']=='Pembelian Barang') {  ?>    
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                        <td><?php echo $data['no_transaksi'];?></td>
                        <td><?php echo $data['user_id'];?></td>
                        <td><?php echo rupiah($data['total']);?></td>
                        <td><?php echo $data['keterangan'];?></td>
                        <td>
                            <a href="?page=jurnalentry&aksi=lihat&id=<?php echo $data['id']; ?>" class="btn btn-success">Detail
                            </a>
                            <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=jurnalentry&aksi=hapus&no_transaksi=<?php echo $data['no_transaksi']; ?>" class="btn btn-danger">Hapus
                            </a>
                        </td>
                    </tr>      
                <?php } else { ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                        <td><?php echo $data['no_transaksi'];?></td>
                        <td><?php echo $data['user_id'];?></td>
                        <td><?php echo rupiah($data['total']);?></td>
                        <td><?php echo $data['keterangan'];?></td>
                        <td>
                            <a href="?page=jurnalentry&aksi=lihat&id=<?php echo $data['id']; ?>" class="btn btn-success">Detail
                           </a>
                            <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=jurnalentry&aksi=hapus&no_transaksi=<?php echo $data['no_transaksi']; ?>" class="btn btn-danger">Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } endwhile; // penutup perulangan while ?>
                </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>