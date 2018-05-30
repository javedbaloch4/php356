<?php

session_start();
require_once '../../models/Cart.php';

if (isset($_SESSION['obj_cart'])) {
    $obj_cart = unserialize($_SESSION['obj_cart']);
} else {
    $obj_cart = new Cart();
}
//echo("<pre>");
//print_r($_POST);
//echo("</pre>");
//            echo("sss");
//            die;
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "add_to_cart":

//            $item = new Item();
//            $item->item_id = $_POST['product_id'];
//            $item->quantity = 1;

//            $item = new Item("aaaa");
            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
            $item = new Item($_POST['product_id'], $quantity);
//            $item->item_id = 1000;
//            $item = [
//                'item_id' =>$_POST['product_id'],
//                'quantity'=>1
//            ];
            $obj_cart->add_to_cart($item);

            break;
        
        case "update_cart":

            $obj_cart->update_cart($_POST['qtys']);

            break;
        
    }
}

else if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "remove_item":

            $item = new Item($_GET['product_id']);
            $obj_cart->remove_item($item);

            break;
        case "empty_cart":

            $obj_cart->empty_cart();

            break;
    }
}


$_SESSION['obj_cart'] = serialize($obj_cart);
header("Location:" . $_SERVER['HTTP_REFERER']);
?>