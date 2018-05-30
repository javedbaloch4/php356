<?php
require_once 'DBTrait.php';
class Item {
    
    use DBTrait;
    
    private $item_id;
    private $quantity;
    
    public function __construct($item_id, $quantity = 1) {
        $this->setItem_ID($item_id);
        $this->setQuantity($quantity);
    }
    
    public function __set($name, $value) {
        
        $restricted = [
            'item_id',
            ];
        if(in_array($name, $restricted)){
            throw new Exception("PUblic Access of $name not allowed");
        }
        $method = "set$name";
        if (!method_exists($this, $method)) {
            throw new Exception("SET Property $name does not exist");
        }
        $this->$method($value);
    }

    public function __get($name) {
        $method = "get$name";
        if (!method_exists($this, $method)) {
            throw new Exception("GET Property $name does not exist");
        }
        return $this->$method();
    }

    private function setItem_ID(int $item_id) {
        if($item_id <= 0){
            throw new Exception("Invalid/ MIssing Item ID");
        }
        $this->item_id = $item_id;
    }

    private function getItem_ID() : int{
        return $this->item_id;
    }

    private function setQuantity(int $quantity) {
        if($quantity <= 0){
            throw new Exception("Invalid/ MIssing Quantity");
        }
        $this->quantity = $quantity;
    }

    private function getQuantity() : int {
        return $this->quantity;
    }    

    private function getName() : string {
        $obj_db = self::get_db_conn();
        $query = "select name from products where id = $this->item_id";
        $result = $obj_db->query($query);
        $data = $result->fetch_object();
        return $data->name;
    }    

    private function getUnit_Price() : float {
        $obj_db = self::get_db_conn();
        $query = "select unit_price from products where id = $this->item_id";
        $result = $obj_db->query($query);
        $data = $result->fetch_object();
        return $data->unit_price;
    }    

    private function getTotal()  : float {
        $total = $this->quantity * $this->unit_price;
        return $total;
    }    

    
    
}

?>