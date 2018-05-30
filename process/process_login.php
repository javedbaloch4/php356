<?php

session_start();
//echo("<pre>");
//print_r($_POST);
//echo("</pre>");

require_once '../models/User.php';
$obj_user = new User();
$errors = array();


try {
    $obj_user->user_name = $_POST['user_name'];
} catch (Exception $ex) {
    $errors['user_name'] = $ex->getMessage();
}

try {
    $obj_user->password = $_POST['password'];
} catch (Exception $ex) {
    $errors['password'] = $ex->getMessage();
}

if (!count($errors)) {

    try {
        $remember = isset($_POST['remember']) ? TRUE : FALSE;
        $obj_user->login($remember);
        $_SESSION['msg'] = $msg;
        header("Location:../index.php");
    } catch (Exception $ex) {
        $msg = $ex->getMessage();
        //msg.php
        $_SESSION['msg'] = $msg;
        header("Location:../login.php");
        
    }
} else {
    $msg = "Check Your Errors";
    //signup.php
    $_SESSION['msg'] = $msg;
    $_SESSION['errors'] = $errors;
    $_SESSION['obj_user'] = serialize($obj_user);
    header("Location:../login.php");
}

//echo($msg);
?>
