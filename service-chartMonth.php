<?php
header('Content-Type: application/json');

include "checklogin.php";
$connection = createConnString();

$db = new AnalyticsGateway($connection);

   
$result = $db->findDate(null);
$dates = [];

foreach($result as $row){
    $dates[] = array("Day"=>(int)$row['day'], "Visits"=>$row['visits']);
}
$j = json_encode($dates);
print_r ($j);



?>

