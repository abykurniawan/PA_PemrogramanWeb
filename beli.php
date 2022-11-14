<html></html>
<?php 
    require 'koneksi.php';

    session_start();
    
    if (!isset($_SESSION['username'])) {
        $_SESSION["nama"] = $nama;
        header("Location: login.php");
    }

    if(isset($_POST['submit'])) {
        $id_user = $_POST['id_user'];
        $id_produk = $_POST['id_produk'];
        $nama_user = $_POST['nama_user'];
        $nama_produk = $_POST['nama_produk'];
        $alamat = $_POST['alamat'];
        $harga_produk = $_POST['harga_produk'];
        $jumlah = $_POST['jumlah'];
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $tanggal_pembelian = $_POST['tanggal_pembelian'];


        $sql = "INSERT INTO data_pembelian (id_pembelian, id_user, id_produk, nama_user, nama_produk, alamat, harga_produk, jumlah, metode_pembayaran, tanggal_pembelian)
                VALUES (null,'".$id_user."', '".$id_produk."' '".$nama_user."', '".$nama_produk."', '".$alamat."', '".$harga_produk."', '".$jumlah."', '".$metode_pembayaran."', '".$tanggal_pembelian."')";

        $result = mysqli_query($conn, $sql);

        if($result){
            ?>
                <script>
                    alert("Data berhasil ditambahkan!");
                    window.location='homeuser.php';
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("Data gagal ditambahkan!");
                </script>
            <?php
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
        <?php 
            $id = $_GET['id'];
            $id_user_sekarang = $_SESSION['username']['id_user'];
        ?>
        <form action="" method="post">
            <div class="contact-form">
                <h3 id="section-title">Hubungi Kami</h3>
                <?php
                    $result = mysqli_query($conn, "SELECT * FROM pembelian where id_pembelian = $id");

                    if(mysqli_num_rows($result)>0){
                        while($beli = mysqli_fetch_array($result)){
                ?>
                <input type="hidden" name="id_user" value="<?php echo $hub['nama_produk']; ?>" required>

                <input type="hidden" name="id_produk" value="<?php echo $hub['nama_produk']; ?>" required>

                <p>Nama</p>
                <input type="text" name="nama_user" placeholder="masukkan nama anda" required>

                <input type="hidden" name="nama_produk" value="<?php echo $hub['nama_produk']; ?>" required>
                <?php echo $hub['nama']; ?>

                <p>Alamat</p>
                <input type="text" name="alamat" required>

                <p>Harga Produk</p>
                <input type="hidden" name="harga_produk" value="<?php echo $hub['nama_produk']; ?>" required>
                <?php echo $hub['nama_produk']; ?>

                <p>Jumlah</p>
                <input type="number" name="alamat" required>

                <p>Metode Pembayaran</p>
                <select name="metode_pembayaran">
                    <option value="BRI">BRI</option>
                    <option value="BNI">BNI</option>
                    <option value="BCA">BCA</option>
                    <option value="MANDIRI">MANDIRI</option>
                    <option value="GOPAY">GOPAY</option>
                    <option value="COD">COD</option>
                </select>

                <p>Tanggal Pembelian</p>
                <input type="date" name="tanggal_pembelian" required>

                <p>*Bidang Wajib Diisi</p>
                <input type="submit" id="contact-submit" name="submit" value="Beli">     
                <?php 
                    }
                }
                ?>       
            </div>
        </form>
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