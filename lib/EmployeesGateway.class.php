<?php

class EmployeesGateway extends TableDataGateway {
 public function __construct($connect) {
  parent::__construct($connect);
 }

 protected function getSelectStatement() {
  return "SELECT EmployeeID, FirstName, LastName, Address, City, Region, Country, Postal, Email FROM Employees ";
 }

 protected function getOrderFields() {
  return "SELECT LastName, FirstName FROM Employees ";
 }
 
 protected function getPrimaryKeyName() {
  return "EmployeeID";
 }
 
 public function getAllEmployees() {
  $sql = $this->getSelectStatement() . ' order by LastName ';
  $statement = DatabaseHelper::runQuery($this->connection, $sql, Array());
  return $statement->fetchAll();
 }
 
 // Returns a record for the specificed ID
 public function findById($id) {
  $sql = $this->getSelectStatement() . ' WHERE ' .
  $this->getPrimaryKeyName() . '=:id';
  $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id));
  return $statement->fetch();
  }
}

?>