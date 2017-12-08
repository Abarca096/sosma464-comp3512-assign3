<?php
header('Content-Type: application/json');

include "checklogin.php";
$connection = createConnString();

$db = new AdoptionBooksGateway($connection);

$result = $db->findTopAdoptedBooks();

$books = [];

foreach($result as $row){
    $books[] = array("Title"=>$row['Title'], "ISBN10"=>$row['ISBN'], "Total Adoptions"=>$row['Quantity']);
}

$j = json_encode($books);
print_r ($j);
?>

