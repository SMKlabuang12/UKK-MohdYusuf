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
    <title>Halaman Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    body{
        background-image: url(biru\(1\).jpg);
        background-size: cover;
        font-family: Arial;
    }
   </style>
</head>
<body>
    <center>
    
    <h1>Halaman Home</h1>
    <p>Selamat Datang <b><?=$_SESSION['namalengkap']?></b></p>
    <div class="container" style="margin: 0 auto; width: 300px; padding-top: 50px;">
    <ul>
        <button type="submit" class="btn btn-primary"><a href="album.php" style="text-decoration: none; color: white;">Album</a></button>
        <button type="submit" class="btn btn-danger"><a href="logout.php" style="text-decoration: none; color: white;">Logout</a></button>
    </ul>
</div>
</center>
</body>
</html>