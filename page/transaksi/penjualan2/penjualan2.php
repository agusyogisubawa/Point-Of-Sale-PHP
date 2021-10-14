<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>DATA TRANSAKSI PENJUALAN</h2>
</div>
    <div class="body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
					<th>Id</th>
                    <th>Tanggal Transaksi</th>
                    <th>Kode nota</th>
                    <th>Nama pelanggan</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>                                        	
             </thead>
             <tbody>
                <?php
                    $no = 1; 
                    $sql = $koneksi->query("SELECT * FROM tb_penjualan_detail order by id asc");
                    while ($data = mysqli_fetch_array($sql)) :         
                ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                        <td><?php echo $data['kode_nota'];?></td>
                        <td><?php echo $data['pelanggan'];?></td>
                        <td><?php echo rupiah($data['total_dibayar']);?></td>
                        
                        <td>
                            <a href="?page=penjualan2&aksi=lihat&id=<?php echo $data['id']; ?>" class="btn btn-success">Detail
                           </a>
                           <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=penjualan2&aksi=hapus&kode_nota=<?php echo $data['kode_nota']; ?>" class="btn btn-danger">Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; // penutup perulangan while ?>
                </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>