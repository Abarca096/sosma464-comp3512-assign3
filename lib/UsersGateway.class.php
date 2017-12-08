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
  $dateJoined = date('Y-m-d H:i:s');
  $salt = md5(microtime());
  $encPassword = md5($password.$salt);
  //check if the user already exists, if it does, we return false and exit this function.
  $userCheck=DatabaseHelper::runQuery($this ->connection, "SELECT UserID FROM UsersLogin WHERE UserName = :email",Array(":email"=>$username))->fetch();
  if(!empty($userCheck)){ //if there is a userID in the set, then that user is already registered
  return false;
  }else{
   // insert into UsersLogin table
  $sql = "INSERT INTO UsersLogin VALUES (NULL, :username, :password, :salt, :state, :datejoined, :datelastmodified)";
  $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(":username"=> $username, ":password" => $encPassword, ":salt"=>$salt, ":state"=> 1, ":datejoined" => $dateJoined, ":datelastmodified"=>$dateJoined));
  
  // insert into Users table
  $sql2 = "INSERT INTO Users VALUES (LAST_INSERT_ID(), :firstname, :lastname, :address, :city, :region, :country, :postal, :phone, :username, NULL)";
  $statement = DatabaseHelper::runQuery($this->connection,$sql2,Array(":firstname" => $firstname, ":lastname" => $lastname, ":address" => $address, ":city" => $city, ":region" => $region, ":country" => $country, ":postal" => $postal, ":phone" => $phone, ":username"=>$username));
  return true; //user was successfully registered
 }
 }
 
 public function updateUser($firstname, $lastname, $address, $city, $region, $country, $postal, $phone, $username, $userID){
  // insert into Users table
  $sql = "UPDATE Users SET FirstName = :firstname, LastName = :lastname, Address = :address, City = :city, Region = :region, Country = :country, Postal = :postal, Phone = :phone, Email = :username WHERE UserID = :userid";
  $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(":firstname" => $firstname, ":lastname" => $lastname, ":address" => $address, ":city" => $city, ":region" => $region, ":country" => $country, ":postal" => $postal, ":phone" => $phone, ":username" =>$username, ":userid"=>$userID));
  
  // insert into UsersLogin table
  $dateModified = date('Y-m-d H:i:s');
  $sql2 = "UPDATE UsersLogin SET UserName = :username, DateLastModified = :dateModified WHERE UserID = :userID";
  $statement = DatabaseHelper::runQuery($this->connection, $sql2, Array(":username"=> $username, ":dateModified"=> $dateModified, ":userID"=>$userID));
 }
}

?>