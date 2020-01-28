<?php
session_start();
//autoloading des fichier facebook
require_once 'Facebook/autoload.php';
//creation de l'objet qui nous permettras d'acceder a notre application 
$FB=new \Facebook\Facebook([
    'app_id'=>'2564719807144269',
    'app_secret'=>'5333e4d35e6e5a2106ff0753c6f61681',
    'default_graph_version'=>'v2.10'
]);

$handler=$FB->getRedirectLoginHelper();