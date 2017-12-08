<?php
header('Content-Type: application/json');

include "checklogin.php";
$connection = createConnString();

$db = new AnalyticsGateway($connection);

   
$empToDo = $db->findEmployeeToDoCount();
$empMsg = $db->findEmployeeMessageCount();
$countryCount = $db->findUniqueCountries();
$visitsNum = $db->findNumberofVisits();

$totals[]=array("Visits"=>$visitsNum['visits'], "Countries"=>$countryCount['countries'], "Employee to-do's"=>$empToDo['todos'], "Employee Messages"=>$empMsg['messages']);


$j = json_encode($totals);
print_r ($j);
?>

