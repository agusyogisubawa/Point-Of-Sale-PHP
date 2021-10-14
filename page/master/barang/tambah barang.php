<?php
    $mysqli = new mysqli ("localhost", "root", "", "db_selaras");
    $result = $mysqli->query("SELECT * FROM tb_jenis_barang");
    $result2 = $mysqli->query("SELECT * FROM tb_satuan");
    $row = $result->fetch_assoc();
?>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>TAMBAH DATA BARANG</h2>
</div>
<div class="body">
    <form action="" method="POST">
        <label>Nama barang</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama barang" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
        <label>Kode barang</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="kode" class="form-control" placeholder="Masukkan kode barang" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
        <label>Satuan</label>
         <div class="form-group">
            <div class="form-line">
                <select class="form-control show-tick" name="satuan">
                <option value="">-- Pilih satuan --</option>
                        <?php
                            $sql = $koneksi->query("SELECT * FROM tb_satuan order by id_barang");
                            if (mysqli_num_rows($sql) !=0) {
                                while ($row = mysqli_fetch_assoc($sql)) {
                                    echo '<option>'.$row['satuan'].'</option>';
                                }
                            }
                        ?>
                </select>
             </div>
        </div>
        <label>Jenis barang</label>
         <div class="form-group">
            <div class="form-line">
                <select class="form-control show-tick" name="jenis">
                <option value="">-- Pilih jenis barang --</option>
                        <?php
                            $sql = $koneksi->query("SELECT * FROM tb_jenis_barang order by id_barang");
                            if (mysqli_num_rows($sql) !=0) {
                                while ($row = mysqli_fetch_assoc($sql)) {
                                    echo '<option>'.$row['jenis_barang'].'</option>';
                                }
                            }
                        ?>
                </select>
             </div>
        </div>
        <label>Stok</label>
        <div class="form-group">
            <div class="form-line">
                <input type="number" name="stok" class="form-control" placeholder="Masukkan stok" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
        <label>Harga beli</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="beli" class="form-control" placeholder="Masukkan harga beli" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
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

	if (isset($_POST['simpan']))  {

        $nama = $_POST ['nama'];
        $kode = $_POST ['kode'];
        $satuan = $_POST ['satuan'];
        $jenis = $_POST ['jenis'];
        $stok = $_POST ['stok'];
        $beli = $_POST ['beli'];
        $jual = $beli + (25/100 * $beli);

        $sql = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barang='$kode' or nama_barang='$nama'");

        if (mysqli_num_rows($sql) > 0) {

            echo "<script>
                    alert('Kode dan nama barang yang anda masukkan sudah ada');
                    document.location='?page=barang';
                    </script>";
        }else {
            $sql = mysqli_query($koneksi, "INSERT INTO tb_barang (nama_barang, kode_barang, satuan, jenis_barang, stok, stok_akhir, harga_beli, harga_jual) VALUES ('$nama', '$kode', '$satuan', '$jenis', '$stok', '$stok', '$beli', '$jual')");

            echo "<script>
                alert('Data berhasil disimpan');
                document.location='?page=barang';
                </script>";
        }

	}

?>