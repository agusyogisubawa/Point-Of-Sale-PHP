<?php 
          
    $tgl_transaksi = date("Y-m-d");
    
    $sql = $koneksi->query("SELECT * FROM tb_penjualan WHERE tgl_transaksi='$tgl_transaksi'");
    while ($tampil=$sql->fetch_assoc()) {
        @$total = $total + $tampil['total'];
    }

    
    $sql2 = $koneksi->query("SELECT * FROM tb_barang");
    while ($tampil2=$sql2->fetch_assoc()) {
        $jumlah = $sql2->num_rows;
    }

    $sql3 = $koneksi->query("SELECT * FROM tb_penjualan WHERE tgl_transaksi='$tgl_transaksi'");
    while ($tampil3=$sql3->fetch_assoc()) {
        @$hpp = $hpp + $tampil3['hpp'];
        
    }

    $sql4 = $koneksi->query("SELECT * FROM tb_pembelian WHERE tgl_transaksi='$tgl_transaksi'");
    while ($tampil4=$sql4->fetch_assoc()) {
        @$total_beli = $total_beli + $tampil4['total'];
        
    }

?>

<marquee>SELAMAT DATANG PADA SISTEM INFORMASI AKUNTANSI SELARAS</marquee>
<div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-16">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Barang</div>
                            <div class="number count-to" data-from="0" data-to="" data-speed="15" data-fresh-interval="20"><?php echo $jumlah;?> </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-16">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">Keuntungan Hari Ini</div>
                            <div class="number count-to" data-from="0" data-to="" data-speed="1000" data-fresh-interval="20"><?php echo "Rp". "&nbsp". number_format(@$hpp); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-16">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">add_shopping_cart</i>
                        </div>
                        <div class="content">
                        <div class="text">Penjualan Hari Ini</div>
                        <div class="number count-to" data-from="0" data-to="" data-speed="1000" data-fresh-interval="20"><?php echo "Rp". "&nbsp". number_format(@$total); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-16">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">Pembelian Hari Ini</div>
                            <div class="number count-to" data-from="0" data-to="" data-speed="1000" data-fresh-interval="20"><?php echo "Rp". "&nbsp". number_format(@$total_beli); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        