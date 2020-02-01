<?php
require_once 'db_connect.php';
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

//selectionner les infos d un client en connaissant son email
function searchbyMail($email){
    global $conn;

    $req=$conn->prepare('SELECT * FROM user WHERE email=?');
    $req->execute([$email]);
    return $req->fetch(PDO::FETCH_OBJ);
}

//fonction permettant de mettre a jour un utilisateur
function update_profil($nom,$prenom,$date,$sexe,$password,$email){
    global $conn;
    $req=$conn->prepare('UPDATE user set nom=?,prenom=?,Date_Naissance=?,sexe=?,password=? WHERE email=?');
    $req->execute([$nom,$prenom,$date,$sexe,$password,$email]);

}

//function permettant de recuperer l'ancien mot de passe
function oldPass($email){
    global $conn;
    $req=$conn->prepare('SELECT password FROM user WHERE email=?');
    $req->execute([$email]);
    return $req->fetch(PDO::FETCH_OBJ);
}

//fonction permettant de sauvegarder les donnee en cas d'erreur
function saveData($nom,$prenom,$date,$sexe){
    $data=[
        'nom'=>$nom,
        'prenom'=>$prenom,
        'date'=>$date,
        'sexe'=>$sexe
    ];

    return $data;
}