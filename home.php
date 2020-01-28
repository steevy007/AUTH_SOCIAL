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
    <title>Home</title>
</head>
<body>
    <h1>welcome <?= $_SESSION['fb_data']['last_name'].' '.$_SESSION['fb_data']['first_name'] ?></h1>
</body>
</html>