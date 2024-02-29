<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    
</head>
<body>
    <div class="container" style="margin: 0 auto; width: 300px; padding-top: 50px;">
    <ul>
        <button type="submit" class="btn btn-primary"><a href="album.php" style="text-decoration: none; color: white;">Album</a></button>
        <button type="submit" class="btn btn-primary"><a href="foto.php" style="text-decoration: none; color: white;">Foto</a></button>
        <button type="submit" class="btn btn-primary"><a href="logout.php" style="text-decoration: none; color: white;">Logout</a></button>
    </ul>
    </div>

    <center>
    <h1>Halaman Album</h1>
    <p>Selamat Datang <b><?=$_SESSION['namalengkap']?></b></p>

   
    <form action="tambah_album.php" method="post">

    <table>
        <tr>
            <td>Nama Album</td>
            <td><input type="text" name="namaalbum"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><input type="text" name="deskripsi"></td> 
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Tambah"></td>
        </tr>
    </table>
    </form>

        <table class="table-bordered" border="1" cellpadding=5 cellspacing=0>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Tanggal dibuat</th>
                <th>Aksi</th>
            </tr>
            <?php
                include "koneksi.php";
                $userid=$_SESSION['userid'];
                $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                while($data=mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td><?=$data['albumid']?></td>
                <td><?=$data['namaalbum']?></td>
                <td><?=$data['deskripsi']?></td>
                <td><?=$data['tanggaldibuat']?></td>
                <td>
                    <a href="hapus_album.php?albumid=<?=$data['albumid']?>">Hapus</a>
                    <a href="edit_album.php?albumid=<?=$data['albumid']?>">Edit</a>
                </td>
            </tr>
            
            <?php

                }
            ?>
        </table>
        </center>
</body>
</html>