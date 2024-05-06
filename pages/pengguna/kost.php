<?php 
include '../../conf/koneksi.php';

$page = "Kost"; 
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
    <?php
    require_once "../../components/navbar.php";
    ?>
    <!-- navbar end -->

    <!-- list kost -->
    <div class="container-xxl bg-dark bg-gradient mt-5 p-5">
            <div class="row d-flex justify-content-center">
                <?php
                include('../../conf/koneksi.php');
                $query = mysqli_query($conn, "SELECT * FROM kost");

                while ($row = mysqli_fetch_assoc($query)) :
                ?>
                    <div class="col-3 my-2">
                        <div class="card h-100 text-center">
                            <img src="../../assets/img/<?php echo $row['gambar']; ?>" class="card-img-top" alt="<?php echo $row['nama'] ?>" height="200px">
                            <div class="card-body">
                                <h5 class="card-title"><b><?php echo $row['nama']; ?></b></h5>
                                <p class="card-text" style="text-align: left;">Lokasi: <?php echo $row['alamat']; ?><br />
                                    Jumlah Kamar: <?php echo $row['jumlah_kamar']; ?><br />Harga Sewa: Rp. <?php echo $row['harga_sewa']; ?></p>
                                <?php echo '<a class="btn btn-primary" href="./booking.php?id_kost=' . $row['id_kost'] . '">Booking</a>' ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
        </div>
    </div>
    <!-- list kost end -->

    <!-- footer -->
    <?php
    require_once "../../components/footer.php";
    ?>
    <!-- footer end -->
    <?php
    if (@$_GET['status'] == 'sukses') {
        echo '<script>
        Swal.fire({
            icon: "success",
            title: "Sukses ditambahkan",
            showConfirmButton: false,
            timer: 1000
        })
        </script>';
    } else if (@$_GET['status'] == 'gagal') {
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Gagal ditambahkan",
                showConfirmButton: false,
                timer: 1000
            })
            </script>';
    } else {
        echo '';
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>