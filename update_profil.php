<?php
session_start();
if(!isset($_SESSION['fb_data'])){
    header('Location:index.php');
}else{
    require_once 'function.php';
    $data=searchbyMail($_SESSION['fb_data']['email']);
    $err=[];
    $dataErr=[];
    if(isset($_POST['sub'])){
        extract($_POST);
        if(empty($nom) and empty($prenom)){
            $err[]='le nom et le prenom ne peut etre vide';
        }


        if($pass1!=$pass2){
            $err[]='Mot de passe non identique';
        }


        if($dateN>=date('Y-m-d')){
            $err[]='Date de Naissance invalide'; 
        }



        if(count($err)==0){
            //echo $old_pass->password;
            update_profil($nom,$prenom,$dateN,$sexe,$pass1,$_SESSION['fb_data']['email']);
            header('Location:home.php');
            
        }else{
            $dataErr[]=saveData($nom,$prenom,$dateN,$sexe);
           //echo $dataErr[0]['nom'];
            /*foreach($dataErr as $value){
                var_dump($dataErr[0]['nom']);
            }*/
        }
    }
}

$size = 40;
$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $_SESSION['fb_data']['email'] ) ) ) ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once 'style.php' ?>
    <title>Update_Profil</title>
</head>
<body>
    <div class="content">
        <div class="col-md-8 col-sm-12 ">
            <div class="row ">
                <div class="col-md-4 col-sm-12">
                    <div class="row">
                        <div class="col-md-12">
                            <img class="avatar" src="<?= $grav_url?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="div col-md-8 col-sm-12">
                    <div class="row shadow p-3 mb-5 bg-white rounded">
                        <div class="col-md-12 ">
                            <form method="POST"  data-parsley-validate>
                            <table class="table  table-borderless">
                                <tbody>
                                    <tr>
                                    <td>Nom </td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="<?= isset($dataErr[0]['nom'])?$dataErr[0]['nom']:$data->nom?>" type="text" id="inputPrefilledEx" class="form-control" name="nom"
data-parsley-required>
                                    </div>
                                    </td>
                                    </tr>

                                    <tr>
                                    <td>Prenom </td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="<?= isset($dataErr[0]['prenom'])?$dataErr[0]['prenom']:$data->prenom?>" type="text" id="inputPrefilledEx" class="form-control" name="prenom" 
data-parsley-required>
                                    </div>
                                    </td>
                                    </tr>

                                    <td>Date de Naissance </td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="<?= isset($dataErr[0]['date'])?$dataErr[0]['date']:$data->Date_Naissance?>" type="date" id="inputPrefilledEx" class="form-control" name="dateN">
                                    </div>
                                    </td>
                                    </tr>

                                    <td>sexe </td>
                                    <td>
                                    <select class="browser-default custom-select" name="sexe">
                                    <option value="male" <?= $data->sexe=='male'?'selected':'' ?>>male</option>
                                    <option value="female" <?= $data->sexe=='female'?'selected':'' ?>>female</option>
                                    </select>
                                    </td>
                                    </tr>

                                   

                                    <tr>
                                    <td>Nouveau Password</td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="" type="password" id="pass2" class="form-control" data-parsley-length="[6, 10]" data-parsley-trigger="keyup" name="pass1">
                                    </div>
                                    </td>
                                    </tr>

                                    <tr>
                                    <td>Confirmation de mot de passe</td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="" id="inputPrefilledEx" class="form-control" data-parsley-equalto="#pass2" data-parsley-trigger="keyup" name="pass2">
                                    </div>
                                    </td>
                                    </tr>
                                </tbody>
                        </table>
                        <div class="row">
                                <div class="col-md-12 text-right">
                                    <?php
                                    if(isset($err) and !empty($err)){
                                    ?>    
                                        <div class="alert alert-danger" role="alert">
                                        <span><?php
                                            foreach($err as $value){
                                                echo "$value</br>";
                                            }
                                        ?></span>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <input type="submit" class="btn btn-primary" value="Update" name="sub">
                                    <a href="home.php" class="btn btn-dark">Annuler</a>
                                </div>
                            </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'js.php' ?>
</body>
</html>