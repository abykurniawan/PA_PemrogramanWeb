<?php
    require 'koneksi.php';

    session_start();
 
    if (!isset($_SESSION['username'])) {
        $_SESSION["nama"] = $nama;
        header("Location: login.php");
    }

    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $result = mysqli_query($conn, "SELECT * FROM user WHERE nama LIKE '%".$cari."%'");			
    }else{
        $result = mysqli_query($conn, "SELECT * FROM user");		
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

                <ul class="nav col-md-3 col-md-auto mb-2 justify-content-center mb-md-0">
                    <div class="navbar">
                        <li class="nav-item">
                            <a href="homeadmin.php" class="nav-link px-2">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#footer-judul" class="nav-link px-2">About Us</a>
                        </li>
                    </div>
                </ul>
                    
                <div class="col-md-3 text-end">
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
        <h1>Daftar Akun User Website Gahwa Story Coffee</h1>
        <br>
        <?php 
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            echo "<a href='lihatuser.php' role='button' style='text-decoration: none;
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
                <th>Nama</th>
                <th>Email</th>
                <th>Username</th>
                <th class="th-action">Action</th>
            </tr>
            <?php $id = 1; foreach($hubungi as $hub) :?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $hub ["nama"]; ?></td>
                <td><?php echo $hub ["email"]; ?></td>
                <td><?php echo $hub ["username"]; ?></td>
                <td class="icon">
                    <a href="deleteuser.php?id=<?php echo $hub ["id_user"]; ?>" role="button" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');"><i class="fa-regular fa-trash-can"></i></a>
                </td>
            </tr>
            <?php $id++; endforeach; ?>
        </table>
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

</body>
</html>