<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/facility.php';

$database = new Database();
$db = $database->getConnection();

$facility = new facility($db);

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->K_name) &&
    !empty($data->K_tag)
){
     // set the values of facility properties 
      $facility->F_name = $data->K_name;
      $facility->F_tag = $data->K_tag;
      
    if($facility->create()){
        http_response_code(201);
        echo json_encode(array("message" => "Facility created."), JSON_UNESCAPED_UNICODE);
    }else{
        http_response_code(503);
        echo json_encode(array("message" => "Cannot be created!."), JSON_UNESCAPED_UNICODE);
    }


}else{
    
   // set the response code - 400 bad request 
    http_response_code(400);

    // message to the user
    echo json_encode(array("message" => "Facility cannot be created, Data is incomplete!"), JSON_UNESCAPED_UNICODE);


}




?>