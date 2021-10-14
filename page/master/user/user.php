<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>DATA USER</h2>
    <br>
       <a href="?page=user&aksi=tambah" class="btn btn-primary"><i class="material-icons">add</i> Tambah</a>
</div>
    <div class="body">
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
					<th>Id</th>
                    <th>Nama User</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>                                        	
             </thead>
             <tbody>
                <?php
                    $no = 1; 
                    $sql = $koneksi->query("SELECT * FROM tb_user order by id_user asc");
                    while ($data = mysqli_fetch_array($sql)) :

                    @$username = $_POST ['username'];
                    @$password = $_POST ['password'];
                    @$level = $_POST ['level'];
                    @$login = $_POST ['login'];

                    // cek status login user
                    if ($login) {
                    $sql = $koneksi->query("SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'");

                    $masuk = $sql->num_rows;
                    $data = mysqli_fetch_assoc($sql);


                    if ($data['level'] === 1) {
                        ?> <script>
                             alert('User tidak bisa dihapus karena user sedang login');
                            </script>"
                        <?php
                    }             
                ?>
                 <?php } else { ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['nama'];?></td>
                        <td><?php echo $data['alamat'];?></td>
                        <td><?php echo $data['email'];?></td>
                        <td><?php echo $data['level'];?></td>
                        <td>
                           <a href="?page=user&aksi=ubah&id=<?php echo $data['id_user']; ?>" class="btn btn-warning"> <i class="material-icons">create</i> Edit
                           </a>
                           <a href="?page=user&aksi=hapus&username=<?php echo $data['username']; ?>" class="btn btn-danger"> <i class="material-icons">delete</i> Hapus
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
