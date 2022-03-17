<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Üdvözlünk!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Üdvözlünk!</h1> 
    <h2>Bejelentkezve ezzel az e-mail címmel: <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b></h2>
    </br>
    <p><a href="logout.php" class="btn btn-danger ml-3">Kijelentkezés a fiókból</a></p>
</body>
</html>