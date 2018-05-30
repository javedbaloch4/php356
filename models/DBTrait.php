<?php
trait DBTrait {
    //put your code here
    /**
     * Creates and returns a DataBase Object
     */
    protected function get_db_conn() {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "php356";

        $obj_db = new mysqli();
        $obj_db->connect($host, $user, $password);

        if ($obj_db->connect_errno) {
            throw new Exception("Failed to connect server "
            . " - $obj_db->connect_errno - $obj_db->connect_error");
        }

        $obj_db->select_db($database);

        if ($obj_db->errno) {
            throw new Exception("Failed to select db "
            . " - $obj_db->errno - $obj_db->error");
        }
        
        return $obj_db;
        
    }
    
}
