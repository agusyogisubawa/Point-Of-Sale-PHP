<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_selaras';

    $koneksi = new mysqli("$host", "$username", "$password", "$dbname")
    or die(mysqli_error($koneksi));
?>
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