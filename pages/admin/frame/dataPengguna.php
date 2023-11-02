<?php
include '../../../conf/koneksi.php';

session_start();

// hapus data
if (isset($_GET['id'])) {
    mysqli_query($conn, "DELETE FROM pengguna WHERE id_pengguna='$_GET[id]'");

    echo "<script>alert('Data berhasil dihapus!)'</script>";
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body style="margin: 0 3px;">
    <table class="table table-dark table-hover">
        <thead class="table-light">
            <tr align="center">
                <th scope="col">Id Pengguna</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tempat dan Tgl Lahir</th>
                <th scope="col">No Handphone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM pengguna");
            while ($row = mysqli_fetch_array($query)) {
                echo "<tr align='center'>
                    <td>" . $row['id_pengguna'] . "</td>
                    <td>" . $row['nama_pengguna'] . "</td>
                    <td>" . $row['alamat_pengguna'] . "</td>
                    <td>" . $row['ttl'] . "</td>
                    <td>" . $row['no_hp'] . "</td>
                    <td><div class='btn-group' role='group' aria-label='Basic outlined example'>
                    <a class='btn btn-outline-light' href='editPengguna.php?id=$row[id_pengguna]'>Edit</a>
                    <a class='btn btn-outline-light' href='?id=$row[id_pengguna]'>Hapus</a></div></td>
                </tr>";
            } ?>
        </tbody>
    </table>
</body>