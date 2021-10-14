<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>TAMBAH DATA USER</h2>
</div>
<div class="body">
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Nama user</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama user" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
        <label>Alamat</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
        <label>Email</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="email" class="form-control" placeholder="Masukkan email" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
        <label>Username</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
        <label>Password</label>
        <div class="form-group">
            <div class="form-line">
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
        <label for="">Level</label>
         <div class="form-group">
            <div class="form-line">
                <select class="form-control show-tick" name="level">
                <option value="">-- Pilih level user --</option>
                <option value="admin">Admin</option>
                <option value="pemilik">Pemilik</option>
                <option value="akunting">Akunting</option>
                </select>
             </div>
        </div>

        <div>
            <button type="submit" name="simpan" value="simpan" class="btn btn-primary m-t-15 "><i class="material-icons">add</i>Tambah
            </button>
            <button type="reset" name="reset" class="btn btn-danger m-t-15 "><i class="material-icons">arrow_back</i>Batal
            </button>
        </div>
    </form>
</div>
</div>
</div>

<?php

        if (isset($_POST['simpan'])) {

            $nama = $_POST ['nama'];
            $alamat = $_POST ['alamat'];
            $username = $_POST ['username'];
            $password = $_POST ['password'];
            $email = $_POST ['email'];
            $level = $_POST ['level'];

            $simpan = mysqli_query($koneksi, "INSERT INTO tb_user (nama, alamat, username, password, email, level)
                VALUES ('$nama', '$alamat', '$username', '$password', '$email', '$level')");

        if ($simpan) 
        {
            echo "<script>
                    alert('Data berhasil disimpan');
                    document.location='?page=user';
                    </script>";
        }else 
        {
            echo "<script>
                    alert('Data gagal disimpan');
                    document.location='?page=user';
                </script>";
        }
    }

?>