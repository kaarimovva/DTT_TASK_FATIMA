<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// connect the file to the database and the facility object file
include_once '../config/database.php';
include_once '../objects/facility.php';

$database = new Database();
$db = $database->getConnection();

$facility = new facility($db);

$data = json_decode(file_get_contents("php://input"));

$facility->F_id = $data->F_id;
$facility->F_name = $data->F_name;
$facility->F_tag = $data->F_tag;


if($facility->update()){
    http_response_code(200);

    //inform that the facility updated and encode that to JSON
    echo json_encode(array("message" => "UPDATED!."), JSON_UNESCAPED_UNICODE);



}else {

    // response code - 503 Service not available
    http_response_code(503);

    // inform the user that that facility cannot be updated
    echo json_encode(array("message" => "Cannot be UPDATED!"), JSON_UNESCAPED_UNICODE);
}

?>