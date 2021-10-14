<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>DETAIL TRANSAKSI PEMBELIAN</h2>
</div>
    <div class="body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th> 
                    <th>Tanggal</th>                          
                    <th>Kode faktur</th>
                    <th>Supplier</th>
                    <th>Alamat</th>
                    <th>Nama barang</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>                                           
             </thead>
             <tbody >
                <?php
                    $id=$_GET['id'];
                    $sql=mysqli_query($koneksi, "SELECT tb_pembelian_detail.id, tb_pembelian.id, tb_pembelian.tgl_transaksi, tb_pembelian.kode_faktur, tb_pembelian.supplier, tb_pembelian.alamat, tb_pembelian.nama_barang,tb_pembelian.satuan, tb_pembelian.jumlah, tb_pembelian.harga, tb_pembelian.total  FROM tb_pembelian JOIN tb_pembelian_detail ON tb_pembelian.kode_faktur=tb_pembelian_detail.kode_faktur WHERE tb_pembelian_detail.id='$id'");
                    while ($data1 = mysqli_fetch_array($sql)) {
                     ?>
                    <tr> 
                        <td><?php echo $data1['id']; ?></td>
                        <td><?php echo date('d F Y', strtotime($data1['tgl_transaksi']));?></td>
                        <td><?php echo $data1['kode_faktur'];?></td>
                        <td><?php echo $data1['supplier'];?></td>
                        <td><?php echo $data1['alamat'];?></td>
                        <td><?php echo $data1['nama_barang'];?></td>
                        <td><?php echo $data1['satuan'];?></td>
                        <td><?php echo $data1['jumlah'];?></td>
                        <td><?php echo rupiah($data1['harga']);?></td>
                        <td><?php echo rupiah($data1['total']);?></td>  
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
            <a href="?page=pembelian2&aksi=kembali" class="btn btn-primary m-t-15 "><i class="material-icons">keyboard_backspace</i> Kembali</a>
        </div>
        </div>
    </div>
</div>