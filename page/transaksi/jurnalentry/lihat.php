<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
    <h2>DETAIL TRANSAKSI JURNAL ENTRY</h2>
</div>
    <div class="body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>                           
                    <th>No Jurnal</th>
                    <th>Nama Akun</th>
                    <th>Kode Akun</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                    <th>Aksi</th>
                </tr>                                           
             </thead>
             <tbody >
                <?php

                    $id=$_GET['id'];
                    $sql=mysqli_query($koneksi, "SELECT tb_jurnal_detail.id, tb_jurnal.id,  tb_jurnal.no_transaksi, tb_jurnal.nama_akun, tb_jurnal.kode_akun, tb_jurnal.debet, tb_jurnal.kredit FROM tb_jurnal JOIN tb_jurnal_detail ON tb_jurnal.no_transaksi=tb_jurnal_detail.no_transaksi WHERE tb_jurnal_detail.id='$id'");
                    while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr>

                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['no_transaksi'];?></td>
                        <td><?php echo $data['nama_akun'];?></td>
                        <td><?php echo $data['kode_akun'];?></td>
                        <td><?php echo rupiah($data['debet']);?></td>
                        <td><?php echo rupiah($data['kredit']);?></td>
                        <td>
                            <a href="?page=jurnalentry&aksi=ubah&id=<?php echo $data['id']; ?>" class="btn btn-warning"> Koreksi
                           </a>
                        </td>
                    </tr>
                    <?php 

                        @$total_debet = @$total_debet + $data['debet'];
                        @$total_kredit = @$total_kredit + $data['kredit'];
                        @$total = $total_debet + $total_kredit;

                        $sql1=$koneksi->query("UPDATE tb_jurnal_detail SET total_debet='$total_debet', total_kredit='$total_kredit', total='$total' WHERE id=$id");

                    } ?>
                
                </tbody>
                </table>
            </div>
            <a href="?page=jurnalentry&aksi=kembali" class="btn btn-primary m-t-15 "><i class="material-icons">keyboard_backspace</i> Kembali</a>
        </div>
        </div>
    </div>
</div>