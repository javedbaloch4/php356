<?php

//require_once 'DB_Connection.php';
require_once 'DBTrait.php';

class Product {

    //put your code here
    use DBTrait;

    public function get_product($product_id) {
        
    }

    public static function get_products($count = 0, $offset = -1, $type = "all", $brand = NULL) {
        $obj_db = self::get_db_conn();
        
        $condition_brand = "";
        if(!is_null($brand)) {
            $query_brand = "select id from brands "
                    . " where name = '$brand' ";
            $result_brand = $obj_db->query($query_brand);
            if(!$result_brand->num_rows){
                $brand_id = 0;
            }
            else{
                $data_brand = $result_brand->fetch_object();
                $brand_id = $data_brand->id;
            }
            $condition_brand = " where brand_id = $brand_id";
        }
        
        $query = "select * from products $condition_brand ";

        $types = array("all", "new", "top");

        if (!in_array($type, $types)) {
            $type = "all";
        }

        switch ($type) {
            case "top":
                $query .= " order by view_count desc ";
                break;
            case "new":
                $query .= " order by id desc ";
                break;
        }

        if ($count > 0 && $offset >= 0) {
            $query .= " limit $count offset $offset";
        }

        $result = $obj_db->query($query);

        if(!$result->num_rows){
            throw new Exception("No Product(s) found");
        }
        $products = array();

        while ($product = $result->fetch_object()) {
            $products[] = $product;
        }
        return $products;
    }

    public static function pagination($item_per_page = 6, $brand = NULL) {

        $obj_db = self::get_db_conn();

        $condition_brand = "";
        if(!is_null($brand)) {
            $query_brand = "select id from brands "
                    . " where name = '$brand' ";
            $result_brand = $obj_db->query($query_brand);
            if(!$result_brand->num_rows){
                $brand_id = 0;
            }
            else{
                $data_brand = $result_brand->fetch_object();
                $brand_id = $data_brand->id;
            }
            $condition_brand = " where brand_id = $brand_id";
        }

        //total_students = 11
        //max_number_of_students_per_group = 3
        $query = "select count(*) 'count' from products $condition_brand";

        $result = $obj_db->query($query);
        $data = $result->fetch_object();
        $total_products = $data->count;

        //Total Groups = 4
        $total_pages = ceil($total_products / $item_per_page);
        $page_nums = array();

        /*

          Group_# starting_roll_#
          1	0
          2	3
          3	6
          4	9
         * 
         */
        for ($i = 1, $j = 0; $i <= $total_pages; $i++, $j += $item_per_page) {
            $page_nums[$i] = $j;
        }

//        echo("<pre>");
//        print_r($page_nums);
//        echo("</pre>");
        return $page_nums;
    }

}
