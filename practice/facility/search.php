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

if(!empty($data->F_name))
{
    $facility->F_name = $data->F_name;
    $stmt = $facility->search(1);
    $num = $stmt->rowCount();

}
elseif(!empty($data->F_tag))
{
    $facility->F_tag = $data->F_tag;
    $stmt = $facility->search(2);
    $num = $stmt->rowCount();
}
elseif(!empty($data->L_city))
{
    $facility->L_city = $data->L_city;
    $stmt = $facility->search(3);
    $num = $stmt->rowCount();
}
else{
    echo "PROBLEMS!!!!!";
}
if ($num>0) {

 
    $facilites_arr=array();
    $facilites_arr["records"]=array();

  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

      
        extract($row);

        $facilites_item=array(
            "F_name" => $F_name,
            "F_tag" => $F_tag,
            "L_city" => $L_city
         
        );

        array_push($facilites_arr["records"], $facilites_item);
    }

    // response code - 200 
    http_response_code(200);

//encode the output to JSON format
    echo json_encode($facilites_arr);

}else {

 // response code - 404 Nothing found 
    http_response_code(404);

    //inform the user that no facilities found
    echo json_encode(array("message" => "Couldn't Find"), JSON_UNESCAPED_UNICODE);
}
?>
