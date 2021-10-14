<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>DATA AKUN</h2>
    <br>
       <a href="?page=akun&aksi=tambah" class="btn btn-primary"><i class="material-icons">add</i> Tambah</a>
    <br>
</div>
    <div class="body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
					<th>Id</th>
                    <th>Nama akun</th>
                    <th>Kode akun</th>
                    <th>Tipe akun</th>
                    <th>Kategori akun</th>
                    <th>Aksi</th>
                </tr>                                        	
             </thead>
             <tbody>
                <?php
                    $no = 1; 
                    $sql = $koneksi->query("SELECT * FROM tb_akun order by id asc");
                    while ($data = mysqli_fetch_array($sql)) :             
                ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['nama_akun'];?></td>
                        <td><?php echo $data['kode_akun'];?></td>
                        <td><?php echo $data['tipe_akun'];?></td>
                        <td><?php echo $data['kategori_akun'];?></td>
                        <td>
                           <a href="?page=akun&aksi=ubah&id=<?php echo $data['id']; ?>" class="btn btn-warning"> <i class="material-icons">create</i> Edit
                           </a>
                            <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=akun&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger"> <i class="material-icons">delete</i> Hapus
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