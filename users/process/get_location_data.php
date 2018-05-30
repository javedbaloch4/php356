<?php
require_once '../../models/Location.php';
//$response = array();
$response = [];

if (isset($_POST['country'])) {

    try {
        $country = $_POST['country'];
        $states = Location::get_states($country);
        $response['success'] = TRUE;
        $response['states'] = $states;
    } catch (Exception $ex) {
        $response['error'] = TRUE;        
        $response['msg'] = $ex->getMessage();        
    }
} else if (isset($_POST['state'])) {
    try {
        $state = $_POST['state'];
        $cities = Location::get_cities($state);
        $response['success'] = TRUE;
        $response['cities'] = $cities;
    } catch (Exception $ex) {
        $response['error'] = TRUE;        
        $response['msg'] = $ex->getMessage();        
        
    }
    
} else {
        $response['error'] = TRUE;        
        $response['msg'] = "Token MIssing";  
    
}


$str_response = json_encode($response);

echo $str_response;



?>