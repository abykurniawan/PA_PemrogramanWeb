<?php
    require 'koneksi.php';

    session_start();
    
    if (!isset($_SESSION['username'])) {
        $_SESSION["nama"] = $nama;
        header("Location: login.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery.js"></script>
    <script src="https://kit.fontawesome.com/a45685b897.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header id="header" class="sticky-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-black text-decoration-none">
                    <div class="header-logo">
                        <img src="image/image.png" alt="" style="width: 50px; height: 50px;" class="text-start">
                        Gahwa Story Coffee  
                    </div>
                </a>

                <ul class="nav col-md-4 col-md-auto mb-2 justify-content-center mb-md-0">
                    <div class="navbar">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link px-2">Halaman Utama</a>
                        </li>
                        <li class="nav-item">
                            <a href="homeuser.php" class="nav-link px-2">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#footer-judul" class="nav-link px-2">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="riwayat.php" class="nav-link px-2">Riwayat</a>
                        </li>
                    </div>
                </ul>
                    
                <div class="col-md-2 text-end">
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
                </div>
                <div class="datetime">
                    <?php
                        date_default_timezone_set("Asia/Makassar");
                        echo date("h:i:sa");
                    ?>
                </div>
                <div class="toggle"> <!--Untuk latar belakang-->   
                    <div class="circle"></div> <!--Icon lingkaran-->    
                    <div class="toggle-moon"><i class="fas fa-moon"></i></div> <!--Icon bulan-->    
                    <div class="toggle-sun"><i class="fas fa-sun"></i></div> <!--Icon matahari-->
                </div>
            </div>
        </div>
    </header>

    <div class="main">
        <?php 
            $id = $_GET['id'];
            $id_user_sekarang = $_SESSION['username']['id_user'];
        ?>
        <form action="" method="post">
            <div class="content">
                <h3 id="section-title">Menu</h3>
                <?php
                    $kopi = mysqli_query($conn, "select * from produk where id_produk = $id");
                    if(mysqli_num_rows($kopi)>0){
                        while($row = mysqli_fetch_array($kopi)){
                ?>
                <div class="content-item">
                    <li>
                        <input type="hidden" name="deskripsi" value="<?php echo $row['deskripsi']; ?>">
                        <a href="#"><img src="foto_produk/<?php echo $row ["foto"] ?>" alt="produk-img">
                            <li>
                                <p>Deskripsi Produk</p>
                                <?php echo $row['deskripsi']; ?>
                            </li>
                        </a>
                    </li>
                    <li>
                        <?php $row['nama_produk']; ?>
                        <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
                        <input type="hidden" name="id_user" value="<?php echo $id_user_sekarang ?>">
                    <li>
                        <label for="nama_produk" style="font-size: 26px;">Nama Produk</label>
                        <input type="hidden" name="nama_produk" value="<?php echo $row['nama_produk']; ?>">
                    </li>
                    <li style="font-weight: 100;">
                        <?php echo $row['nama_produk']; ?>
                    </li>
                        <label for="harga_produk" style="font-size: 26px; font-weight: bold;">Harga</label>
                        <input type="hidden" name="harga_produk" value="<?php echo $row['harga']; ?>">
                    </li>
                    <li style="font-weight: 100;">
                        <?php echo $row['harga']; ?>
                    </li>
                    <input type="submit" name="submit" value="Beli">
                </div>
                <?php 
                    }
                }
                ?>
            </div>
        </form>
    </div>

    <footer class="bd-footer py-4 py-md-5 mt-0" id="footer">
        <div class="container py-4 py-md-5 px-4 px-md-3">
            <div class="row">
                <div class="col-lg-5 mb-3">
                    <a href="/" class="d-flex align-items-center link-dark text-decoration-none">
                        <div class="footer-logo">
                            <img src="image/image.png" alt="" style="width: 50px; height: 50px;">
                            Gahwa Story Coffee
                        </div>
                    </a>
                </div>
                <div class="col mb-3">
            
                </div>
                <div class="col mb-3">
                    <h5>Kritik & Saran</h5>
                    <div class="footer-list">
                        <ul class="list-unstyled d-flex">
                            <li class="nav-item mb-2"><a href="masukan.php" class="nav-link p-0 text-muted">Hubungi Kami</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col mb-3">
                    <h5>Temukan Kami Di</h5>
                    <div class="d-flex flex-column flex-sm-row justify-content-between py-2 my-1">
                        <div class="sosmed-container">
                            <ul class="list-unstyled d-flex">
                                <li class="ms-3">
                                    <a href="https://www.instagram.com/gahwa.storycoffee/">
                                        <span class="fa-brands fa-instagram"></span>
                                    </a>
                                </li>
                                <li class="ms-3">
                                    <a href="https://goo.gl/maps/ecuoLbXPMNgBQHwYA">
                                        <span class="fa-solid fa-map-location-dot"></span>
                                    </a>
                                </li>
                                <li class="ms-3">
                                    <a href="https://linktr.ee/gahwastorycoffee">
                                        <span class="fa-solid fa-link"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p class="text-center text-muted pt-5">
                © 2020 | 
                <a href="https://www.instagram.com/aby.krnwn/" style="color: grey; text-decoration: none;">Aby Kurniawan.</a>
                All Rights Reserved.
            </p>
        </div>
    </footer>

    <script src="script.js"></script>
    <script src="dropdown.js"></script>

    <?php
        if(isset($_POST['submit'])){
            $id_produk = $_POST['id_produk'];
            $nama_produk = $_POST['nama_produk'];
            $id_user = $_POST['id_user'];
            $harga_produk = $_POST['harga_produk']; 
            $beli = mysqli_query($conn, "insert into pembelian values
                    (null, '".$id_user."', '".$id_produk."', '".$nama_produk."', '".$harga_produk."')");
            if($beli){
                ?>
                    <script>
                        alert("Berhasil");
                        window.location='homeuser.php';
                    </script>
                <?php
            }
        }
    ?>
</body>
</html>