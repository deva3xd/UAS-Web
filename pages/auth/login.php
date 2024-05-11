<?php
include '../../conf/koneksi.php';

$page = 'Login';

session_start();
$error = '';

if (isset($_POST['submit'])) { 
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!empty(trim($username)) && !empty(trim($password))) {
        $sql = mysqli_query($conn, "SELECT * FROM pengguna WHERE username='$username' and password='$password'");
        $cek = mysqli_num_rows($sql);
        if ($cek > 0) {
            $data = mysqli_fetch_assoc($sql);
            $_SESSION['username'] = $username;
            if ($data['role'] == "admin") {
                header("Location: ../admin/berandaAdmin.php");
            } else {
                header("Location: ../pengguna/home.php");
            }
        } else {
            $error = 'Login Gagal!!';
        }
    } else {
        $error = 'Data tidak boleh kosong!!';
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
    <!-- form -->
    <div class="container-xxl d-flexpx-0 d-flex align-items-center p-0" style="height: 100vh; max-height: 800px;">
        <div class="h-100 bg-dark login-bg"></div>
        <div class="d-flex align-items-center justify-content-center mx-auto">
            <form action="" method="post">
                <div class="d-flex justify-content-between">
                    <h1 class="mb-3"><u>Login</u></h1>
                    <a href="../pengguna/home.php" class="btn btn-danger btn-sm d-flex align-items-center my-3">Kembali</a>
                </div>
                <?php if ($error != '') : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif ?>
                <div class="mb-3">
                    <label class="fw-light">Username</label>
                    <input type="text" name="username" class="form-control rounded-5" placeholder="username" required>
                </div>
                <div class="mb-3">
                    <label class="fw-light">Password</label>
                    <input type="password" name="password" class="form-control rounded-5" placeholder="password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-primary rounded-5 border border-none" style="background-color: #241A10;">Login</button>
                    <div class="mt-2">
                        Belum Punya Akun? <a class="float-end " style="text-decoration: none;" href="register.php">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- form end -->
</body>

</html>