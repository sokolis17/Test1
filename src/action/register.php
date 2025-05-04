<?php
require_once __DIR__ . '/../helper.php';




//DATA
$avatrPath = null;
$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$password_confirmation = $_POST['password_confirmation'] ?? null;
$avatar = $_FILES['avatar'] ?? null;

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

if(!empty($avatar)){
    $types = ['image/jpeg','image/png'];

    if(!in_array($avatar['type'], $types)){
        addValidationError('avatar','Изображение имеет неверный тип');
    }
}
    if(($avatar['size'] / 1000000 ) >= 1){
        addValidationError('avatar','Изображение должно быть меньше 1мб');
    }

//Редирект
if (!empty($_SESSION['validation'])){//если список с ошибками валидцаии не пустой,то производим ридерект обратно в форму
    redirect("/login-and-register-new-layout/register.php");
}

if(!empty($avatar)){
    $avatrPath = uploadFile($avatar,'avatar');
}

$pdo = getPDO();

$query = "INSERT INTO users (name,email,avatar,password) VALUES (:name,:email,:avatar,:password)";
$params = [
    'name' => $name, 
    'email' => $email,
    'avatar' => $avatrPath,
    'password' => password_hash($password,PASSWORD_DEFAULT)
];
$stmt = $pdo->prepare($query);

try{
    $stmt->execute($params);
}catch(\Exception $e){
    die("Conection error: {$e->getMessage()}");
}

redirect('/login-and-register-new-layout/index.php');