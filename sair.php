<?php 
session_start();
require_once 'vendor/autoload.php';
use App\Controller\UserController;
$sair = UserController::sair();                                                                                       