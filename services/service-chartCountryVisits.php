<?php
header('Content-Type: application/json');

include "checklogin.php";
$connection = createConnString();

$db = new AnalyticsGateway($connection);

   
$result = $db->findGetBookVisits(null);

$countries =[];

foreach($result as $row){
    $countries[] = array("Country"=>$row['countryName'], "Count"=>$row['count']);
}

$j = json_encode($countries);
print_r ($j);



?>

