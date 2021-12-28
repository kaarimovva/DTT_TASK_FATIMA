<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/facility.php';


$database = new Database();
$db = $database->getConnection();

$facility = new facility($db);


$stmt = $facility->read();
$num = $stmt->rowCount();

if ($num>0) {

    //array of facilities
    $facilites_arr=array();
    $facilites_arr["records"]=array();

  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

      
        extract($row);

        $facilites_item=array(
            //"F_id" => $F_id,
            "F_name" => $F_name,
            //"F_creation_date" => $F_creation_date,
            "F_tag" => $F_tag
         
        );

        array_push($facilites_arr["records"], $facilites_item);
    }

   
    http_response_code(200);

    //encode the output to JSON
    echo json_encode($facilites_arr);

}else {

    // response code - 404 Nothing found
    http_response_code(404);

     // inform the user that there are no facilities
    echo json_encode(array("message" => "NO FACILITIES FOUND!"), JSON_UNESCAPED_UNICODE);
}


?>