<?php
    require 'koneksi.php';

    session_start();

    if(isset($_POST['daftar'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cPassword = $_POST['confirm_password'];

        if($password === $cPassword){
            $password = password_hash($password, PASSWORD_DEFAULT);

            $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
            if(mysqli_fetch_assoc($result)){
                ?>
                    <script>
                        alert("Username atau Email Telah Digunakan");
                        window.location='regis.php';
                    </script>
                <?php
            }else{
                $push_data = mysqli_query($conn, "INSERT INTO user (nama, email, username, password) 
                                        VALUES ('$nama', '$email', '$username', '$password')");
                if(mysqli_affected_rows($conn) > 0){
                    ?>
                        <script>
                            alert("Registrasi Berhasil");
                            window.location='login.php';
                        </script>
                    <?php
                }else{
                    ?>
                        <script>
                            alert("Registrasi Gagal");
                            window.location='regis.php';
                        </script>
                    <?php
                }
            }
        }else{
            echo"
            <script>
            alert('Password yang Anda Masukkan Salah');
            document.location.href = 'regis.php';
            </script>";
        }
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
    <link rel="stylesheet" href="stylesheet/styleregis.css">
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

                <ul class="nav col-md-3 col-md-auto mb-2 justify-content-center mb-md-0">
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
                    </div>
                </ul>
                
                <div class="col-md-3 text-end">
                    <a href="login.php" role="button" class="btn btn-outline-dark me-2">Login</a>
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

    <div class="main-regis">
        <div class="regis">
            <h2>Daftar</h2>
            <form action="" method="POST">
                <div class="user">
                    <input type="text" name="nama" required="">
                    <label>Nama</label>
                </div>
                <div class="user">
                    <input type="email" name="email" required="">
                    <label>Email</label>
                </div>
                <div class="user">
                    <input type="text" name="username" required="">
                    <label>Username</label>
                </div>
                <div class="input-password">
                    <input type="password" name="password" required="">
                    <label>Password</label>
                    <span class="toggle-password"><i class="fa-regular fa-eye-slash"></i></span>
                </div>
                <div class="pass-strength">
                    <div class="strength-percent"><span></span></div>
                    <span class="strength-bar">Lemah</span>
                </div>
                <div class="user">
                    <input type="password" name="confirm_password" required="">
                    <label>Konfirmasi Password</label>
                </div>
                <div class="submit-regis">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <input type="submit" name="daftar" value="Daftar">
                </div>
            </form>
        </div>
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
    <script src="passwordbar.js"></script>

</body>
</html>