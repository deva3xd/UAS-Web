<?php 
include '../../conf/koneksi.php';

$page = "Home";
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

  <!-- header -->
  <div class="container-xxl px-0 mt-5">
    <section id="header" class="d-flex justify-content-center align-items-center">
      <div class="card-header">
        <h1>KOSTLY</h1>
        <p>Ingin Booking Kost Secara <u><i>Online</i></u>?<br />
          Ya di <b>KOSTLY</b> solusinya. Kostly hadir untuk mempermudah anda yang sedang mencari kost untuk dapat menemukan kost sesuai keinginan dengan fasilitas dan harga murah.</p>
        <a href="./kost.php" class="btn btn-warning">Explore</a>
      </div>
    </section>
  </div>
  <!-- header end -->

  <!-- about -->
  <div class="container-xxl px-0">
    <section id="about">
      <h1 class="text-center pt-5">About</h1>
      <p>Kostly hadir bagi anda yang tidak mau repot datang ke tempat kost,
        hanya untuk menanyakan harga dan fasilitas. Dengan menggunakan
        aplikasi ini, pengguna dapat melihat harga dan fasilitas kost secara langsung tanpa perlu datang ke tempat kost.</p>
        <a href="about.php" class="text-danger text-decoration-none">More...</a>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#d9d9d9e6" fill-opacity="1" d="M0,64L60,90.7C120,117,240,171,360,186.7C480,203,600,181,720,154.7C840,128,960,96,1080,96C1200,96,1320,128,1380,144L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
  </div>
  <!-- about end-->

  <!-- kost -->
  <div class="container-xxl px-0">
    <section id="kost">
      <h1 class="text-center">Kost</h1>
      <div class="row mx-auto">
        <div class="col d-flex justify-content-center">
          <div class="card w-100 p-1">
            <img src="../../assets/img/kostabah.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Kost abah, dekat dengan warung, cocok bagi anda yang tidak mau repot masak sendiri.</p>
            </div>
          </div>
        </div>
        <div class="col d-flex justify-content-center">
          <div class="card w-100 p-1">
            <img src="../../assets/img/grahakost.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Graha kost, terlihat mahal tapi ini tidak mahal, cocok bagi mahasiswa maupun pekerja.</p>
            </div>
          </div>
        </div>
        <div class="col d-flex justify-content-center">
          <div class="card w-100 p-1">
            <img src="../../assets/img/kostpupi.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Kost pupi, udara segar serta memiliki parkiran yang sangat luas.</p>
            </div>
          </div>
        </div>
      </div>
      <a href="./kost.php" class="btn btn-warning rounded-pill border border-dark px-5 my-3">More...</a>
    </section>
  </div>
  <!-- kost end -->

  <!-- footer -->
  <?php require_once "../../components/footer.php"; ?>
  <!-- footer end -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>