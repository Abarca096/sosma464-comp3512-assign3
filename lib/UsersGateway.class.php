<?php

class UsersGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email, Privacy FROM Users ";
 }

 protected function getOrderFields() {
 return "LastName ";
 }
 protected function getPrimaryKeyName() {
 return "UserID ";
 }
 
 protected function getSecondaryKeyName(){
  return "LastName ";
 }
}

?>