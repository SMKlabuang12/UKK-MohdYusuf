<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
    body{
        background-image: url(warna1.jpg);
        background-size: cover;
        font-family: Arial;
        color: white;
    }
   </style>
</head>
<body>
    <br>
    <center><h1>Halaman Login</h1>
    <form action="proses_login.php" method="post">

    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Login"></td>
        </tr>
</center>
    </table>

    </form>
</body>
</html>