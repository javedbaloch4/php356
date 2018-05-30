<?php

session_start();
require_once '../models/User.php';
//$obj_user = new User();
$errors = array();

$obj_user = unserialize($_SESSION['obj_user']);

//$obj_product = new Product();
//
//$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : 0;
//$obj_product->delete($product_id);

try {
    $obj_user->logout();
    $_SESSION['msg'] = "You Have Logged Out";
} catch (Exception $ex) {
    $msg = $ex->getMessage();
    $_SESSION['msg'] = $msg;
}
header("Location:../msg.php");
?>
