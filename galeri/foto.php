<?php
    session_start();
    if(!isset($_SESSION['userid'])) {
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<div class="container" style="margin: 0 auto; width: 700px; padding-top: 50px; padding-left: 160px;">
    <ul>
        <button type="submit" class="btn btn-primary"><a href="home.php" style="text-decoration: none; color: white;">Home</a></button>
        <button type="submit" class="btn btn-danger"><a href="album.php" style="text-decoration: none; color: white;">Album</a></button>
        <button type="submit" class="btn btn-primary"><a href="foto.php" style="text-decoration: none; color: white;">Foto</a></button>
        <button type="submit" class="btn btn-danger"><a href="logout.php" style="text-decoration: none; color: white;">Logout</a></button>
    </ul>
    </div>
    <center>

    <h1>Halaman Foto</h1>
    <p>Selamat Datang <b><?= $_SESSION['namalengkap'] ?></b></p>

   

    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                        <?php
                            include "koneksi.php";
                            $userid = $_SESSION['userid'];
                            $sql = mysqli_query($conn,"select * from album where userid='$userid'");
                            while($data = mysqli_fetch_array($sql)) {
                        ?>
                            <option value="<?= $data['albumid']?>"><?=$data['namaalbum']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <table class="table-bordered" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid = $_SESSION['userid'];
            $sql = mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
            while($data = mysqli_fetch_array($sql)) {
        ?>
        <tr>
            <td><?= $data['fotoid'] ?></td>
            <td><?= $data['judulfoto'] ?></td>
            <td><?= $data['deskripsifoto'] ?></td>
            <td><?= $data['tanggalunggah'] ?></td>
            <td>
                <img src="gambar/<?=$data['lokasifile']?>" width="200px">
            </td>
            <td><?= $data['namaalbum']?></td>
            <td>
                <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">Hapus</a>
                <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>">Edit</a>
            </td>
        </tr>


        <?php
            }
        ?>
    </table>
    </center>
</body>
</html>