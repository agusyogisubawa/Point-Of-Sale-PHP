<?php

    $id = $_GET['id'];
    $sql = $koneksi->query("SELECT * from tb_akun WHERE id='$id' ");
    $tampil = $sql->fetch_assoc();
    $kategori = $tampil['kategori_akun'];
?>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>UBAH SALDO AKUN</h2>
    <div class="body">
        <form action="" method="POST">
        <form class="form-horizontal">
                <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label>Nama akun</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="nama" value="<?php echo $tampil ['nama_akun'];?>" class="form-control" readonly="" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label>Kode akun</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="kode_akun" value="<?php echo $tampil ['kode_akun'];?>" class="form-control" readonly="" >
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
                            <input type="number" name="saldo" value="<?php echo $tampil['saldo']; ?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                    <button type="submit" name="ubah" class="btn btn-warning m-t-5 waves-effect">Ubah
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>

<?php

    if (isset($_POST['ubah']))  {

        $nama = $_POST ['nama'];
        $kode_akun = $_POST ['kode_akun'];
        $saldo = $_POST ['saldo'];

        $sql1 = $koneksi->query("UPDATE tb_akun SET nama_akun='$nama', kode_akun='$kode_akun', saldo='$saldo' WHERE id='$id'");

        if ($sql1) 
        {
            echo "<script>
                    alert('Ubah data berhasil');
                    document.location='?page=saldo';
                </script>";
        }else 
        {
            echo "<script>
                    alert('Ubah data gagal');
                    document.location='?page=saldo';
                </script>";
        }
    }

?>