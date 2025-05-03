<?php
session_start();


function redirect(string $path){//функция для перенпаправления
    header("Location: $path");
    die();
}

function validationErrorAtrr(string $fieldName){//для отображения ошибки в форме
    echo isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function validationErrorMessage(string $fieldName){//тут формируется сообщение об ошибке в для нужного поля
    echo $_SESSION['validation'][$fieldName]?? '';
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
//Блок с отчикской
function clearValidation(){//Очистка сессии валидации
    $_SESSION['validation'] = [];
}


