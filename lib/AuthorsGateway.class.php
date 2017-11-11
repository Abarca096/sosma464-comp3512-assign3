<?php

class AuthorsGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return " SELECT FirstName, LastName, Institution                                  
          FROM BookAuthors, Authors, Books 
          WHERE Books.BookID=BookAuthors.BookID 
          AND BookAuthors.AuthorID=Authors.AuthorID 
          AND ISBN10 ";
 }

 protected function getOrderFields() {
 return "LastName";
 }
 protected function getPrimaryKeyName() {
 return "AuthorID";
 }
 
 protected function getQuery(){
  return "SELECT FirstName, LastName, Institution                                  
          FROM BookAuthors, Authors, Books 
          WHERE Books.BookID=BookAuthors.BookID 
          AND BookAuthors.AuthorID=Authors.AuthorID 
          AND ISBN10 ";
 }
 
}

?>