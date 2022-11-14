<?php 
    require 'koneksi.php';

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gahwa Story Coffee: Kedai Kopi Super</title>
    <link rel="icon" href="image/image1.png">
    <link rel="stylesheet" href="stylesheet/style.css">
    <link rel="stylesheet" href="stylesheet/darkmode.css">
    <script src="jquery.js"></script>
    <script src="https://kit.fontawesome.com/a45685b897.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header class="header">
        <div class="toggle"> <!--Untuk latar belakang-->    
            <div class="circle"></div> <!--Icon lingkaran-->    
            <div class="toggle-moon"><i class="fas fa-moon"></i></div> <!--Icon bulan-->    
            <div class="toggle-sun"><i class="fas fa-sun"></i></div> <!--Icon matahari-->
        </div>
        <a href="index.php"><img src="image/image.png" alt=""></a>
        <div class="header-logo"><a href="index.php">Gahwa Story Coffee</a></div>
        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="index.php">Halaman Utama</a></li>
                    <li><a href="#footer-judul">About Us</a></li>
                    <li><a href="riwayat.php">Riwayat</a></li>
                </ul>
            </nav>
        </div>
        <div class="datetime">
            <?php
                date_default_timezone_set("Asia/Makassar");
                echo date("h:i:sa");
            ?>
        </div>
        <div class="profil">
            <?php
                if (!isset($_SESSION['username'])) {
                    $_SESSION["nama"] = $nama;
                    header("Location: homeguest.php");
                }
            ?>
            <a onclick="functiondropdown()" class="profil-toggle"><?php echo $_SESSION['nama']; ?> </a>
            <ul id="dropdown-content" class="dropdown-profil">
                <li><a href="profil.php"><i class="fa-regular fa-user" style='padding-right: 10px;'></i>Profil</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket" style='padding-right: 10px;'></i>Logout</a></li>
            </ul>
        </div>
    </header>

    <div class="main">
        <br>
        <br>
        <br>
        <br>
        <div class="copy-container">
            <br>
            <h1>
                Haii, Sobat Gahwa
                <br>
                We Make Coffee With Love
            </h1>
        </div>
        <div class="content">
            <h3 id="section-title">Menu</h3>
            <?php
                $kopi = mysqli_query($conn, "select * from produk");
                if(mysqli_num_rows($kopi)>0){
                    while($row=mysqli_fetch_array($kopi)){
            ?>
            <div class="content-item">
                <li><a href="detail.php?id=<?php echo $row ['id_produk']; ?>"><img src="foto_produk/<?php echo $row ["foto"] ?>" alt="produk-img"></a></li>
                <li><a class="nama-produk" href="detail.php?id=<?php echo $row ['id_produk']; ?>"><?= $row ['nama_produk']; ?></a></li>
            </div>
            <?php 
                    }
                }
            ?>
        </div>
    </div>

    <footer class="footer">
        <a href="index.php"><img src="image/image.png" alt=""></a>
        <div id="footer-judul">ABOUT US</div>
        <div class="footer-logo"><a href="index.php">Gahwa Story Coffee</a></div>
        <div class="footer-list">
            <h3 id="sosmed-footer">Temukan Kami Di</h3>
            <nav>
                <ul>
                    <li><a href="masukan.php">Hubungi Kami</a></li>
                </ul>
            </nav>
        </div>
        <div class="sosmed-container">
            <ul>
                <li>
                    <a href="https://www.instagram.com/gahwa.storycoffee/">
                        <span class="fa-brands fa-instagram"></span>
                    </a>
                </li>
                <li>
                    <a href="https://goo.gl/maps/ecuoLbXPMNgBQHwYA">
                        <span class="fa-solid fa-map-location-dot"></span>
                    </a>
                </li>
                <li>
                    <a href="https://linktr.ee/gahwastorycoffee">
                        <span class="fa-solid fa-link"></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="copyright">
            © 2020 | 
            <a href="https://www.instagram.com/aby.krnwn/">Aby Kurniawan.</a>
            All Rights Reserved.
        </div>
    </footer>

    <script src="script.js"></script>
    <script src="dropdown.js"></script>

</body>
</html>