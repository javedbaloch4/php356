<?php
require_once 'DBTrait.php';
require_once 'User.php';
require_once 'Cart.php';
class Order {
    use DBTrait;
    public static function place_order($obj_user, $obj_contact, $obj_cart){
        
        //insert into address table with $obj_user->id
        //get $address_id from insert_id
        
        //insert into orders with $obj_user->id & $address_id
        date_default_timezone_set("Asia/Karachi");
        $order_date = date("Y-m-d");
        //get $order_id from insert_id
        
        foreach($obj_cart->items as $item){
            //insert into order items with $order_id
        }
        
        /*
        SELECT orders.*, addresses.*, orderitems.* 
FROM orders 
join addresses on orders.address_id = addresses.id
join orderitems on orders.id = orderitems.order_id
WHERE orders.user_id = 1
         * 
         */
    }
}
