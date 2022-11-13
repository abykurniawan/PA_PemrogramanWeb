<html></html>

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
    </header>

    <div class="main-contact">
        <br>
        <br>
        <br>
        <br>
        <div class="contact-form">
            <form action="" name="form" method="POST" enctype="multipart/form-data">
                <h3 id="section-title">Hubungi Kami</h3>
                <p>Nama</p>
                <input type="text" name="nama" placeholder="masukkan nama anda" required>

                <p>Email (Wajib Diisi)</p>
                <input type="email" name="email" placeholder="masukkan email anda" required>

                <p>Telepon</p>
                <input type="number" name="telepon" required>

                <p>Jenis Kelamin</p>
                <input type="radio" name="jenis" class="contact-radio" id="gender" value="laki-laki">Laki-Laki <br>
                <input type="radio" name="jenis" class="contact-radio" id="gender" value="perempuan">Perempuan <br>

                <p>Lokasi Gerai</p>
                <select name="lokasi">
                    <option value="Gahwa Waru">Gahwa Waru</option>
                    <option value="Gahwa Silkar">Gahwa Silkar</option>
                </select>

                <p>Pesan (Wajib Diisi)</p>
                <textarea cols="40" rows="8" name="pesan"></textarea>

                <p>Upload File (Wajib Diisi)</p>
                <input type="file" name="nama_file">

                <input type="checkbox"><br>
                <span class="notice">Apakah Anda Yakin???</span>

                <p>*Bidang Wajib Diisi</p>
                <input type="submit" id="contact-submit" name="submit" value="Kirim">            
            </form>
        </div>
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

    <?php
    include 'koneksi.php';
    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $jenis = $_POST['jenis'];
        $lokasi = $_POST['lokasi'];
        $pesan = $_POST['pesan'];
        $ekstensi_diperbolehkan	= array('png','jpg');
		$nama_file = $_FILES['nama_file']['name'];
		$x = explode('.', $nama_file);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['nama_file']['size'];
		$file_tmp = $_FILES['nama_file']['tmp_name'];

        move_uploaded_file($file_tmp, 'file/'.$nama_file);
        $sql = "INSERT INTO hubungi (id, nama, email, telepon, jenis, lokasi, pesan, nama_file)
                VALUES (null, '".$nama."', '".$email."', '".$telepon."', '".$jenis."', '".$lokasi."', '".$pesan."', '".$nama_file."')";

        $result = mysqli_query($conn, $sql);

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){
                if($result){
                    ?>
                        <script>
                            alert("Data berhasil ditambahkan!");
                            window.location='masukan.php';
                        </script>
                    <?php
                }else{
                    ?>
                        <script>
                            alert("Data gagal ditambahkan!");
                        </script>
                    <?php
                }
            }else{
                ?>
                    <script>
                        alert("Ukuran File Terlalu Besar!");
                    </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert("Ekstensi File Tidak Diperbolehkan!");
                </script>
            <?php
        }
    }
    ?>

</body>
</html>