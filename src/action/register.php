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
    addValidationError('name','Неверное имя');
}

if (!filter_var($email , FILTER_VALIDATE_EMAIL)){
    addValidationError('email','Некорректный email');
}

if (empty($password)){
    addValidationError('password','Введите пароль');
}

if ($password === $password_confirmation){
    addValidationError('password_confirmation','Пароил не совпададют');
}

if (!empty($_SESSION['validation'])){
    redirect("/login-and-register-new-layout/register.php");
}