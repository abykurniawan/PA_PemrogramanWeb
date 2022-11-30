<?php
    require 'koneksi.php';

    $id = $_GET['id_produk'];

    $result = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id");

    if($result){
        ?>
            <script>
                alert("Data berhasil dihapus!");
                window.location='lihatproduk.php';
            </script>
        <?php
    }else {
        ?>
            <script>
                alert("Data gagal dihapus!");
                window.location='lihatproduk.php';
            </script>
        <?php
    }      
?>