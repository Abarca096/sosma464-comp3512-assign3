<?php

class EmployeeMessages extends TableDataGateway {
 public function __construct($connect) {
  parent::__construct($connect);
 }

 protected function getSelectStatement() {
  return "SELECT MessageID,EmployeeID,ContactID, MessageDate,Category,Content FROM EmployeeMessages";
 }
 
 protected function getMessageCount() {
  return "SELECT COUNT(MessageID) FROM EmployeeMessages WHERE MessageDate LIKE '%-06-%'";
 }
 

 protected function getOrderFields() {
  return "DateBy";
 }
 
 protected function getPrimaryKeyName() {
  return "MessageID";
 }
 

 
}

?>