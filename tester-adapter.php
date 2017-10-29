<?php
include 'includes/book-config.inc.php';
$sql = "select * from Imprints";
$statement = DatabaseHelper::runQuery($connection, $sql, null);

?>

<html>
<body>
<h1>Imprints (using DatabaseHelper)</h1>
<?php
 while ($row = $statement->fetch()) {
 echo $row['ImprintID'] . ' ' . $row['Imprint'] . '<br>';

 }
 
 try {
 $db = new ImprintDB($connection );
 $result = $db->findById(5);
 echo '<h3>Sample Imprint (id=5)</h3>';
 echo $result['ImprintID'] . ' ' . $result['Imprint'];

 $result = $db->getAll();
 echo '<h3>All Imprints</h3>';
 foreach ($result as $row) {
 echo $row['ImprintID'] . ' ' . $row['Imprint'] . ', ';
 }
}
catch (Exception $e) {
 die( $e->getMessage() );
}
?>



</body>
</html>