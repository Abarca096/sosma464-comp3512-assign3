<?php
/* Returns JSON data for the number of visits in each country*/
header('Content-Type: application/json');

include "checklogin.php";
$connection = createConnString();

$db = new AnalyticsGateway($connection);

   
$result = $db->findAllVisits(null);

$countries =[];

foreach($result as $row){
    $countries[] = array("Country"=>$row['countryName'], "Count"=>(int)$row['count']);
}

$j = json_encode($countries);
print_r ($j);



?>

