<?php

include 'includes/book-config.inc.php';

?>

<html>
<body>

<?php

try {
echo '<hr>';

 $db = new EmployeesGateway($connection );
 $result = $db->findById(11);
 echo '<h3>Sample Employee (id=11)</h3>';
 echo $result['EmployeeID'] . ' ' . $result['FirstName'] . ' ' .
 $result['LastName'] . ' ' . $result['Address'];

 $result = $db->findAll();
 echo '<h3>All Employees</h3>';
 foreach ($result as $row) {
 echo $row['EmployeeID'] . ' ' . $row['LastName'] . ', ';
 } 

}
catch (Exception $e) {
   die( $e->getMessage() );
}

?>
</body>
</html>