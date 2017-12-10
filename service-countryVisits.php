<?php
/* Returns JSON data for the number of visits in each country in the Month of June 2017*/
header('Content-Type: application/json');

include "checklogin.php";
$connection = createConnString();

$db = new AnalyticsGateway($connection);
if(isset($_GET['Code'])){
   
$result = $db->findByCC($_GET['Code']);

$array = array("Country"=>$result['countryName'], "Count"=>$result['count']);

$j = json_encode($array);
print_r ($j);

}

?>

