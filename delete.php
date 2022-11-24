<?php
    require 'koneksi.php';

    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM hubungi WHERE id = $id");

    if($result){
        ?>
            <script>
                alert("Data berhasil dihapus!");
                window.location='lihatmasukan.php';
            </script>
        <?php
    }else {
        ?>
            <script>
                alert("Data gagal dihapus!");
                window.location='lihatmasukan.php';
            </script>
        <?php
    }      
?>