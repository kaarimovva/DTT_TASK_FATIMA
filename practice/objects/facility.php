<?php
class facility{

    private $conn;
    private $table_name="facilites";

    public $F_id;
    public $F_name;
    public $F_creation_date;
    public $F_tag;
    public $L_city;

    public function __construct($db){
        $this->conn =$db;

    }

    
    function read(){ //read function to read all facilities and their properties. 

        // select all records
        $query = "SELECT `F_name` , `F_tag` FROM `facilites` ORDER BY `F_creation_date` DESC;";
    
        // preparation of a request 
        $stmt = $this->conn->prepare($query);
    
        // we execute the request 
        $stmt->execute();
    
        return $stmt;
    }

//create function to create the facility and its tags
    function create(){
        $this->F_name=htmlspecialchars(strip_tags($this->F_name));
        $this->F_tag=htmlspecialchars(strip_tags($this->F_tag));
        $query = "INSERT INTO `facilites`(`F_name`, `F_tag`) VALUES ('".$this->F_name."','".$this->F_tag."')";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    


    function update(){ //update function to update facility and its tags
//eleminating the caracters which is not necessery
    $this->F_id=htmlspecialchars(strip_tags($this->F_id));
    $this->F_name=htmlspecialchars(strip_tags($this->F_name));
    $this->F_tag=htmlspecialchars(strip_tags($this->F_tag));

    $query = "UPDATE `facilites` SET `F_name`='".$this->F_name."',`F_tag`='".$this->F_tag."' WHERE `F_id` = ".$this->F_id;
   
    $stmt = $this->conn->prepare($query);
        
   // execute the request
   if ($stmt->execute()) {
    return true;
}

return false;
}


function delete(){ //delete function to delete facilities and its tags

    // eleminating unnecessary characters
    $this->F_id=htmlspecialchars(strip_tags($this->F_id));

    $query = "DELETE FROM `location` WHERE `F_id` = ".$this->F_id.";"."DELETE FROM `facilites` WHERE `F_id` = ".$this->F_id;

    // prepare request
    $stmt = $this->conn->prepare($query);
    

    // execute the request
    if ($stmt->execute()) {
        return true;
    }

    return false;

}

function search($case){ //search function based on cases that whether it is search by name, tag or location
    if($case == 1)
    {
        $this->F_name=htmlspecialchars(strip_tags($this->F_name));
        $query = "SELECT * FROM (SELECT f.`F_name`,f.`F_tag`,l.`L_city` FROM `facilites` f, `location` l WHERE f.`F_id` = l.`F_id`) AS t WHERE t.`F_name`LIKE '".$this->F_name."'";

    }
    elseif($case == 2)
    {
         $this->F_tag=htmlspecialchars(strip_tags($this->F_tag));
         $query = "SELECT * FROM (SELECT f.`F_name`,f.`F_tag`,l.`L_city` FROM `facilites` f, `location` l WHERE f.`F_id` = l.`F_id`) AS t WHERE t.`F_tag`LIKE '".$this->F_tag."'";    
    }
    elseif($case == 3)
    {
        $this->L_city=htmlspecialchars(strip_tags($this->L_city));
        $query = "SELECT * FROM (SELECT f.`F_name`,f.`F_tag`,l.`L_city` FROM `facilites` f, `location` l WHERE f.`F_id` = l.`F_id`) AS t WHERE t.`L_city`LIKE '".$this->L_city."'";    

    }

        $stmt = $this->conn->prepare($query); 
        $stmt->execute();
        return $stmt;

}

public function readPaging($from_record_num, $records_per_page){ //paging function to page the facilities
    $query="SELECT `F_name` , `F_tag` FROM `facilites` 
    ORDER BY `F_creation_date` DESC";
    
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();

    return $stmt;
}

public function count(){ 

    $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row['total_rows'];
}


}
?>