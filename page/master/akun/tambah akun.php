<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>TAMBAH DATA AKUN</h2>
</div>
<div class="body">
    <form action="" method="POST">
        <label>Nama akun</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama akun" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
        <label>Kode akun</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="kode" class="form-control" placeholder="Masukkan kode akun" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
        <label>Tipe akun</label>
         <div class="form-group">
            <div class="form-line">
                <select class="form-control show-tick" name="tipe">
                <option value="">-- Pilih tipe akun --</option>
                <option value="Aktiva">Aktiva</option>
                <option value="Kewajiban">Kewajiban</option>
                <option value="Modal">Modal</option>
                <option value="Pendapatan">Pendapatan</option>
                <option value="Beban">Beban</option>
                </select>
             </div>
        </div>
        <label>Kategori akun</label>
         <div class="form-group">
            <div class="form-line">
                <select class="form-control show-tick" name="kategori">
                <option value="">-- Pilih kategori akun --</option>
                <option value="Debet">Debet</option>
                <option value="Kredit">Kredit</option>
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

	  if(isset($_POST['simpan'])) {

        $nama = $_POST ['nama'];
        $kode = $_POST ['kode'];
        $kategori = $_POST ['kategori'];
        $tipe = $_POST ['tipe'];
        
        $sql = $koneksi->query("SELECT * FROM tb_akun WHERE kode_akun='$kode'");
        
        if (mysqli_num_rows($sql) > 0) {

            echo "<script>
                    alert('Kode akun yang anda masukkan sudah ada');
                    document.location='?page=akun';
                    </script>";
        }else {
            $sql = mysqli_query($koneksi, "INSERT INTO tb_akun (nama_akun, kode_akun, kategori_akun, tipe_akun) VALUES ('$nama', '$kode', '$kategori','$tipe')");

            echo "<script>
                alert('Data berhasil disimpan');
                document.location='?page=akun';
                </script>";
        }
    }

?>