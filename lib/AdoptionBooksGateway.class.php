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
}
?>