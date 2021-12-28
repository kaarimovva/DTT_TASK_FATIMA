<?php

//show error messages 
ini_set('display_errors', 1);
error_reporting(E_ALL);

$home_url="http://localhost/practice/";


// the page is specified in the URL parameter, the default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// set the number of records per page
$records_per_page = 2;

// calculation for requesting the limit of records
$from_record_num = ($records_per_page * $page) - $records_per_page;

?>