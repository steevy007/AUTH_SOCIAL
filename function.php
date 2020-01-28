<?php
require_once '../db_connect.php';
//verification de l unicite des mail
function verifyUser($email){
    global $conn;
    $req=$conn->prepare('SELECT * FROM user WHERE email=?');
    $req->execute([$email]);
    $nb=$req->rowCount();
    if($nb!=0){
        return true;
    }
}

//ajout des client non enregistree
function AddUserSO($nom,$prenom,$email,$sexe){
    global $conn;
    $req=$conn->prepare('INSERT INTO user(nom,prenom,email,sexe,created_at) VALUES(?,?,?,?,?)');
    $req->execute([$nom,$prenom,$email,$sexe,date('Y-m-d')]);
    
}