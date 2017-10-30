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
 
 public function getAllEmployees() {
  $sql = $this->getSelectStatement() . ' order by LastName ';
  $statement = DatabaseHelper::runQuery($this->connection, $sql, Array());
  return $statement->fetchAll();
 }
 
 public function findById($id) {
  $sql = $this->getSelectStatement() . ' WHERE ' . $this->getPrimaryKeyName() . '=:id';
  $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id));
  return $statement->fetch();
 }
  
 public function findEmployeeMessagesById($id) {
  $sql = $this->getEmployeeMessages() . ' WHERE ' . $this->getPrimaryKeyName() . '=:id';
  $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id));
  return $statement->fetch();
 }
}

?>