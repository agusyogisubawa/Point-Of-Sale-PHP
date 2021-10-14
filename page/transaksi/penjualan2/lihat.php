<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>DETAIL TRANSAKSI PENJUALAN</h2>
</div>
    <div class="body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th> 
                    <th>Tanggal</th>                          
                    <th>Kode nota</th>
                    <th>Pelanggan</th>
                    <th>Alamat</th>
                    <th>Nama barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>                                           
             </thead>
             <tbody >
                <?php
                    $id=$_GET['id'];
                    $sql=mysqli_query($koneksi, "SELECT tb_penjualan_detail.id, tb_penjualan.id, tb_penjualan.tgl_transaksi, tb_penjualan.kode_nota, tb_penjualan.pelanggan, tb_penjualan.alamat, tb_penjualan.nama_barang, tb_penjualan.jumlah, tb_penjualan.harga, tb_penjualan.total  FROM tb_penjualan JOIN tb_penjualan_detail ON tb_penjualan.kode_nota=tb_penjualan_detail.kode_nota WHERE tb_penjualan_detail.id='$id'");
                    while ($data1 = mysqli_fetch_array($sql)) {
                     ?>
                    <tr> 
                        <td><?php echo $data1['id']; ?></td>
                        <td><?php echo date('d F Y', strtotime($data1['tgl_transaksi']));?></td>
                        <td><?php echo $data1['kode_nota'];?></td>
                        <td><?php echo $data1['pelanggan'];?></td>
                        <td><?php echo $data1['alamat'];?></td>
                        <td><?php echo $data1['nama_barang'];?></td>
                        <td><?php echo $data1['jumlah'];?></td>
                        <td><?php echo rupiah($data1['harga']);?></td>
                        <td><?php echo rupiah($data1['total']);?></td>  
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
            <a href="?page=penjualan2&aksi=kembali" class="btn btn-primary m-t-15 "><i class="material-icons">keyboard_backspace</i> Kembali</a>
        </div>
        </div>
    </div>
</div>