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
 
 public function registerUser($firstname, $lastname, $address, $city, $region, $country, $postal, $phone, $username, $password) {
  // insert into Users table
  $sql = "INSERT INTO Users VALUES (NULL, :firstname, :lastname, :address, :city, :region, :country, :postal, :phone, :username, NULL)";
  $statement = DatabaseHelper::runQuery($this->connection,$sql,Array(":firstname" => $firstname, ":lastname" => $lastname, ":address" => $address, ":city" => $city, ":region" => $region, "country" => $country, ":postal" => $postal, ":phone" => $phone));
  
  // insert into UsersLogin table
  $datejoined = date('Y-m-d H:i:s');
  $datelastmodified = date('Y-m-d H:i:s');

 // concat what they enter + salt (randomly)
 // md5 the both and store in password field
 // salt -> salt field
  
  
  $sql2 = "INSERT INTO UsersLogin VALUES (NULL, :username, :password, 'md5(microtime())' , NULL, :datejoined, :datelastmodified";
 }
}

?>