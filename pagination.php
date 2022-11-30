<?php 
    include 'koneksi.php';

    $halaman = 3;
    $page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
    $query = "SELECT * FROM produk LIMIT $mulai, $halaman";
    $sql = mysqli_query($conn, "SELECT * FROM produk");
    $total = mysqli_num_rows($sql);
    $pages = ceil($total/$halaman); 
    for ($i=1; $i<=$pages ; $i++){ ?>
    <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
    
    <?php } 
 
?>