<?php

// required HTTP headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/facility.php';

$utilities = new Utilities();

// create connection
$database = new Database();
$db = $database->getConnection();

// initialize the object
$facility = new facility($db);

$stmt = $facility->readPaging($from_record_num, $records_per_page);
$num = $stmt->rowCount();


if ($num>0) {

    // array of facilities
    $facilites_arr=array();
    $facilites_arr["records"]=array();
    $facilites_arr["paging"]=array();

    // get the contents of the table
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        // fetch the string (row)
        extract($row);
        $facilites_item=array(
            //"F_id" => $F_id,
            "F_name" => $F_name,
            //"F_creation_date" => $F_creation_date,
            "F_tag" => $F_tag
         
        );
        array_push($facilites_arr["records"], $facilites_item);
    }
    $total_rows=$facility->count();
    $page_url="{$home_url}facility/read_paging.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $facilites_arr["paging"]=$paging;

    
    // set the response code 200 
    http_response_code(200);


     // encode the output to JSON
     echo json_encode($facilites_arr);
}else{
    
    // response code - 404 Nothing found
    http_response_code(404);

    // inform the user that there are no facilities
    echo json_encode(array("message" => "NO product found."), JSON_UNESCAPED_UNICODE);
}

?>