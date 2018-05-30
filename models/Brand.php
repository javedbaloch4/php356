<?php
require_once 'DBTrait.php';
class Brand  {
        use DBTrait;
        
    public static function get_brands(){
        $obj_db = self::get_db_conn();
        $query = "select * from brands ";
         
        $result = $obj_db->query($query);
        
        $brands = array();
        
        while($brand = $result->fetch_object()){
            $brands[] = $brand;
        }
        return $brands;
    }
            
}
