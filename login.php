<?php
$tittle = "Login";
require 'component/head.php';
require 'vendor/autoload.php';

use App\Controller\UserController;
use App\Model\user;

$user = UserController::login();

?>

<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">


        <div class="login-content">

            <?php if ($user) : ?>

                <div class="Alert animate__animated animate__fadeInDown ">
                    <p class="Alert-text">Email e (ou) Password errados.</p>
                </div>

            <?php endif ?>

            <div class="login-logo">
                <a href="#">
                    <h4>Login</h4>
                    <img class="align-content" src="images/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>

                   


                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Login</button>


                    <div class="register-link m-t-15 text-center">
                        <p>Não tem uma conta ? <a href="register.php"> Faça o seu Cadastramento</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require  'component/footer.php'; ?>