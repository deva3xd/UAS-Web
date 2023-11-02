<?php
include '../../conf/koneksi.php';

$page = 'Register';

session_start();
$error = '';

if (isset($_POST['submit'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $nama     = stripslashes($_POST['nama']);
    $nama     = mysqli_real_escape_string($conn, $nama);
    $alamat   = stripslashes($_POST['alamat']);
    $alamat   = mysqli_real_escape_string($conn, $alamat);
    $ttl      = stripslashes($_POST['ttl']);
    $ttl      = mysqli_real_escape_string($conn, $ttl);
    $nohp     = stripslashes($_POST['nohp']);
    $nohp     = mysqli_real_escape_string($conn, $nohp);

    if (!empty(trim($nama)) && !empty(trim($username)) && !empty(trim($alamat)) && !empty(trim($password)) && !empty(trim($ttl)) && !empty(trim($nohp))) {
        $pass   = password_hash($password, PASSWORD_DEFAULT);
        $sql  = mysqli_query($conn, "INSERT INTO pengguna (username, password, nama_pengguna, ttl, alamat_pengguna, no_hp) VALUES ('$username','$password','$nama','$alamat','$ttl','$nohp')");
        if ($sql) {
            $_SESSION['username'] = $username;
            header('Location: login.php');
        } else {
            $error = 'Register Gagal!!';
        }
    } else {
        $error = 'Data tidak boleh kosong!!';
    }
}

// function cek_nama($username, $conn)
// {
//     $nama = mysqli_real_escape_string($conn, $username);
//     $sql = "SELECT * FROM pengguna WHERE username = '$nama'";
//     if ($result = mysqli_query($conn, $sql)) return mysqli_num_rows($result);
// }
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
    <!-- form -->
    <div class="container-xxl d-flexpx-0 d-flex align-items-center p-0" style="height: 100vh; max-height: 800px;">
        <div class="h-100 bg-dark login-bg"></div>
        <div class="d-flex align-items-center justify-content-center mx-auto">
            <form action="" method="post">
            <div class="d-flex justify-content-between">
                    <h1 class="mb-3"><u>Register</u></h1>
                    <a href="./home.php" class="btn btn-danger btn-sm d-flex align-items-center my-3">Kembali</a>
                </div>
                <?php if ($error != '') : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif ?>
                <div class="mb-2">
                <label class="fw-light">Username</label>
                    <input type="text" name="username" class="form-control rounded-5" placeholder="Username">
                </div>
                <div class="mb-2">
                <label class="fw-light">Password</label>
                    <input type="password" name="password" class="form-control rounded-5" placeholder="Password">
                </div>
                <div class="mb-2">
                <label class="fw-light">Nama</label>
                    <input type="text" name="nama" class="form-control rounded-5" placeholder="Nama">
                </div>
                <div class="mb-2">
                <label class="fw-light">Alamat</label>
                    <input type="text" name="alamat" class="form-control rounded-5" placeholder="Alamat">
                </div>
                <div class="mb-2">
                <label class="fw-light">Tempat dan Tgl Lahir</label>
                    <input type="text" name="ttl" class="form-control rounded-5" placeholder="Tempat dan Tgl Lahir">
                </div>
                <div class="mb-3">
                <label class="fw-light">No. Handphone</label>
                    <input type="text" name="nohp" class="form-control rounded-5" placeholder="No. Handphone">
                </div>
                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-primary rounded-5 border border-none" style="background-color: #241A10;">Register</button>
                    <div class="mt-2">
                        Sudah Punya Akun? <a class="float-end " style="text-decoration: none;" href="login.php">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- form end -->
</body>

</html>