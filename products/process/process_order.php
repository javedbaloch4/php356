<?php

session_start();
require_once '../models/User.php';
require_once '../models/Car.php';
require_once '../models/Order.php';
$obj_user = unserialize($_SESSION['obj_user']);
$obj_cart = unserialize($_SESSION['obj_cart']);
$obj_contact = new User();

$errors = array();


try {
    $obj_user->first_name = $_POST['first_name'];
} catch (Exception $ex) {
    $errors['first_name'] = $ex->getMessage();
}


if (!count($errors)) {

    try {
        Order::place_order($obj_user, $obj_contact, $obj_cart);
        $msg = "COngratulation";
        $_SESSION['msg'] = $msg;
    } catch (Exception $ex) {
        $msg = $ex->getMessage();
        //msg.php
        $_SESSION['msg'] = $msg;
    }
        header("Location:../msg.php");
    
} else {
    $msg = "Check Your Errors";
    //signup.php
    $_SESSION['msg'] = $msg;
    $_SESSION['errors'] = $errors;
    $_SESSION['obj_contact'] = serialize($obj_contact);
    header("Location:../check_out.php");
}

//echo($msg);
?>
