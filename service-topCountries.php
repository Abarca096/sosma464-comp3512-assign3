<?php
header('Content-Type: application/json');

include "checklogin.php";
$connection = createConnString();

$db = new AnalyticsGateway($connection);

   
$result = $db->findAllVisits(null);

$countries =[];
$i =0;
foreach($result as $row){
    $countries[] = array("Country"=>$row['countryName'], "Code"=>$row['Code']);
    $i++;
    if($i==16){
        break;
    }
}

$j = json_encode($countries);
print_r ($j);



?>

