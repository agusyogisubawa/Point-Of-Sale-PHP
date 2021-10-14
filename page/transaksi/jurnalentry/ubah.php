<?php

    $id= $_GET['id'];
    $sql = $koneksi->query("SELECT tb_jurnal_detail.id, tb_jurnal.tgl_transaksi, tb_jurnal.no_transaksi, tb_jurnal.nama_akun, tb_jurnal.kode_akun, tb_jurnal.debet, tb_jurnal.kredit, tb_jurnal.keterangan FROM tb_jurnal JOIN tb_jurnal_detail ON tb_jurnal.no_transaksi=tb_jurnal_detail.no_transaksi WHERE tb_jurnal.id='$id' ");
    $tampil = $sql->fetch_assoc();

?>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>UBAH TRANSAKSI JURNAL ENTRY</h2>
    <div class="body">
        <form action="" method="POST">
        <form class="form-horizontal">
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label>No jurnal</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="no_transaksi" value="<?php echo $tampil ['no_transaksi'];?>" class="form-control" readonly="" >
                        </div>
                    </div>
                </div>
            </div>
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
                    <label>Debet</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" name="debet" value="<?php echo $tampil ['debet'];?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label>Kredit</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" name="kredit" value="<?php echo $tampil ['kredit'];?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                    <button type="submit" name="ubah" class="btn btn-warning m-t-15 waves-effect">Ubah
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

        $no_transaksi = $_POST ['no_transaksi'];
        $nama = $_POST ['nama'];
        $kode_akun = $_POST ['kode_akun'];
        $debet = $_POST ['debet'];
        $kredit= $_POST ['kredit'];

        $sql = $koneksi->query("UPDATE tb_jurnal SET no_transaksi='$no_transaksi', nama_akun='$nama', kode_akun='$kode_akun', debet='$debet', kredit='$kredit' WHERE id='$id' ");

        if ($sql) 
        {
            echo "<script>
                    alert('Ubah data berhasil');
                    document.location='?page=jurnalentry';
                </script>";
        }else 
        {
            echo "<script>
                    alert('Ubah data gagal');
                    document.location='?page=jurnalentry';
                </script>";
        }
    }

?>