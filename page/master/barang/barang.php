<?php
    
    $barang = $koneksi->query("SELECT * FROM tb_barang WHERE stok_akhir <='20'");
    $data = $barang->num_rows;
    if ($data>0) {
        echo "<script> alert('$data barang sudah mulai menipis') </script>";
    }
    
?>

<?php 
    
    $sql = $koneksi->query("SELECT * FROM tb_barang ");

    while ($tampil=$sql->fetch_assoc()) {
        $jumlah = $sql->num_rows;
    }

    $sql2 = $koneksi->query("SELECT * FROM tb_barang WHERE stok_akhir <='20'");
        $stok = $sql2->num_rows;
    

    $sql3 = $koneksi->query("SELECT * FROM tb_barang WHERE stok_akhir <='0' ");
        $stok1 = $sql3->num_rows;
    
?>

<div class="container-fluid">
            <div class="block-header">
                <h2>RINGKASAN STOK BARANG</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-16">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Stok tersedia</div>
                            <div class="number count-to" data-from="0" data-to="" data-speed="15" data-fresh-interval="20"><?php echo $jumlah;?> </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-16">
                    <div class="info-box bg-cyan hover-expand-effect" onclick="alert(' Id \t Nama Barang \r <?php while ($tampil2 = $sql2->fetch_assoc()) { $nama_barang = $tampil2['nama_barang']; $id = $tampil2['id_barang'];
                        echo $id; ?> \t <?php echo $nama_barang; ?>\r <?php }; ?>')">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Stok segera habis</div>
                            <div class="number count-to" data-from="0" data-to="" data-speed="1000" data-fresh-interval="20"><?php echo $stok;?> jenis </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-16">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                        <div class="text">Stok habis</div>
                        <div class="number count-to" data-from="0" data-to="" data-speed="1000" data-fresh-interval="20"><?php echo $stok1;?></div>
                        </div>
                    </div>
                </div>
            </div>
        
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>DATA BARANG</h2>
    <br>
    <a href="?page=barang&aksi=tambah" class="btn btn-primary" style="position: right: "><i class="material-icons">add</i> Tambah</a>
    <a class="btn btn-success" data-toggle="modal" data-target="#smallModal10"><i class="material-icons">add</i> Jenis barang</a>
    <a href="?page=stok" class="btn btn-warning" style="position: right: "><i class="material-icons">add</i> Penyesuaian</a>
</div>
    <div class="body">
    	<div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
					<th>Id</th>
                    <th>Kode</th>
                    <th>Nama barang</th>
                    <th>Satuan</th>
                    <th>Jenis</th>
                    <th>Stok</th>
                    <th>Harga pokok</th>
                    <th>Harga jual</th>
                    <th>Aksi</th>
                </tr>                                        	
             </thead>
             <tbody>
                <?php
                    $no = 1; 
                    $sql = $koneksi->query("SELECT * FROM tb_barang order by id_barang asc");
                    while ($data = mysqli_fetch_array($sql)) :                
                ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['kode_barang'];?></td>
                        <td><?php echo $data['nama_barang'];?></td>
                        <td><?php echo $data['satuan'];?></td>
                        <td><?php echo $data['jenis_barang'];?></td>
                        <td><?php echo $data['stok_akhir'];?></td>
                        <td><?php echo rupiah($data['harga_beli']);?></td>
                        <td><?php echo rupiah($data['harga_jual']);?></td>    
                        <td>
                           <a href="?page=barang&aksi=ubah&id=<?php echo $data['id_barang']; ?>" class="btn btn-warning"><i class="material-icons">create</i>
                           </a>
                            <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=barang&aksi=hapus&id=<?php echo $data['id_barang']; ?>" class="btn btn-danger"><i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                        <?php endwhile; // penutup perulangan while ?>
                </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal10" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">TAMBAH JENIS DAN SATUAN</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="" target="blank">

               <label for="">Jenis barang</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="jenis" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <label for="">Satuan barang</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="satuan" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                </div>
                <button type="submit" name="simpan" value="simpan" class="btn btn-primary m-t-15 ">Tambah
                </button>
                <button type="reset" name="reset" class="btn btn-danger m-t-15 ">Batal
                </button>
            </div>
        </div>
        </form>
        </div>
    </div>
</div>

<?php

        if (isset($_POST['simpan'])) {

            $jenis = $_POST ['jenis'];
            $satuan = $_POST ['satuan'];

            $simpan = mysqli_query($koneksi, "INSERT INTO tb_jenis_barang (jenis_barang) VALUES ('$jenis')");

        if ($simpan) {

            $simpan1 = mysqli_query($koneksi, "INSERT INTO tb_satuan (satuan) VALUES ('$satuan')");

            echo "<script>
                alert('Data berhasil disimpan');
                document.location='?page=barang';
                </script>";
        }else {
            echo "<script>
                alert('Data gagal disimpan');
                document.location='?page=barang';
                </script>";
        }
    }

?>