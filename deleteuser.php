<?php
    require 'koneksi.php';

    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM user WHERE id_user = $id");

    if($result){
        ?>
            <script>
                alert("Data berhasil dihapus!");
                window.location='lihatuser.php';
            </script>
        <?php
    }else {
        ?>
            <script>
                alert("Data gagal dihapus!");
            </script>
        <?php
    }      
?>