<?php

require_once 'Item.php';

class Cart {

    //put your code here
    private $items;

    public function __construct() {
//        $this->items = array();
        $this->items = [];
    }

//    public function __set($name, $value) {
//        $method = "set$name";
//        if (!method_exists($this, $method)) {
//            throw new Exception("SET Property $name does not exist");
//        }
//        $this->$method($value);
//    }

    public function __get($name) {
        $method = "get$name";
        if (!method_exists($this, $method)) {
            throw new Exception("GET Property $name does not exist");
        }
        return $this->$method();
    }

    private function getItems(): array {
        return $this->items;
    }

    private function getCount(): int {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->quantity;
        }

        return $total;
    }

    private function getTotal(): float {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->total;
        }

        return $total;
    }

    public function add_to_cart(Item $item) {
        if (array_key_exists($item->item_id, $this->items)) {
            $this->items[$item->item_id]->quantity += $item->quantity;
//            $this->items[$item->item_id]->quantity = $this->items[$item->item_id]->quantity + $item->quantity;
        } else {
            $this->items[$item->item_id] = $item;
        }
    }

    public function remove_item(Item $item) {
        if (array_key_exists($item->item_id, $this->items)) {
            unset($this->items[$item->item_id]);
        }
    }

    public function update_cart($qtys) {
//        echo("<pre>");
//        print_r($this->items);
//        echo("</pre>");
//        echo("<pre>");
//        print_r($qtys);
//        echo("</pre>");
//        die;

        foreach ($this->items as $item) {
            if (is_numeric($qtys[$item->item_id])) {
                if ($qtys[$item->item_id] > 0) {
                    $item->quantity = $qtys[$item->item_id];
                }
                else if ($qtys[$item->item_id] == 0) {
                    $this->remove_item($item);
                }
            }
        }
    }

    public function empty_cart() {
        $this->items = [];
    }

//    public function __destruct() {
//        
//    }
}

?>