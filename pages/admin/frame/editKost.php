<?php
include('../../../conf/koneksi.php');
$sql = mysqli_query($conn, "SELECT * FROM kost WHERE id_kost='$_GET[id]'");
$data = mysqli_fetch_array($sql);

$sukses = '';

if (isset($_POST['submit'])) {
    if ($_FILES['gambar']['name']) {
        $direktori = "../../../assets/img/";
        $file_name = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], $direktori . $file_name);

        // hapus gambar lama jika ada
        if ($data['gambar']) {
            unlink($direktori . $data['gambar']);
        }

        $gambar = $file_name;
    } else {
        $gambar = $data['gambar']; // gunakan gambar lama jika tidak ada gambar baru
    }

    mysqli_query($conn, "UPDATE kost SET nama= '$_POST[nama]',
    alamat= '$_POST[alamat]',
    jumlah_kamar= '$_POST[jumlah]',
    harga_sewa= '$_POST[harga]',
    gambar= '$gambar'
    WHERE id_kost= '$_GET[id]'");

    $sukses = 'Data Berhasil Diedit';
    echo "<meta http-equiv=refresh content=1;URL='dataKost.php'>";
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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nama Kost</label>
                <input type="text" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" require>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat Kost</label>
                <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" class="form-control" require>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Kamar</label>
                <input type="text" name="jumlah" value="<?php echo $data['jumlah_kamar']; ?>" class="form-control" require>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="text" name="harga" value="<?php echo $data['harga_sewa']; ?>" class="form-control" require>
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control" require>
            </div>
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary border border-black">Edit</button>
            </div>
        </form>
    </div>
</div>