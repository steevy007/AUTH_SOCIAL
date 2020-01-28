<?php
session_start();
if(!isset($_SESSION['fb_data'])){
    header('Location:index.php');
}else{
    require_once 'function.php';
    $data=searchbyMail($_SESSION['fb_data']['email']);
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
        <div class="col-md-8 ">
            <div class="row ">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <img class="avatar" src="<?= $grav_url?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="div col-md-8">
                    <div class="row shadow p-3 mb-5 bg-white rounded">
                        <div class="col-md-12 ">
                            <form action="" data-parsley-validate>
                            <table class="table  table-borderless">
                                <tbody>
                                    <tr>
                                    <td>Nom </td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="<?= $data->nom?>" type="text" id="inputPrefilledEx" class="form-control" 
data-parsley-required>
                                    </div>
                                    </td>
                                    </tr>

                                    <tr>
                                    <td>Prenom </td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="<?= $data->prenom?>" type="text" id="inputPrefilledEx" class="form-control" 
data-parsley-required>
                                    </div>
                                    </td>
                                    </tr>

                                    <td>Date de Naissance </td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="<?= $data->date_Naissance?>" type="date" id="inputPrefilledEx" class="form-control">
                                    </div>
                                    </td>
                                    </tr>

                                    <td>sexe </td>
                                    <td>
                                    <select class="browser-default custom-select">
                                    <option value="<?$data->date_Naissance=='male'?:'selected'?>" >male</option>
                                    <option value="<?$data->date_Naissance=='female'?:'selected'?>">female</option>
                                    </select>
                                    </td>
                                    </tr>

                                    <?php
                                    if(!empty($data->password)){
                                    ?>
                                    <tr>
                                    <td>Ancien Mot de passe</td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="<?= $data->password?:''?>" type="password" id="inputPrefilledEx" class="form-control" >
                                    </div>
                                    </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>

                                    <tr>
                                    <td>Nouveau Password</td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="<?= $data->password?:''?>" type="password" id="pass2" class="form-control" data-parsley-length="[6, 10]" data-parsley-trigger="keyup">
                                    </div>
                                    </td>
                                    </tr>

                                    <tr>
                                    <td>Confirmation de mot de passe</td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="" id="inputPrefilledEx" class="form-control" data-parsley-equalto="#pass2" data-parsley-trigger="keyup">
                                    </div>
                                    </td>
                                    </tr>
                                </tbody>
                        </table>
                        <div class="row">
                                <div class="col-md-12 text-right">
                                    <?php
                                    if(isset($_SESSION['err']) and !empty($_SESSION['err'])){
                                    ?>    
                                        <div class="alert alert-danger" role="alert">
                                        
                                </div>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <input type="submit" class="btn btn-primary" value="Update">
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