<?php

    $id = $_GET['id'];
    $sql = $koneksi->query("SELECT * from tb_akun WHERE id='$id' ");
    $tampil = $sql->fetch_assoc();
    $kategori = $tampil['kategori_akun'];
    $tipe = $tampil['tipe_akun'];

?>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>UBAH DATA AKUN</h2>
</div>
<div class="body">
    <form action="" method="POST">
        <label>Kode akun</label>
        <div class="form-group">
            <div class="form-control">
                <input class="form-control" name="kode_akun" value="<?php echo $tampil ['kode_akun'];?>" readonly/>
            </div>
        </div>
        <label>Nama akun</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="nama" class="form-control" value="<?php echo $tampil ['nama_akun'];?>"/>
            </div>
        </div>
        <label>Tipe akun</label>
        <div class="form-group">
        	<div class="form-line">
                <select name="tipe" class="form-control show-tick">
                    <option value="Aktiva" <?php if ($tipe=='Aktiva') {echo "selected";}  ?>>Aktiva</option>
                    <option value="Kewajiban" <?php if ($tipe=='Kewajiban') {echo "selected";}  ?>>Kewajiban</option>
                    <option value="Modal" <?php if ($tipe=='Modal') {echo "selected";}  ?>>Modal</option>
                    <option value="Pendapatan" <?php if ($tipe=='Pendapatan') {echo "selected";}  ?>>Pendapatan</option>
                    <option value="Beban" <?php if ($tipe=='Beban') {echo "selected";}  ?>>Beban</option>
                </select>
            </div>
        </div>
        <label>Kategori akun</label>
        <div class="form-group">
        	<div class="form-line">
                <select name="kategori" class="form-control show-tick">
                    <option value="Debet" <?php if ($kategori=='Debet') {echo "selected";}?>>Debet</option>
                    <option value="Kredit" <?php if ($kategori=='Kredit') {echo "selected";}?>>Kredit</option>
                </select>
            </div>
        </div>
        <label>Saldo akun</label>
        <div class="form-group">
            <div class="form-line">
                <input type="number" name="saldo" class="form-control" value="<?php echo $tampil ['saldo'];?>"/>
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

	if (isset($_POST['ubah'])) {

    	$kode_akun = $_POST ['kode_akun'];
    	$nama = $_POST ['nama'];
    	$kategori = $_POST ['kategori'];
    	$tipe = $_POST ['tipe'];
    	$saldo = $_POST ['saldo'];

        $sql = $koneksi->query("UPDATE tb_akun SET kode_akun='$kode_akun', nama_akun='$nama', kategori_akun='$kategori', tipe_akun='$tipe', saldo='$saldo' WHERE id='$id'");

        if ($sql) {
            ?>

                <script type="text/javascript">
                    alert ("Data berhasil diubah");
                    window.location.href="?page=akun";
                </script>

            <?php
        }  
	}

?>