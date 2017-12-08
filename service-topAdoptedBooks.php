<?php
header('Content-Type: application/json');

include "checklogin.php";
$connection = createConnString();

$db = new AnalyticsGateway($connection);

$result = $db->findTopTen();

$books = [];

foreach($result as $row){
    $books[] = array("Title"=>$row['Title'], "ISBN10"=>$row['ISBN10'], "Adoptions"=>$row['sum']);
}

$j = json_encode($books);
print_r ($j);
?>

