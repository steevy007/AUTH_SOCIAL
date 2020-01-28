<?php
//nom de l utilisateur de la base de donnee
$username='root';
//password de la base
$password='';
$servername='localhost';
try
{
    $conn = new PDO("mysql:host=$servername;dbname=social_connect", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
 {
    die ("Erreur:".$e->getmessage());
 }
 ?>
