<?php
session_start();
if(!isset($_SESSION['fb_data'])){
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once 'style.php'; ?>
    <style>
        body{
            background-image: radial-gradient(circle, rgba(128, 128, 128, 0.685), rgba(0, 0, 0, 0.712), black);
        }
    </style>
    <title>Home</title>
</head>
<body>
    
    <div class="content">
        <div class="drop ">
        <div class="wel">
            <span><h4> Bienvenue <?= $_SESSION['fb_data']['first_name'] ?> </h4></span>
        </div>
        <br>
        <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Dropdown
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
            <a class="dropdown-item" href="update_profil.php">Update profil</a>
            <a class="dropdown-item" href="deconnect.php">Logout</a>
        </div>
        </div>
        </div>
    </div>
    
    <?php require_once 'js.php'; ?>
</body>
</html>