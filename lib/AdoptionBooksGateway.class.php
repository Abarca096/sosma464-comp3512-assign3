<?php

class AdoptionBooksGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT AdoptionDetailID, AdoptionID, BookID, Quantity FROM AdoptionBooks ";
 }

 protected function getOrderFields() {
 return "Quantity";
 }
 protected function getPrimaryKeyName() {
 return "AdoptionDetailID";
 }
 protected function getQuery(){
  return "SELECT DISTINCT Name, Universities.UniversityID
          FROM Universities, Books, AdoptionBooks, Adoptions 
          WHERE Adoptions.UniversityID=Universities.UniversityID 
          AND Adoptions.AdoptionID=AdoptionBooks.AdoptionID 
          AND Books.BookID=AdoptionBooks.BookID AND ISBN10";
 }
 
 protected function topAdoptedBooks(){
  return "SELECT Books.Title as Title, Books.ISBN10 as ISBN, A.Quantity as Quantity
         FROM Books, AdoptionBooks as A 
         WHERE Books.BookID=A.BookID ORDER BY A.Quantity DESC LIMIT 10; ";
 }
 
 public function findTopAdoptedBooks()
{
 $sql = $this->topAdoptedBooks();
 $statement = DatabaseHelper::runQuery($this->connection, $sql);
 return $statement->fetchAll();
}
}
?>