<?php
session_start();
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
        <div class="col-md-8">
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
                            <form action="">
                            <table class="table  table-borderless">
                                <tbody>
                                    <tr>
                                    <td>Nom </td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="" type="text" id="inputPrefilledEx" class="form-control" required>
                                    </div>
                                    </td>
                                    </tr>

                                    <tr>
                                    <td>Prenom </td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="" type="text" id="inputPrefilledEx" class="form-control">
                                    </div>
                                    </td>
                                    </tr>

                                    <tr>
                                    <td>Email </td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="" type="text" id="inputPrefilledEx" class="form-control">
                                    
                                    </div>
                                    </td>
                                    </tr>


                                    <tr>
                                    <td>Date de Naissance </td>
                                    <td>
                                        <!-- Material input -->
                                    <div class="md-form">
                                    <input value="" type="date" id="inputPrefilledEx" class="form-control">
                                    </div>
                                    </td>
                                    </tr>

                                    <td>sexe </td>
                                    <td>
                                    <select class="browser-default custom-select">
                                    <option value="male" selected>male</option>
                                    <option value="female">female</option>
                                    </select>
                                    </td>
                                    </tr>


                                    <tr>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    </tr>
                                    
                                </tbody>
                        </table>
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