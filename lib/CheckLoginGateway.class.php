<?php

class CheckLoginGateway extends TableDataGateway {
 public function __construct($connect) {
  parent::__construct($connect);
 }

 protected function getSelectStatement() {
  return "SELECT UserName, Password, Salt FROM UsersLogin ";
 }

 protected function getOrderFields() {
  return "";
 }
 
 protected function getPrimaryKeyName() {
  return "UserName ";
 }
 
 public function getAdditionalUserData($email) {
  $sql = "SELECT FirstName, LastName, UserID FROM Users WHERE Email= :email;";
  
  $statement = DatabaseHelper::runQuery($this->connection,$sql,Array(":email" => $email));
  return $statement->fetch();
 }
}

?>