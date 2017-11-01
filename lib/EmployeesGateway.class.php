<?php

class EmployeesGateway extends TableDataGateway {
 public function __construct($connect) {
  parent::__construct($connect);
 }

 protected function getSelectStatement() {
  return "SELECT EmployeeID, FirstName, LastName, Address, City, Region, Country, Postal, Email FROM Employees ";
 }

 protected function getOrderFields() {
  return "LastName, FirstName, DateBy";
 }
 
 protected function getPrimaryKeyName() {
  return "EmployeeID";
 }
 
 protected function getEmployeeMessages() {
  return "SELECT DateBy, Status, Priority, Description FROM EmployeeToDo ";
 }

}

?>