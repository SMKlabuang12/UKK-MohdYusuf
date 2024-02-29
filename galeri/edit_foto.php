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
    <title>Halaman Edit Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container" style="margin: 0 auto; width: 300px; padding-top: 50px;">
    <ul>
        <button type="submit" class="btn btn-primary"><a href="album.php" style="text-decoration: none; color: white;">Album</a></button>
        <button type="submit" class="btn btn-danger"><a href="foto.php" style="text-decoration: none; color: white;">Foto</a></button>
        <button type="submit" class="btn btn-primary"><a href="logout.php" style="text-decoration: none; color: white;">Logout</a></button>
    </ul>
</div>
    <center>
    <h1>Halaman Edit Foto</h1>
    <p>Selamat Datang <b><?=$_SESSION['namalengkap']?></b></p>

    

    <form action="update_foto.php" method="post" enctype="multipart/form-data">
        <?php
            include "koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
    <table>
        <tr>
            <td>Judul</td>
            <td><input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td> 
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
                            $userid = $_SESSION['userid'];
                            $sql2 = mysqli_query($conn,"select * from album where userid='$userid'");
                            while($data2 = mysqli_fetch_array($sql2)) {
                        ?>
                            <option value="<?=$data2['albumid']?>" <?php if($data2['albumid']==$data['albumid']){echo 'selected';
                            }?>><?=$data2['namaalbum']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Ubah"></td>
        </tr>
    </table>
    <?php
            }
    ?>
    </form>
    </center>
       
</body>
</html>