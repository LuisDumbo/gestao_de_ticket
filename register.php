<?php
$tittle = "Registar";
require 'component/head.php';
require_once 'vendor/autoload.php';
use App\Controller\UserController;
$add =  UserController::adicionar_usuario();

?>


<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="images/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label>Email </label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                   
                    <div class="register-link m-t-15 text-center">
                        <p>Já tem uma conta  ? <a href="login.php"> Faça o Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require  'component/footer.php'; ?>