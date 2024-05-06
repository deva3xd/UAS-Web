<?php
include '../../../conf/koneksi.php';

session_start();

if (isset($_GET['id'])) {
    mysqli_query($conn, "DELETE FROM booking WHERE id_booking='$_GET[id]'");

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
                <th scope="col">Id Booking</th>
                <th scope="col">Nama Kost</th>
                <th scope="col">Harga Sewa</th>
                <th scope="col">Jumlah Bulan</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">No. Telp</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM booking");
            while ($row = mysqli_fetch_array($query)) {
                echo "<tr align='center'>
                    <td>" . $row['id_booking'] . "</td>
                    <td>" . $row['nama_kost'] . "</td>
                    <td>" . $row['harga_sewa'] . "</td>
                    <td>" . $row['jumlah_bulan'] . "</td>
                    <td>" . $row['total_harga'] . "</td>
                    <td>" . $row['nama_pengguna'] . "</td>
                    <td>" . $row['no_telp'] . "</td>
                    <td><div class='btn-group' role='group' aria-label='Basic outlined example'>
                    <a class='btn btn-outline-light' href='?id=$row[id_booking]'>Hapus</a>
                    </div></td>
                </tr>";
            } ?>
        </tbody>
    </table>
</body>