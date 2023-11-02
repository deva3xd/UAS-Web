<?php
include '../../../conf/koneksi.php';

session_start();

// input data
$error = '';
if (isset($_POST['submit'])) {
    $id      = stripslashes($_POST['id_kost']);
    $id      = mysqli_real_escape_string($conn, $id);
    $nama    = stripslashes($_POST['nama']);
    $nama    = mysqli_real_escape_string($conn, $nama);
    $alamat  = stripslashes($_POST['alamat']);
    $alamat  = mysqli_real_escape_string($conn, $alamat);
    $jumlah  = stripslashes($_POST['jumlah_kamar']);
    $jumlah  = mysqli_real_escape_string($conn, $jumlah);
    $harga   = stripslashes($_POST['harga_sewa']);
    $harga   = mysqli_real_escape_string($conn, $harga);

    // upload gambar
    $direktori = "../../../assets/img/";
    $file_name = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], $direktori . $file_name);

    if (!empty(trim($id)) && !empty(trim($nama)) && !empty(trim($alamat)) && !empty(trim($jumlah)) && !empty(trim($harga)) && !empty(trim($file_name))) {
        $sql  = mysqli_query($conn, "INSERT INTO kost (id_kost, nama, alamat, jumlah_kamar, harga_sewa, gambar) VALUES ('$id','$nama','$alamat','$jumlah','$harga','$file_name')");
        if ($sql) {
            $_SESSION['nama'] = $nama;
            header('Location: dataKost.php');
        } else {
            $error = 'Register User Gagal !!';
        }
    } else {
        $error =  'Data tidak boleh kosong !!';
        echo "<script>alert('Gagal!')</script>";
    }
}

function cek_nama($nama, $conn)
{
    $nama = mysqli_real_escape_string($conn, $nama);
    $sql = "SELECT * FROM kost WHERE nama = '$nama'";
    if ($result = mysqli_query($conn, $sql)) return mysqli_num_rows($result);
}

// hapus data
if (isset($_GET['id'])) {
    mysqli_query($conn, "DELETE FROM kost WHERE id_kost='$_GET[id]'");

    echo "<script>alert('Data berhasil dihapus!)'</script>";
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<!-- tabel -->

<body style="margin: 0 3px;">
    <table class="table table-dark table-hover">
        <thead class="table-light">
            <tr align="center">
                <th scope="col">Id Kost</th>
                <th scope="col">Nama Kost</th>
                <th scope="col">Alamat Kost</th>
                <th scope="col">Jumlah Kamar</th>
                <th scope="col">Harga</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM kost");
            while ($row = mysqli_fetch_array($query)) {
                $harga = $row['harga_sewa'] == 0 ? '' : number_format($row['harga_sewa'], 0, ',', '.');
                echo "<tr align='center'>
                    <td>" . $row['id_kost'] . "</td>
                    <td>" . $row['nama'] . "</td>
                    <td>" . $row['alamat'] . "</td>
                    <td>" . $row['jumlah_kamar'] . "</td>
                    <td>" . $harga . "</td>
                    <td><div class='btn-group' role='group' aria-label='Basic outlined example'>
                    <a class='btn btn-outline-light' href='editKost.php?id=$row[id_kost]'>Edit</a>
                    <a class='btn btn-outline-light' href='?id=$row[id_kost]'>Hapus</a>
                    </div></td>
                </tr>";
            } ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data
    </button>
    <!-- end tabel -->

    <!-- modal tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if ($error != '') : ?>
                        <div class="p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3 mb-3"><?php echo $error; ?></div>
                    <?php endif ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div>
                            <input type="text" name="id_kost" id="id_kost" class="form-control" placeholder="Id Kost">
                        </div>
                        <div>
                            <input type="text" name="nama" class="form-control mt-3" id="exampleInputPassword1" placeholder="Nama Kost">
                        </div>
                        <div>
                            <input type="text" name="alamat" class="form-control mt-3" placeholder="Alamat Kost">
                        </div>
                        <div>
                            <input type="text" name="jumlah_kamar" class="form-control mt-3" placeholder="Jumlah Kamar">
                        </div>
                        <div>
                            <input type="text" name="harga_sewa" class="form-control mt-3" placeholder="Harga Sewa">
                        </div>
                        <div>
                            <input type="file" name="gambar" id="gambar" class="form-control mt-3">
                        </div>
                        <div class="my-3">
                            <button type="submit" name="submit" class="btn btn-primary border border-black">Tambah</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>