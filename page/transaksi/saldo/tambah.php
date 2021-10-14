<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>TAMBAH SALDO AKUN</h2>
    <div class="body">
        <form class="form-horizontal">
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="nama_akun">Nama akun</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <select name="nama" id="nama" class="form-control" onchange='changeValue(this.value)'>
                                <option selected="">-- Pilih akun --</option>
                                <?php
                                    
                                    $sql = $koneksi->query( "SELECT * FROM tb_akun order by id_akun desc");
                                    $result = mysqli_query($koneksi, "SELECT * FROM tb_akun"); 
                                    $jsArray = "var prdName = new Array(); \n";

                                    while ($row = mysqli_fetch_array($result)) {
                                     echo '<option name="nama"  value="' . $row['nama_akun'] . '">' . $row['nama_akun'] . '</option>'; 
                                    $jsArray .= "prdName['" . $row['nama_akun'] . "'] = {kode_akun: '" . addslashes($row['kode_akun']) . "' };\n";
                                     } 
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="kode_akun">Kode akun</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="kode_akun" id=kode_akun class="form-control" readonly="" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label>Saldo awal</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" id="saldo" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                    <button type="button" class="btn btn-primary m-t-5 waves-effect">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>

<script type="text/javascript"> 
<?php echo $jsArray; ?>
function changeValue(id){
    document.getElementById('kode_akun').value = prdName[id].kode_akun;
};
</script>

<?php

    if (isset($_POST['simpan']))  {
        $nama = $_POST ['nama'];
        $kode_akun = $_POST ['kode_akun'];
        $saldo = $_POST ['saldo'];
        $sql = mysqli_query($koneksi, "INSERT INTO tb_akun (nama_akun, kode_akun, saldo) VALUES ('$nama', '$kode', '$saldo')");

            ?> echo "<script>
                alert('Data berhasil disimpan');
                document.location='?page=akun';
                </script>";
<?php
    }

?>