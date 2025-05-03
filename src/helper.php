<?php
session_start();
function redirect(string $path){
    header("Location: $path");
    die();
}

function validationErrorAtrr(string $fieldName){
    echo isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function addValidationError(string $fieldName,string $message){
    echo $_SESSION['validation'][$fieldName] = $message;
}

function validationErrorMessage(string $fieldName){
    echo $_SESSION['validation'][$fieldName]?? '';
}

function clearValidation(){
    $_SESSION['validation'] = [];
}
function hasValidationError(string $fieldName): bool{
    return isset($_SESSION['validation'][$fieldName]);
}