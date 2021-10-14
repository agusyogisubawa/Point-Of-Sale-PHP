<?php  

    $query1=mysqli_query($koneksi,"SELECT max(no_kartu) as kodeTerbesar FROM tb_stok");
    $data=mysqli_fetch_array($query1);

    $no_kartu=$data['kodeTerbesar'];

        function kode_random2($lenght) {
        $data = '12345';
        $string = 'KS-';

        for ($i=0; $i < $lenght; $i++) { 
            $pos = rand(0, strlen($data)-1);
            $string .= $data{$pos};
        }

        return $string;
    }

    $no_kartu = kode_random2(5);
?>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>TAMBAH PENYESUAIAN STOK</h2>
</div>
<div class="body">
    <form action="" method="POST">
        <label>No kartu</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="no_kartu" value="<?php echo $no_kartu; ?>" class="form-control" readonly>
            </div>
        </div>
        <label>Nama barang</label>
        <div class="form-group">
            <div class="form-line">
                <select name="nama" id="nama" class="form-control" onchange='changeValue(this.value)' >;
                <option value="">-- Pilih nama barang --</option>
                    <?php
                        
                        $sql = $koneksi->query( "SELECT * FROM tb_barang order by id_barang desc");
                        $result = mysqli_query($koneksi, "SELECT * FROM tb_barang"); 
                        $jsArray = "var prdName = new Array(); \n";

                        while ($row = mysqli_fetch_array($result)) {
                         echo '<option name="nama"  value="' . $row['nama_barang'] . '">' . $row['nama_barang'] . '</option>'; 
                        $jsArray .= "prdName['" . $row['nama_barang'] . "'] = {kode_barang: '" . addslashes($row['kode_barang']) . "' };\n";
                         } 
                    ?>
                </select>  
            </div>
        </div>
        <label>Kode barang</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="kode_barang" id=kode_barang class="form-control" placeholder="Masukkan kode barang" readonly>
            </div>
        </div>
        <label>Kategori barang</label>
        <div class="form-group">
            <div class="form-line">
            <select class="form-control show-tick" name="kategori">
                <option value="">-- Pilih kategori barang --</option>
                <option value="Barang rusak">Barang rusak</option>
                <option value="Barang ditukar">Barang ditukar</option>
            </select>
            </div>
        </div>
        <label>Stok masuk</label>
        <div class="form-group">
            <div class="form-line">
                <input type="number" name="masuk" class="form-control" placeholder="Masukkan stok masuk" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
        <label>Stok keluar</label>
        <div class="form-group">
            <div class="form-line">
                <input type="number" name="keluar" class="form-control" placeholder="Masukkan stok keluar" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
        <label>Keterangan</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="keterangan" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"> 
            </div>
        </div>
        <div>
            <button type="submit" name="simpan" value="simpan" class="btn btn-primary m-t-15 "><i class="material-icons">add</i>Tambah
            </button>
            <button type="reset" name="reset" value="reset" class="btn btn-danger m-t-15 "><i class="material-icons">keyboard_backspace</i>Batal
            </button>
        </div>
</form>
</div>
</div>
</div>

<script type="text/javascript"> 
<?php echo $jsArray; ?>
function changeValue(id){
    document.getElementById('kode_barang').value = prdName[id].kode_barang;
};
</script>

<?php

    if (isset($_POST['simpan']))  {
        date_default_timezone_set('Asia/Makassar');
        $tanggal = date("Y-m-d H:i:s");
        $no_kartu = $_POST['no_kartu'];
        $nama = $_POST ['nama'];
        $kategori = $_POST ['kategori'];
        $kode_barang = $_POST ['kode_barang'];
        $masuk = $_POST ['masuk'];
        $keluar = $_POST ['keluar'];
        $keterangan = $_POST ['keterangan'];
        
        $sql = mysqli_query($koneksi, "INSERT INTO tb_stok (no_kartu, tanggal, kategori_barang, nama_barang, kode_barang, stok_masuk, stok_keluar, keterangan) VALUES ('$no_kartu', '$tanggal', '$kategori', '$nama', '$kode_barang', '$masuk', '$keluar', '$keterangan')");

            ?> echo "<script>
                alert('Data berhasil disimpan');
                document.location='?page=stok';
                </script>";
            <?php
    }

?>