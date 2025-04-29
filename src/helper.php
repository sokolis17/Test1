<?php
session_start();
function redirect(string $path){
    header("Location: $path");
    die();
}

function clearValidation(){
    $_SESSION['validation'] = [];
}

function addValidationError($fieldName,string $message){
    $_SESSION['validation'][$fieldName] = $message;
}
function validationErrorAtrr(string $fieldName){
    echo isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function validationErrorMessage(string $fieldName){
    if (isset($_SESSION['validation'][$fieldName])) {
                echo $_SESSION['validation'][$fieldName];
                unset($_SESSION['validation'][$fieldName]); }
}

function hasValidatorError(string $fieldName): bool{
    return isset($_SESSION['validation'][$fieldName]);
}