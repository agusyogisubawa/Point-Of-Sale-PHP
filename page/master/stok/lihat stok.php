<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>DETAIL PENYESUAIAN STOK</h2>
</div>
    <div class="body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th> 
                    <th>Tanggal</th>                          
                    <th>No kartu</th>
                    <th>Kategori Barang</th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Sisa</th>
                    <th>Keterangan</th>
                </tr>                                           
             </thead>
             <tbody>
                <?php
                    $id = $_GET['id'];
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_stok, tb_barang WHERE tb_stok.kode_barang=tb_barang.kode_barang AND id='$id'");
                    $data = mysqli_fetch_array($sql);                
                ?>
                    <tr> 
                        <td><?php echo $data['id'];?></td>
                        <td><?php echo date('d F Y', strtotime($data['tanggal']));?></td>
                        <td><?php echo $data['no_kartu'];?></td>
                        <td><?php echo $data['kategori_barang'];?></td>
                        <td><?php echo $data['nama_barang'];?></td>
                        <td><?php echo $data['kode_barang'];?></td>
                        <td><?php echo $data['stok_masuk'];?></td>   
                        <td><?php echo $data['stok_keluar'];?></td> 
                        <td><?php echo $data['stok_akhir'];?></td> 
                        <td><?php echo $data['keterangan'];?></td> 
                    </tr>
                </tbody>
                </table>
            </div>
            <a href="?page=stok&aksi=kembali" class="btn btn-primary m-t-15 "><i class="material-icons">keyboard_backspace</i> Kembali</a>
        </div>
        </div>
    </div>
</div>