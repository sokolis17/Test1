<?php

require_once __DIR__ . '/../helper.php';

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

//Validation
//EMAIL
if(empty($email)){
    addOldValue('email',$email);
    addValidationError('email','Укажите почту');
    setMessage('error',"Ошибка валидации");
    redirect('/login-and-register-new-layout/index.php');
}

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    addOldValue('email',$email);
    addValidationError('email','Невереный формат электронной почты');
    setMessage('error',"Ошибка валидации");
    redirect('/login-and-register-new-layout/index.php');
}

$user = findUser($email);

if(!$user){
    addOldValue('email',$email);
    setMessage('error',"Пользлватель $email не найден");
    redirect('/login-and-register-new-layout/index.php');
}

if(!password_verify($password, $user['password'])){
    setMessage('error',"Неверный логин или пароль");
    redirect('/login-and-register-new-layout/index.php');
}

$_SESSION['user']['id'] = $user['id'];
redirect('/login-and-register-new-layout/home.php')



















?>