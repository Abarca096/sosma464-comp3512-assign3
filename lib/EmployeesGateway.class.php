<?php

class EmployeesGateway extends TableDataGateway {
 public function __construct($connect) {
  parent::__construct($connect);
 }

 protected function getSelectStatement() {
  return "SELECT EmployeeID, FirstName, LastName, Address, City, Region, Country, Postal, Email FROM Employees ";
 }

 protected function getOrderFields() {
  return "LastName, FirstName";
 }
 
 protected function getPrimaryKeyName() {
  return "EmployeeID";
 }
 
 protected function getEmployeeMessages() {
  return "SELECT DateBy, Status, Priority, Description FROM EmployeeToDo ";
 }

 protected function getSelectStatementJoin($table){
  if ($table == "EmployeeToDo") {
   return "SELECT DateBy, Status, Priority, Description FROM EmployeeToDo WHERE EmployeeID=:id order by DateBy;";
  } else if ($table == "EmployeeMessages") {
   return "SELECT MessageDate, Category, ContactID, Content FROM EmployeeMessages WHERE EmployeeID=:id;";
  }
 }
 
}

?>