<?php
session_start();

require_once __DIR__ . '/config.php';


function redirect(string $path){//функция для перенпаправления
    header("Location: $path");
    die();
}

function validationErrorAtrr(string $fieldName){//для отображения ошибки в форме
    echo isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function validationErrorMessage(string $fieldName){//тут формируется сообщение об ошибке в для нужного поля
    $message = $_SESSION['validation'][$fieldName]?? '';
    unset($_SESSION['validation'][$fieldName]);
    echo $message;
}
function addValidationError(string $fieldName,string $message){//для вывода в форму нужного сообщения об ощибке
    echo $_SESSION['validation'][$fieldName] = $message;
}
function hasValidationError(string $fieldName): bool{//проверка, правльно ли введены форма
    return isset($_SESSION['validation'][$fieldName]);
}

function addOldValue(string $key,mixed $value){
    $_SESSION['old'][$key] = $value;
}

function old(string $key){
    $value = $_SESSION['old'][$key] ?? '';
    unset($_SESSION['old'][$key]);
    return $value; 
}

function uploadFile(array $file,string $prefix = ''){
    $uploadPath =__DIR__ . '/../uploads';

    if(!is_dir("$uploadPath")){
        mkdir($uploadPath,0777,true);
    }
    $ext = pathinfo($file['name'],PATHINFO_EXTENSION);
    $filename = $prefix."_" . time(). ".$ext";

    

    if(!move_uploaded_file($file['tmp_name'],"$uploadPath/$filename")){
        die('Ошибка при загрузки файла на сервере');
    }

    return "uploads/$filename";
}

function getPDO():PDO{
    try{
        return new \PDO('mysql:host=' .DB_HOST. ';dbname='. DB_NAME ,DB_USERNAME,DB_PASSWORD);
    } catch(\PDOException $e){
        die($e->getMessage());
    }
}

function setMessage(string $key,string $message){
    $_SESSION['message'][$key] = $message;
}

function hasMessage(string $key,):bool{
    return isset($_SESSION['message'][$key]);
}

function getMessage(string $key){
    $value = $_SESSION['message'][$key] ?? '';
    unset($_SESSION['message'][$key]); 
    return $value;
}

function findUser(string $email):array|bool{
    $pdo = getPDO();

$stmt = $pdo->prepare("SELECT * FROM users WHERE `email` = :email");
$stmt->execute(['email' => $email]);
return $stmt ->fetch(\PDO::FETCH_ASSOC);
}
