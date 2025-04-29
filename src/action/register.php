<?php
require_once __DIR__ . '/../helper.php';

print_r($_POST);


//DATA
$name = $_POST['name'];
$email = $_POST['name'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];


//VALIDATION
$_SESSION['validation'] = [];

if (empty($name)){
    $_SESSION['validation']['name'] = 'Неверное имя';
}

if (!empty($_SESSION['validation'])){
    redirect("/login-and-register-new-layout/register.php");
}