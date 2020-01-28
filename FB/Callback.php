<?php
require_once '../config.php';
require_once '../function.php';
try{
    $accessToken=$handler->getAccessToken();
}catch(\Facebook\Exceptions\FacebookResponseException $e){
    echo 'Response Exceptions :'.$e->getMessage();
    exit();
}catch(\Facebook\Exceptions\FacebookSDKException $e){
    echo 'SDK Exception :'.$e->getMessage();
    exit();
}

if(!$accessToken){
    header('Location:index.php');
    exit();
}


$oAuth2Client=$FB->getOAuth2Client();
if(!$accessToken->isLongLived()){
    $accessToken=$oAuth2Client->getLongLivedAccessToken($accessToken);
}

$reponse=$FB->get('/me?fields=id,last_name,first_name,birthday,gender,hometown,email',$accessToken); 
$userData=$reponse->getGraphNode()->asArray();

/*
echo"<pre>";
var_dump($userData);*/

$_SESSION['fb_data']=$userData;
$_SESSION['fb_token']=$accessToken;


if($_SESSION['fb_token']){
    if(!verifyUser($_SESSION['fb_data']['email'])){
        AddUserSO($_SESSION['fb_data']['last_name'],$_SESSION['fb_data']['first_name'],$_SESSION['fb_data']['email'],$_SESSION['fb_data']['gender']);
        header('Location:../update_profil.php');
    }else{
        header('Location:../home.php');
    }
}else{
    header('Location:../index.php');
}
//echo verifyUser($_SESSION['fb_data']['email']);