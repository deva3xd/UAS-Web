<nav class="navbar navbar-expand-lg p-2 navbar-dark fixed-top">
    <div class="container-fluid d-flex align-items-center">
        <div class="navbar-brand">
            <b>Kostly</b>
        </div>
        <div class="collapse navbar-collapse space d-flex flex-row-reverse" id="navbarNav">
            <ul class="navbar-nav fw-semibold">
                <li class="nav-item ms-3">
                    <a <?php echo ($page == 'Home') ? "class= 'nav-link bg-warning text-dark'" : "class= 'nav-link'" ?> href="home.php">Home</a>
                </li>
                <li class="nav-item ms-3">
                    <a <?php echo ($page == 'About') ? "class= 'nav-link bg-warning text-dark'" : "class= 'nav-link'" ?> href="about.php">About</a>
                </li>
                <li class="nav-item ms-3">
                    <a <?php echo ($page == 'Kost') ? "class= 'nav-link bg-warning text-dark'" : "class= 'nav-link'" ?> href="kost.php">Kost</a>
                </li>
                <?php
                if (!isset($_SESSION['username'])) {
                    echo '
                    <div class="dropdown ms-3">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Guest
                        </button>
                        <ul class="dropdown-menu bg-primary dropdown-menu-end">
                            <li>
                                <a href="login.php" class="dropdown-item bg-primary text-white">Login</a>
                            </li>
                        </ul>
                    </div>';
                } else {
                    $login = $_SESSION['username'];
                    $sql = "SELECT nama_pengguna, alamat_pengguna, ttl, no_hp FROM pengguna WHERE username = '$login'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $nama = $row['nama_pengguna'];
                        }
                    }
                    echo '
                    <div class="dropdown ms-3">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            '.$nama.'
                        </button>
                        <ul class="dropdown-menu bg-danger dropdown-menu-end">
                            <li>
                                <a href="../../conf/logout.php" class="dropdown-item bg-danger text-white">Logout</a>
                            </li>
                        </ul>
                    </div>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>