<?php
require_once __DIR__ . '/../helper.php';

print_r($_POST);


//DATA
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];

//Блок для старах значений ввода
addOldValue('name',$name);
addOldValue('email',$email);

//VALIDATION
$_SESSION['validation'] = [];

//name
if (empty($name)){
    addValidationError('name','Неверное имя');
}

//email
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    addValidationError('email','Почта указана неверно');
}
//password
if(empty($password)){
    addValidationError('password','Заполните пароль');
}
//passwordconf
if(!($password === $password_confirmation)){
    addValidationError('password_confirmation','Пароли должны совпадать');
}



//Редирект
if (!empty($_SESSION['validation'])){
    redirect("/login-and-register-new-layout/register.php");
}