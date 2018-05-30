<?php
require_once 'DBTrait.php';
class Location {
    //put your code here
    use DBTrait;
    
    public static function get_countries(){
        $obj_db = self::get_db_conn();
        $query = "select id, name country_name "
                . " from countries "
                . " order by name asc ";
        
        $result = $obj_db->query($query);
        
        $countries = array();
        
        while($country = $result->fetch_object()){
            $countries[] = $country;
        }
        return $countries;
    }
    
    public static function get_states($country_id){
        $obj_db = self::get_db_conn();
        $query = "select id, state_name "
                . " from states "
                . " where country_id = $country_id"
                . " order by state_name asc ";
                
//        echo($query);
        $result = $obj_db->query($query);
        
        $states = array();
        
        while($state = $result->fetch_object()){
            $states[] = $state;
        }
        return $states;
    }

    public static function get_cities($state_id){
        $obj_db = self::get_db_conn();
        $query = "select id, name city_name "
                . " from cities "
                . " where state_id = $state_id"
                . " order by name asc ";
        
        $result = $obj_db->query($query);
        
        $cities = array();
        
        while($city = $result->fetch_object()){
            $cities[] = $city;
        }
        return $cities;
    }
    
}
    