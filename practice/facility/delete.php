<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// connect the file to work with the database and the facility object
include_once '../config/database.php';
include_once '../objects/facility.php';

$database = new Database();
$db = $database->getConnection();

$facility = new facility($db);

// get the id of the facility
$data = json_decode(file_get_contents("php://input"));

$facility->F_id = $data->F_id;

// remove facility
if ($facility->delete()) {

    /// response code - 200 
    http_response_code(200);

    // message to the user
    echo json_encode(array("message" => "Deleted!."), JSON_UNESCAPED_UNICODE);
}

// if you cannot delete the item
else {

    // response code - 503 Service not available 
    http_response_code(503);

    // inform user about it the error
    echo json_encode(array("message" => "Casnnot be DELETED!"));
}

?>