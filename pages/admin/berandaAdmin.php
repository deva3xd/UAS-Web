<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../pengguna/login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../assets/css/style.css" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <title>Beranda Admin - Kostly</title>
</head>

<body>
  <div class="container-xxl d-flex p-0 bg-dark" style="height: 100vh; max-height: 650px;">
    <!-- left -->
    <div style="width: 20%;">
      <div class="col-12">
        <a class="text-start px-3 btn btn-danger w-100 py-1 rounded-0" href="../../conf/logout.php" role="button">Logout</a>
      </div>
      <div class="col-12 py-4 text-white" style="background-color: #1a1e22;">
        <h3 align="center">
          KOSTLY
        </h3>
      </div>
      <div class="col-12 px-3">
        <button class="px-0 btn w-100 border-bottom rounded-0 text-white text-start" onclick="changeIframeSource('./frame/dataKost.php')">
          Data Kos
        </button>
      </div>
      <div class="col-12 px-3">
        <button class="px-0 btn w-100 border-bottom rounded-0 text-white text-start" onclick="changeIframeSource('./frame/dataPengguna.php')">
          Data Pengguna
        </button>
      </div>
      <div class="col-12 px-3">
        <button class="px-0 btn w-100 border-bottom rounded-0 text-white text-start" onclick="changeIframeSource('./frame/dataBooking.php')">
          Data Booking
        </button>
      </div>
    </div>
    <!-- right -->
    <div style="width: 80%;">
      <iframe id="handleIframe" src="./frame/dataKost.php" width="100%" height="98%"></iframe>
    </div>
  </div>
  <script src="../../assets/js/script.js"></script>
</body>

</html>