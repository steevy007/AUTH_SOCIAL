<?php
    require_once 'config.php';

    $RedirectUrl="http://localhost:8000/FB/callback.php";
    $permission=['email'];
    $FullUrl=$handler->getLoginUrl($RedirectUrl,$permission);
    if(isset($_SESSION['fb_data'])){
        header('Location:home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            background-image: radial-gradient(circle, rgba(128, 128, 128, 0.685), rgba(0, 0, 0, 0.712), black);
        }
    </style>
    <?php require_once 'style.php' ?>
    <title>Login</title>
</head>
<body>
    <div class="content">
        <div class="col-md-6 shadow p-3 mb-5 bg-white rounded">
            <!-- Default form login -->
<form class="text-center border border-light p-5" action="#!">

<p class="h4 mb-4">Sign in</p>

<!-- Email -->
<input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

<!-- Password -->
<input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

<div class="d-flex justify-content-around">
    <div>
        <!-- Remember me -->
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
            <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
        </div>
    </div>
    <div>
        <!-- Forgot password -->
        <a href="">Forgot password?</a>
    </div>
</div>

<!-- Sign in button -->
<button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

<!-- Register -->
<p>Not a member?
    <a href="">Register</a>
</p>

<!-- Social login -->
<p>or sign in with:</p>

<a href="<?=$FullUrl?>" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
<a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
<a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
<a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

</form>
<!-- Default form login -->
        </div>
    </div>
    <?php require_once 'js.php' ?>
</body>
</html>