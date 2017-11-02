<?php

class EmployeeToDo extends TableDataGateway {
 public function __construct($connect) {
  parent::__construct($connect);
 }

  protected function getDateByCount() {
  return "SELECT COUNT(DateBy) FROM EmployeeToDo WHERE DateBy LIKE '%-06-%'";
 }
 
 protected function getSelectStatement() {
  return "SELECT ToDoID,EmployeeID, Status,Priority,DateBy,Description FROM EmployeeToDo";
 }

 protected function getOrderFields() {
  return "DateBy";
 }
 
 protected function getPrimaryKeyName() {
  return "ToDoID";
 }
 

 
}

?>