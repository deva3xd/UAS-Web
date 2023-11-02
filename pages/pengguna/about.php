<?php 
include '../../conf/koneksi.php';

$page = "About"; 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../assets/css/style.css" type="text/css" />
    <title><?= $page ?> - Kostly</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <!-- navbar -->
    <?php require_once "../../components/navbar.php"; ?>
    <!-- navbar end -->

    <!-- about -->
    <div class="container-xxl px-0">
        <section id="about" class="mt-3 bg-white">
            <div class="row">
                <h1 class="text-center pt-5">About</h1>
                <div class="col-3" style="background-color: #241A10;"></div>
                <div class="col-9">
                    <p class="text-start">Kostly hadir bagi anda yang tidak mau repot datang ke tempat kost,
                        hanya untuk menanyakan harga dan fasilitas. Dengan menggunakan
                        aplikasi ini, pengguna dapat secara langsung menyewa kost secara
                        online tanpa perlu datang ke tempat kost. Kostly bekerja sama dengan banyak kost yang ada di indonesia. Sehingga aplikasi ini memiliki daftar kost yang sangat lengkap, serta memiliki fitur yang dapat memudahkan penggunanya.</p>
                </div>
            </div>
        </section>
    </div>
    <!-- about end -->

    <!-- vimi -->
    <div class="container-xxl px-0 my-4">
        <section id="vimi" class="py-4 px-5">
            <div class="card-vimi mx-5 p-3 text-center">
                <h1><u>Visi</u></h1>
                <p>"Menjadi Penyedia Layanan Kost Online Terbaik Yang Memberikan Solusi Untuk Kost Yang Aman, Nyaman Serta Terjangkau Bagi Para Pelanggan di Seluruh Dunia."</p>
                <h1><u>Misi</u></h1>
                <ul class="text-start">
                    <li>Memberikan pilihan kost berkualitas dengan fasilitas layak kepada pelanggan.</li>
                    <li>Menyediakan platform online yang mudah digunakan untuk mencari, membandingkan, dan memesan kost.</li>
                    <li>Membangun mitra dan jaringan yang kuat dengan pemilik kost.</li>
                    <li>Terus berinovasi untuk meningkatkan pengalaman pengguna dan menyediakan fitur-fitur baru yang berguna bagi pelanggan dan pemilik kost.</li>
                </ul>
            </div>
        </section>
    </div>
    <!-- vimi end -->

    <!-- service -->
    <div class="container-xxl px-0">
        <section id="service">
            <h1 class="text-center">Service</h1>
            <div class="row d-flex justify-content-center text-center my-3 px-0 mx-0">
                <div class="col">
                    <div class="p-5 rounded-circle mx-auto border border-5 border-dark mb-3" style="width: 40%;">
                        <img src="../../assets/img/bg/24jam.png" width="60px" alt="..." />
                    </div>
                    <b>
                        <h4>24 Jam</h4>
                    </b>
                </div>
                <div class="col">
                    <div class="p-5 rounded-circle mx-auto border border-5 border-dark mb-3" style="width: 40%;">
                        <img src="../../assets/img/bg/rocket.png" width="60px" alt="..." />
                    </div>
                    <b>
                        <h4>Cepat dan Mudah</h4>
                    </b>
                </div>
                <div class="col">
                    <div class="p-5 rounded-circle mx-auto border border-5 border-dark mb-3" style="width: 40%;">
                        <img src="../../assets/img/bg/shield.png" width="60px" alt="..." />
                    </div>
                    <b>
                        <h4>Aman</h4>
                    </b>
                </div>
            </div>
        </section>
    </div>
    <!-- service end -->

    <!-- footer -->
    <?php require_once "../../components/footer.php"; ?>
    <!-- footer end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>