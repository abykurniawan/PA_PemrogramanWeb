<?php
    require 'koneksi.php';

    session_start();

    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $result = mysqli_query($conn, "SELECT * FROM produk WHERE nama LIKE '%".$cari."%'");			
    }else{
        $result = mysqli_query($conn, "SELECT * FROM produk");		
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

    <div class="main">
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

        <div class="hamburger">
            <a class="toggle-hamburger">
                <div class="hamburger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
            <a href="" class="logo-hamburger">
                Menu User
            </a>
        </div>
        <div class="sidebar">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 730px;">
                <br>
                <br>
                <br>
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <i class="fa-solid fa-user me-5"></i>
                    <span class="fs-4">
                    <?php
                        if (!isset($_SESSION['username'])) {
                            $_SESSION["nama"] = $nama;
                            header("Location: homeguest.php");
                            }
                        ?>
                    <?php echo $_SESSION['nama']; ?>
                    </span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="riwayat.php" class="nav-link link-dark" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock-history me-5" viewBox="0 0 16 16">
                                <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                            Riwayat
                        </a>
                    </li>
                    <li>
                        <a href="masukan.php" class="nav-link link-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-forward-fill me-5" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            Hubungi Kami
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user me-3"></i>
                        <strong>
                        <?php
                            if (!isset($_SESSION['username'])) {
                                $_SESSION["nama"] = $nama;
                                header("Location: homeguest.php");
                            }
                            ?>
                            <?php echo $_SESSION['nama']; ?>
                        </strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item text-black rounded-2" href="profil.php">Profil</a></li>
                        <li><a type="button" class="dropdown-item text-black rounded-2" data-bs-toggle="modal" data-bs-target="#modalSheet" aria-expanded="false">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copy-container">
            <br>
            <h1>
                Haii, Sobat Gahwa
                <br>
                We Make Coffee With Love
            </h1>
        </div>
            <h3 id="section-title">Menu</h3>
            <form action="homeuser.php" method="GET">
                <div class="search">
                    <input type="text" name="cari" placeholder="Search..." required>
                </div>
                <input type="submit" class="search-submit" value="Cari">
            </form>
        
        <div class="container">
            <div class="row" id="load_data">
                <?php
                    include 'koneksi.php';

                    $halaman = 3;
                    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                    $query = "SELECT * FROM produk LIMIT $mulai, $halaman" or die(mysqli_connect_error());
                    $result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk ASC");
                    $total = mysqli_num_rows($result);
                    $dewan1 = $conn->prepare($query);
                    $dewan1->execute();
                    $pages = ceil($total/$halaman);
                    $res1 = $dewan1->get_result();
                    while ($row = $res1->fetch_assoc()) {
                    $id = $row["id_produk"];
                    $foto = $row["foto"];
                    $nama_produk = $row["nama_produk"];
                    if (strlen($nama_produk) > 60) {
                        $nama_produk = substr($nama_produk, 0, 60) . "...";
                    }
                    $deskripsi = $row["deskripsi"];
                    if (strlen($deskripsi) > 100) {
                        $deskripsi = substr($deskripsi, 0, 100) . "...";
                    }
                    $harga = $row["harga"];
                    if (strlen($harga) > 100) {
                        $harga = substr($harga, 0, 100) . "...";
                    }
                ?>
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <img src="foto_produk/<?php echo $row ["foto"] ?>" style="width: 414px; height: 414px;" class="card-img-top" alt="gambar">
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $nama_produk; ?></h5>
                        <p class="card-text"><?php echo $deskripsi; ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="detail.php?id=<?php echo $row ['id_produk']; ?>" class="btn btn-primary">Beli</a>
                            <small class="text-black">Rp.<?php echo $harga; ?></small>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>

        <nav aria-label="...">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#">Previous</a>
                </li>
                <?php for ($i=1; $i<=$pages ; $i++){ ?>
                    <li class="page-item active">
                    <a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php } ?>
                </li>
                <li class="page-item">
                    <a class="page-link" href="?halaman=<?php echo $i; ?>">Next</a>
                </li>
            </ul>
        </nav>
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
    <script src="hamburger.js"></script>

</body>
</html>