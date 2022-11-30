<?php
    require 'koneksi.php';

    session_start();
    
    if (!isset($_SESSION['username'])) {
        $_SESSION["nama"] = $nama;
        header("Location: login.php");
    }

    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM hubungi where id = $id");

    $hub = [];

    while ($row = mysqli_fetch_assoc($result)){
        $hub[] = $row; 
    }

    $hub = $hub[0];

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
                VALUES ('', '".$nama."', '".$email."', '".$telepon."', '".$jenis."', '".$lokasi."', '".$pesan."', '".$nama_file."')";

        $result = mysqli_query($conn, $sql);

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){
                if($result){
                    ?>
                        <script>
                            alert("Data berhasil diupdate!");
                            window.location='lihatmasukan.php';
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
                    </div>
                    <li class="nav-item">
                        <a href="homeuser.php" class="nav-link px-2 py-3 text-black">Home</a>
                    </li>
                    <div class="navbar">
                        <li class="nav-item">
                            <a href="#footer-judul" class="nav-link px-2">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="riwayat.php" class="nav-link px-2">Riwayat</a>
                        </li>
                    </div>
                </ul>

                <nav class="navbar navbar-expand-lg">
                    <div class="dropdown">
                        <ul class="navbar-nav">
                            <li class="dropdown">
                                <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                        if (!isset($_SESSION['username'])) {
                                            $_SESSION["nama"] = $nama;
                                            header("Location: homeguest.php");
                                        }
                                    ?>
                                    <?php echo $_SESSION['nama']; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item text-black rounded-2 active">User Profil</li>
                                    <li><a class="dropdown-item text-black rounded-2" href="profil.php">Profil</a></li>
                                    <li><a type="button" class="dropdown-item text-black rounded-2" data-bs-toggle="modal" data-bs-target="#modalSheet" aria-expanded="false">Logout</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="dropdown-item rounded-2">
                                        <?php
                                            if (!isset($_SESSION['username'])) {
                                                $_SESSION["nama"] = $nama;
                                                header("Location: homeguest.php");
                                            }
                                        ?>
                                        <?php echo $_SESSION['nama']; ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
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

    <div class="main-contact">
        <div id="modalSheet" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4">
                    <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5">Logout Confirm</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-0">
                        <p>Anda Yakin Ingin Keluar???</p>
                    </div>
                    <div class="modal-footer flex-column border-top-0">
                        <a type="button" href="logout.php" class="btn btn-lg btn-primary w-100 mx-0 mb-2">Logout</a>                            
                        <a type="button" class="btn btn-lg btn-light w-100 mx-0" data-bs-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-form">
            <form action="" name="form" method="POST" enctype="multipart/form-data">
                <h3 id="section-title">UPDATE DATA MASUKAN DAN SARAN</h3>
                <p>Nama</p>
                <input type="text" name="nama" id="nama" placeholder="masukkan nama anda" value="<?php echo $hub['nama'] ?>" required>

                <p>Email (Wajib Diisi)</p>
                <input type="email" name="email" id="email" placeholder="masukkan email anda" value="<?php echo $hub['email'] ?>" required>

                <p>Telepon</p>
                <input type="number" name="telepon" id="telepon" value="<?php echo $hub['telepon'] ?>" required>

                <p>Jenis Kelamin</p>
                <input type="radio" name="jenis" class="contact-radio" value="laki-laki">Laki-Laki <br>
                <input type="radio" name="jenis" class="contact-radio" value="perempuan">Perempuan <br>

                <p>Lokasi Gerai</p>
                <select name="lokasi">
                    <option value="Gahwa Waru">Gahwa Waru</option>
                    <option value="Gahwa Silkar">Gahwa Silkar</option>
                </select>

                <p>Pesan (Wajib Diisi)</p>
                <textarea cols="40" rows="8" name="pesan" id="pesan" value="<?php echo $hub['pesan'] ?>"></textarea>

                <p>Upload File (Wajib Diisi)</p>
                <input type="file" name="nama_file" value="<?php echo $hub['nama_file'] ?>">

                <input type="checkbox"><br>
                <span class="notice">Apakah Anda Yakin???</span>

                <p>*Bidang Wajib Diisi</p>
                <input type="submit" id="contact-submit" name="submit" value="Submit">            
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

</body>
</html>