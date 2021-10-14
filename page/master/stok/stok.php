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
    <h2>DATA PENYESUAIAN STOK</h2>
    <br>
    <a href="?page=stok&aksi=tambah" class="btn btn-primary" style="position: right: "><i class="material-icons">add</i> Tambah</a>
</div>
    <div class="body">
    	<div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
					<th>Id</th>
                    <th>Kode barang</th>
                    <th>Nama barang</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Sisa</th>
                    <th>Aksi</th>
                </tr>                                        	
             </thead>
             <tbody>
                <?php
                    $no = 1; 
                    $sql = $koneksi->query("SELECT * FROM tb_stok, tb_barang WHERE tb_stok.kode_barang=tb_barang.kode_barang order by id asc ");
                    while ($data = mysqli_fetch_array($sql))  :                
                ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['kode_barang'];?></td>
                        <td><?php echo $data['nama_barang'];?></td>
                        <td><?php echo $data['stok_masuk'];?></td>
                        <td><?php echo $data['stok_keluar'];?></td> 
                        <td><?php echo $data['stok_akhir'];?></td>  
                        <td>
                            <a href="?page=stok&aksi=lihat&id=<?php echo $data['id']; ?>" class="btn btn-success"> Detail
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