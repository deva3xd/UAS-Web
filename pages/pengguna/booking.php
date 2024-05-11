<?php
include '../../conf/koneksi.php';

$page = "Booking Kost";

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php"); // Pengguna tidak login, arahkan ke halaman login
    exit();
} else {
    $login = $_SESSION['username'];
    $sqlUser = "SELECT nama_pengguna, alamat_pengguna, ttl, no_hp FROM pengguna WHERE username = '$login'";
    $result = $conn->query($sqlUser);
    if ($result->num_rows > 0) {
        // Tampilkan data yang diambil
        while ($row = $result->fetch_assoc()) {
            $nama = $row['nama_pengguna'];
            $no_hp = $row['no_hp'];
        }
    }

    $id = $_GET['id_kost'];
    $sql = "SELECT * FROM kost WHERE id_kost = '$id'";
    $query = mysqli_query($conn, $sql);
    $kost = mysqli_fetch_assoc($query);
    $kostNama = $kost['nama'];
    $kostAlamat = $kost['alamat'];
    $kostHarga = $kost['harga_sewa'];
    $error = '';

    if (isset($_POST['submit'])) {
        $id = rand(100, 900);
        $namaKost = $_POST['nama_kost'];
        $alamatKost = $_POST['alamat'];
        $hargaKost = $_POST['harga'];
        $jumlahBulan = $_POST['jumlah_bulan'];
        $total_harga = $jumlahBulan * $hargaKost;
        if (!empty(trim($namaKost)) && !empty(trim($alamatKost)) && !empty(trim($hargaKost)) && !empty(trim($jumlahBulan))) {
            $final = mysqli_query($conn, "INSERT INTO booking (id_booking, nama_kost, alamat_kost, harga_sewa, jumlah_bulan, total_harga, nama_pengguna, no_telp) VALUES ('$id', '$kostNama', '$kostAlamat', $kostHarga, $jumlahBulan, $total_harga, '$nama', $no_hp)");
            if ($final) {
                header('Location: kost.php?status=sukses');
            } else {
                header('Location: kost.php?status=gagal');
            }
        } else {
            $error = 'Data tidak boleh kosong!!';
        }
    }
}
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

    <!-- form -->
    <div class="container-fluid bg-dark bg-gradient d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="custom-card">
            <form action="" method="post">
                <h1 class="mb-3 text-center text-white">Booking Kost</h1>
                <?php if ($error != '') : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif ?>
                <fieldset>
                    <div class="mb-2">
                        <input type="teks" name="nama_kost" class="form-control rounded-5" placeholder="Nama Kost" value="<?php echo $kost['nama'] ?>" readonly>
                    </div>
                    <div class="mb-2">
                        <input type="text" name="alamat" class="form-control rounded-5" placeholder="Alamat" value="<?php echo $kost['alamat'] ?>" readonly>
                    </div>
                    <div class="mb-2">
                        <input type="text" name="harga" class="form-control rounded-5" placeholder="Harga/bulan" value="<?php echo $kost['harga_sewa'] ?>" readonly>
                    </div>
                </fieldset>
                <div class="mb-2">
                    <input type="number" name="jumlah_bulan" class="form-control rounded-5" placeholder="Jumlah Bulan Sewa" required>
                </div>
                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-primary rounded-5 border" style="background-color: #241A10;">Send</button>
                </div>
            </form>
        </div>
    </div>
    <!-- form end -->

    <!-- footer -->
    <?php require_once "../../components/footer.php"; ?>
    <!-- footer end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>