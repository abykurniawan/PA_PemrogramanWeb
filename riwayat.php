<?php
    require 'koneksi.php';

    session_start();
    
    if (!isset($_SESSION['username'])) {
        $_SESSION["nama"] = $nama;
        header("Location: login.php");
    }

    $user = $_SESSION['username']['id_user'];
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $result = mysqli_query($conn, "SELECT * FROM pembelian WHERE nama LIKE '%".$cari."%'");			
    }else{
        $result = mysqli_query($conn, "SELECT * FROM pembelian left join produk on pembelian.id_produk = produk.id_produk where id_user = $user");		
    }

    $hubungi = [];

    while ($row = mysqli_fetch_assoc($result)){
        $hubungi[] = $row; 
    }
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
    <link rel="stylesheet" href="stylesheet/styleform.css">
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
        <div class="datetime-masukan">
            <?php
                date_default_timezone_set("Asia/Makassar");
                echo date("h:i:sa");
            ?>
        </div>
        <div class="profil">
            <a onclick="functiondropdown()" class="profil-toggle"><?php echo $_SESSION['nama']; ?> </a>
            <ul id="dropdown-content" class="dropdown-profil">
                <li><a href=""><i class="fa-regular fa-user" style='padding-right: 10px;'></i>Profil</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket" style='padding-right: 10px;'></i>Logout</a></li>
            </ul>
        </div>
        <a href="index.php"><img src="image/image.png" alt=""></a>
        <div class="header-logo"><a href="index.php">Gahwa Story Coffee</a></div>
        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="homeuser.php">Home</a></li>
                    <li><a href="#footer-judul">About Us</a></li>
                </ul>
            </nav>
        </div>
        <form action="masukan.php" method="GET">
            <div class="search">
                <input type="text" name="cari" placeholder="Search..." required>
            </div>
            <input type="submit" class="search-submit" value="Cari">
        </form>
    </header>

    <div class="main"> 
        <br>
        <br>
        <br>
        <br>
        <h1>Daftar Saran dan Kritik Gahwa Story Coffee</h1>
        <div class="button-tambah">
            <a href="contact.php" role="button"><i class="fa-solid fa-plus" style="padding-right: 5px;"></i>Tambah Data</a>
        </div>
        <br>
        <?php 
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            echo "<a href='masukan.php' role='button' style='text-decoration: none;
                                                             color: black;
                                                             margin: 20px;
                                                             padding: 10px;
                                                             font-weight: bold;
                                                             background-color: #b53e65;'>
            Tampilkan Semua Data
            </a>";
        }
        ?>
        <table id="table-contact">
            <tr>
                <th class="th-no">No</th>
                <th>nama Produk</th>
                <th>Harga</th>
                <th class="th-action">Action</th>
            </tr>
            <?php $id = 1; foreach($hubungi as $hub) :?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $hub ["nama_produk"]; ?></td>
                <td><?php echo $hub ["harga"]; ?></td>
                <td class="icon">
                    <a href="update.php?id=<?php echo $hub ["id_pembelian"]; ?>" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="delete.php?id=<?php echo $hub ["id_pembelian"]; ?>" role="button" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');"><i class="fa-regular fa-trash-can"></i></a>
                </td>
            </tr>
            <?php $id++; endforeach; ?>
        </table>
    </div>
    <br>
    <br>
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