<?php

class UniversityGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT Name, Address, City, State, Zip, Website, Longitude, Latitude, UniversityID FROM Universities";

 protected function getOrderFields() {
 return 'Name';
 }
 protected function getPrimaryKeyName() {
 return "UniversityID";
 }
 

}

?>