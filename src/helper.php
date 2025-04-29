<?php
session_start();
function redirect(string $path){
    header("Location: $path");
    die();
}

function mayBeHasError(string $fieldName){
    echo isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function getErrorMessage(string $fieldName){
    if (isset($_SESSION['validation'][$fieldName])) {
                echo $_SESSION['validation'][$fieldName];
                unset($_SESSION['validation'][$fieldName]); }
}