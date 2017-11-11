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
 
 public function getEmployeeCities() {
  $sql = "SELECT DISTINCT City FROM Employees;";
  
  $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
  return $statement->fetchAll();
 }
 
 public function getEmployeeByCity($city) {
  $sql = "SELECT EmployeeID, FirstName, LastName FROM Employees WHERE City=:city; ";
  
  $statement = DatabaseHelper::runQuery($this->connection,$sql,array(":city" => $city));
  return $statement->fetchAll();
 }
 
  public function getEmployeeByCityAndName($city,$name) {
  $sql = "SELECT EmployeeID, FirstName, LastName FROM Employees WHERE City=:city AND LastName LIKE CONCAT('%', :name, '%')";
  
  $statement = DatabaseHelper::runQuery($this->connection,$sql,array(":city" => $city,":name" => $name));
  return $statement->fetchAll();
 }
}

?>