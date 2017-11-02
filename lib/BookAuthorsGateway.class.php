<?php

class BookAuthorsGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT BookAuthorID, AuthorId, BookId FROM BookAuthors ";
 }

 protected function getOrderFields() {
 return "AuthorId ";
 }
 protected function getPrimaryKeyName() {
 return "BookAuthorID ";
 }
 
 protected function getSecondaryKeyName(){
  return "BookId ";
 }
}

?>