<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>DATA TRANSAKSI JURNAL UMUM</h2>
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
                    if ($data['keterangan']=='Penjualan Barang'|| $data['keterangan']=='Pembelian Barang') {
                                             
                ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                        <td><?php echo $data['no_transaksi'];?></td>
                        <td><?php echo $data['user_id'];?></td>
                        <td><?php echo rupiah($data['total']);?></td>
                        <td><?php echo $data['keterangan'];?></td>
                        
                        <td>
                            <a href="?page=jurnalumum&aksi=lihat&id=<?php echo $data['id']; ?>" class="btn btn-success"> Detail
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