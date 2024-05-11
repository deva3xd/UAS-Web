<?php
include('../../../conf/koneksi.php');
$sql = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$_GET[id]'");
$data = mysqli_fetch_array($sql);

$sukses = '';

if (isset($_POST['submit'])) {
    mysqli_query($conn, "UPDATE pengguna SET nama_pengguna= '$_POST[nama]',
    ttl= '$_POST[ttl]',
    alamat_pengguna= '$_POST[alamat]',
    no_hp= '$_POST[nohp]'
    WHERE id_pengguna= '$_GET[id]'");

    $sukses = 'Data Berhasil Diedit';
    echo "<meta http-equiv=refresh content=1;URL='dataPengguna.php'>";
}
?>

<head>
    <link rel="stylesheet" href="../../../assets/css/style.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>


<div class="custom-container" style="background-color: #ffff;">
    <div class="custom-card" style="border: 1px solid black;">
        <?php if ($sukses != '') : ?>
            <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 mb-3"><?php echo $sukses; ?></div>
        <?php endif ?>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="<?php echo $data['nama_pengguna']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" value="<?php echo $data['alamat_pengguna']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ttl</label>
                <input type="text" name="ttl" value="<?php echo $data['ttl']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">No Handphone</label>
                <input type="text" name="nohp" value="<?php echo $data['no_hp']; ?>" class="form-control" required>
            </div>
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary border border-black">Edit</button>
            </div>
        </form>
    </div>
</div>