<?php
require_once '../models/User.php';
require_once '../models/Brand.php';
require_once '../models/Cart.php';
require_once '../views/header.php';
//require_once '../views/header_banner.php';
//require_once '../views/slider.php';
require_once '../views/middle_left.php';
?>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    
<?php
if($obj_cart->items){
    echo("\n<form action='" . BASE_URL . "products/process/process_cart.php?data=evs' method='post'>"
            . "\n<table border='2' width='100%' bordercolor='red' cellspacing='0' cellpadding='0'>"
            . "\n<tr>"
            . "\n<th>X</th>"
            . "\n<th>Porudct Name</th>"
            . "\n<th>View Details</th>"
            . "\n<th>Unit Price</th>"
            . "\n<th>Quantity</th>"
            . "\n<th>Total</th>"
            . "\n</tr>");
    
    foreach($obj_cart->items as $item){
            echo("\n<tr align='center'>"
            . "\n<td><a href='" . BASE_URL . "products/process/process_cart.php?product_id=$item->item_id&action=remove_item'>X</a></td>"
            . "\n<td>$item->name</td>"
            . "\n<td><a href='" . BASE_URL . "products/product_detail.php?product_id=$item->item_id' target='__blank'>View Details</a></td>"
            . "\n<td>$item->unit_price</td>"
//            . "\n<td><input type='text' value='$item->quantity' name='qty_$item->item_id' id='qty_$item->item_id'></td>"
            . "\n<td><input type='text' value='$item->quantity' name='qtys[$item->item_id]' id='qty_$item->item_id'></td>"
            . "\n<td>$item->total</td>"
            . "\n</tr>");
    
        
    }
    echo("\n<tr>"
            . "\n<th><a href='" . BASE_URL . "products/products.php'>Shop More</a></th>"
            . "\n<th><a href='" . BASE_URL . "products/process/process_cart.php?action=empty_cart'>Empty Cart</a></th>"
            . "\n<th><a href='" . BASE_URL . "products/check_out.php'>Check Out</a></th>"
            . "\n<th>"
            . "\n<input type='hidden' name='action' value='update_cart'>"
            . "\n<input type='submit' value='Update Cart'>"
            . "\n</th>"
            . "\n<th>TOTAL</th>"
            . "\n<th>$obj_cart->total</th>"
            . "\n</tr>");
    
    echo("\n</table>"
            . "\n</form>");
}
else{
    echo("Your cart is empty");
}
?>
<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    
    
<?php
require_once '../views/footer.php';
