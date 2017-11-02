<?php

class AuthorsGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT AuthorID, FirstName, LastName, Institution FROM Authors ";
 }

 protected function getOrderFields() {
 return "LastName";
 }
 protected function getPrimaryKeyName() {
 return "AuthorID";
 }
}

?>