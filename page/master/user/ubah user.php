<?php

    $id = $_GET['id'];
    $sql = $koneksi->query("SELECT * from tb_user WHERE id_user='$id' ");
    $tampil = $sql->fetch_assoc();
    $level = $tampil['level'];
   
?>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>UBAH DATA USER</h2>
</div>
<div class="body">
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Nama user</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="nama" class="form-control" value="<?php echo $tampil ['nama'];?>"/>
            </div>
        </div>
        <label>Alamat</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="alamat" class="form-control"  value="<?php echo $tampil ['alamat'];?>"/>
            </div>
        </div>
        <label>Email</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="email" class="form-control"  value="<?php echo $tampil ['email'];?>"/>
            </div>
        </div>
        <label>Username</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="username" class="form-control"  value="<?php echo $tampil ['username'];?>"/>
            </div>
        </div>

        <label>Password</label>
        <div class="form-group">
            <div class="form-line">
                <input type="password" name="password" class="form-control"  value="<?php echo $tampil ['password'];?>"/>
            </div>
        </div>

        <label>Level</label>
         <div class="form-group">
            <div class="form-line">
                <select name="level" class="form-control show-tick" >
                <option value="">-- Pilih level user --</option>
                <option value="admin" <?php if ($level=='admin') {echo "selected";}  ?>>admin</option>
                <option value="pemilik" <?php if ($level=='pemilik') {echo "selected";}  ?>>pemilik</option>
                <option value="akunting" <?php if ($level=='akunting') {echo "selected";}  ?>>akunting</option>
                </select>
             </div>
        </div>

        <div>
            <button type="submit" name="ubah" value="ubah" class="btn btn-warning m-t-15 waves-effect">Ubah
            </button>
        </div>
    </form>
</div>
</div>
</div>

<?php
    
        if (isset($_POST['ubah']))  {

        $nama = $_POST ['nama'];
        $alamat = $_POST ['alamat'];
        $email = $_POST ['email'];
        $username = $_POST ['username'];
        $password = $_POST ['password'];
        $level = $_POST ['level'];

        $sql = $koneksi->query("UPDATE tb_user SET nama='$nama', alamat='$alamat', email='$email', username='$username', password='$password', level='$level'  WHERE id_user='$id'");

        if ($sql) {
            ?>

                <script type="text/javascript">
                    alert ("Data berhasil diubah");
                    window.location.href="?page=user";
                </script>

            <?php
        }
    }

?>