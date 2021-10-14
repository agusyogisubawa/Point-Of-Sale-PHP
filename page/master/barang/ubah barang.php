<?php

    $id = $_GET['id'];
    $sql = $koneksi->query("SELECT * FROM tb_barang WHERE id_barang='$id' ");
    $tampil = $sql->fetch_assoc();
    $jenis = $tampil['jenis_barang'];
    $satuan = $tampil['satuan'];
?>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>UBAH DATA BARANG</h2>
</div>
<div class="body">
    <form action="" method="POST">
        <label>Kode barang</label>
        <div class="form-group">
            <div class="form-control">
                <input class="form-control" name="kode" value="<?php echo $tampil ['kode_barang'];?>" readonly/>
            </div>
        </div>
        <label>Nama barang</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="nama" class="form-control" value="<?php echo $tampil ['nama_barang'];?>"/>
            </div>
        </div>
        <label>Satuan</label>
         <div class="form-group">
            <div class="form-line">
                <select name="satuan" class="form-control show-tick" value="<?php echo $tampil ['satuan'];?>"/>
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
                <select name="jenis" class="form-control show-tick" value="<?php echo $tampil ['jenis_barang'];?>"/>
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
                <input type="text" name="stok" class="form-control" value="<?php echo $tampil ['stok_akhir'];?>"/>
            </div>
        </div>
        <label>Harga beli</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="beli" class="form-control" value="<?php echo $tampil ['harga_beli'];?>"/>
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
        $kode = $_POST ['kode'];
        $satuan = $_POST ['satuan'];
        $jenis = $_POST ['jenis'];
        $stok = $_POST ['stok'];
        $beli = $_POST ['beli'];
        $jual = $beli + (25/100 * $beli);

        $sql = $koneksi->query("UPDATE tb_barang SET nama_barang='$nama', kode_barang='$kode', satuan='$satuan', jenis_barang='$jenis', stok_akhir='$stok', harga_beli='$beli', harga_jual='$jual' WHERE id_barang='$id'");

        if ($sql) 
        {
            echo "<script>
                    alert('Ubah data berhasil');
                    document.location='?page=barang';
                </script>";
        }else 
        {
            echo "<script>
                    alert('Ubah data gagal');
                    document.location='?page=barang';
                </script>";
        }
    }

?>