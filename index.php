<?php
include "koneksi.php"; 

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daily Journal Bitcoin</title>
    <meta name="description" content="A daily journal for Bitcoin enthusiasts to record news and community events." />
    <meta name="keywords" content="Bitcoin, Journal, Cryptocurrency, News, Community" />
    <link rel="icon" href="img/BTC-Logo-2023.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<body>
    <!-- nav begin -->
    <nav class="navbar navbar-expand-sm bg-body-tertiary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Daily Journal Bitcoin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#article">Article</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#schedule">Schedule</a></li>
                    <li class="nav-item"><a class="nav-link" href="#aboutme">About Me</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php" target="_blank">Login</a></li>
                    <button type="button" class="btn btn-dark theme" id="dark" title="dark">
                        <i class="bi bi-moon-stars-fill"></i>
                    </button>
                    <button type="button" class="btn btn-light theme" id="light" title="light">
                        <i class="bi bi-brightness-high"></i>
                    </button>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav end -->

    <!-- hero begin -->
    <section id="hero" class="text-center p-5 bg-warning text-sm-start">
        <div class="container">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                <img src="img/_99104589_photobydankitwoodgettyimages.jpg.webp" class="img-fluid" width="300" alt="Bitcoin Journal" />
                <div>
                    <h1 class="fw-bold display-4">Saving Money With the Latest Technology</h1>
                    <h4 class="lead display-6">Record all daily activities, both news and community events</h4>
                    <h6>
                        <span id="tanggal"></span>
                        <span id="jam"></span>
                    </h6>
                </div>
            </div>
        </div>
    </section>
    <!-- hero end -->

    <!-- article begin -->
    <section id="article" class="text-center p-5">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Article</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                <?php
                $sql = "SELECT * FROM article ORDER BY tanggal DESC";
                $hasil = $conn->query($sql);

                if (!$hasil) {
                    echo "<p>Error: " . $conn->error . "</p>";
                } else {
                    while ($row = $hasil->fetch_assoc()) {
                ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="img/<?= htmlspecialchars($row["gambar"]) ?>" class="card-img-top" alt="<?= htmlspecialchars($row["judul"]) ?>" />
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row["judul"]) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($row["isi"]) ?></p>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary"><?= htmlspecialchars($row["tanggal"]) ?></small>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                }
                ?> 
            </div>
        </div>
    </section>
    <!-- article end -->

    <!-- gallery begin -->
    <section id="gallery" class="text-center p-5 bg-warning">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Gallery</h1>
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img_Galery/btcprague-2024-highlights-023.jpg" class="d-block w-100" alt="Gallery Image 1" />
                    </div>
                    <div class="carousel-item">
                        <img src="img_Galery/btcprague-2024-highlights-024.jpg" class="d-block w-100" alt="Gallery Image 2" />
                    </div>
                    <div class="carousel-item">
                        <img src="img_Galery/btcprague-2024-partner-01_TREZOR_LOUNGE-222.jpg" class="d-block w-100" alt="Gallery Image 3" />
                    </div>
                    <div class="carousel-item">
                        <img src="img_Galery/btcprague-2024-partner-01_TREZOR-215.jpg" class="d-block w-100" alt="Gallery Image 4" />
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- gallery end -->

    <!-- schedule begin -->
    <section id="schedule" class="text-center p-5">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Schedule</h1>
            <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header bg-warning text-white">SENIN</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Basis Data<br />10.20-12.00 | H.5.14</li>
                            <li class="list-group-item">Logika Informatika<br />15.30-18.00 | H.4.7</li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header bg-warning text-white">SELASA</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Basis Data<br />10.20-12.00 | D.3.M</li>
                            <li class="list-group-item">Pendidikan Kewarganegaraan<br />12.30-13.10 | Kulino</li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header bg-warning text-white">RABU</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Sistem Informasi<br />12.30-15.00 | H.4.9</li>
                            <li class="list-group-item">Probabilitas<br />09.30-12.00 | H.4.8</li>
                            <li class="list-group-item">Rekayasa perangkat lunak<br />07.00-09.30 | H.5.14</li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header bg-warning text-white">KAMIS</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Pemrograman Berbasis Web<br />08.40-10.20 | D.2.J</li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header bg-warning text-white">JUMAT</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">FREE</li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header bg-warning text-white">SABTU</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">FREE</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- schedule end -->

    <!-- about me begin -->
    <section id="aboutme" class="text-center p-5 bg-warning">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-center">
                <div class="p-3">
                    <img src="img/d49e6641-249f-49f4-aadf-8a63a5811b49.jpg" class="rounded-circle border shadow" width="300" alt="Dickho Surya Manggala" />
                </div>
                <div class="p-md-5 text-sm-start">
                    <h3 class="lead">A11.2023.15323</h3>
                    <h1 class="fw-bold">Dickho Surya Manggala</h1>
                    <p>Program Studi Teknik Informatika<br />
                    <a href="https://dinus.ac.id/" class="fw-bold text-white bg-dark">Universitas Dian Nuswantoro</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- about me end -->

    <!-- footer begin -->
    <footer id="footer" class="text-center p-5">
        <div>
            <a href="https://www.instagram.com/udinusofficial"><i class="bi bi-instagram h2 p-2"></i></a>
            <a href="https://twitter.com/udinusofficial"><i class="bi bi-twitter h2 p-2"></i></a>
            <a href="https://wa.me/"><i class="bi bi-whatsapp h2 p-2"></i></a>
        </div>
        <div>Dickho Surya Manggala &copy; 2023</div>
    </footer>
    <!-- footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript">
        window.setTimeout("tampilWaktu()", 1000);

        function tampilWaktu() {
            var waktu = new Date();
            var bulan = waktu.getMonth() + 1;

            setTimeout("tampilWaktu()", 1000);
            document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            document.getElementById("jam").innerHTML = waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        document.getElementById("dark").onclick = function () {
            document.body.style.backgroundColor = "black";

            document.getElementById("hero").classList.remove("bg-warning", "text-black");
            document.getElementById("hero").classList.add("bg-secondary", "text-white");

            document.getElementById("gallery").classList.remove("bg-warning", "text-black");
            document.getElementById("gallery").classList.add("bg-secondary", "text-white");

            document.getElementById("aboutme").classList.remove("bg-warning", "text-black");
            document.getElementById("aboutme").classList.add("bg-secondary", "text-white");

            document.getElementById("footer").classList.remove("text-black");
            document.getElementById("footer").classList.add("text-white");

            document.getElementById("article").classList.remove("text-black");
            document.getElementById("article").classList.add("text-white");

            document.getElementById("schedule").classList.remove("text-black");
            document.getElementById("schedule").classList.add("text-white");

            const collection = document.getElementsByClassName("card");
            for (let i = 0; i < collection.length; i++) {
                collection[i].classList.add("bg-secondary", "text-white");
            }

            const collection2 = document.getElementsByClassName("list-group-item");
            for (let i = 0; i < collection2.length; i++) {
                collection2[i].classList.add("bg-secondary", "text-white");
            }
        };

        document.getElementById("light").onclick = function () {
            document.body.style.backgroundColor = "white";

            document.getElementById("hero").classList.remove("bg-secondary", "text-white");
            document.getElementById("hero").classList.add("bg-warning", "text-black");

            document.getElementById("gallery").classList.remove("bg-secondary", "text-white");
            document.getElementById("gallery").classList.add("bg-warning", "text-black");

            document.getElementById("aboutme").classList.remove("bg-secondary", "text-white");
            document.getElementById("aboutme").classList.add("bg-warning", "text-black");

            document.getElementById("footer").classList.remove("text-white");
            document.getElementById("footer").classList.add("text-black");

            document.getElementById("article").classList.remove("text-white");
            document.getElementById("article").classList.add("text-black");

            document.getElementById("schedule").classList.remove("text-white");
            document.getElementById("schedule").classList.add("text-black");

            const collection = document.getElementsByClassName("card");
            for (let i = 0; i < collection.length; i++) {
                collection[i].classList.remove("bg-secondary", "text-white");
            }

            const collection2 = document.getElementsByClassName("list-group-item");
            for (let i = 0; i < collection2.length; i++) {
                collection2[i].classList.remove("bg-secondary", "text-white");
            }
        };
    </script>
</body>
</html>
