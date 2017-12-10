<?php
/* Returns JSON data for the total number of visits, total country unique visitors, and total employee To Do's, and the total number of Messages */
header('Content-Type: application/json');

include "checklogin.php";
$connection = createConnString();

$db = new AnalyticsGateway($connection);

   
$empToDo = $db->findEmployeeToDoCount();
$empMsg = $db->findEmployeeMessageCount();
$countryCount = $db->findUniqueCountries();
$visitsNum = $db->findNumberofVisits();

$totals[]=array("Visits"=>$visitsNum['visits'], "Countries"=>$countryCount['countries'], "ToDos"=>$empToDo['todos'], "Messages"=>$empMsg['messages']);


$j = json_encode($totals);
print_r ($j);
?>

