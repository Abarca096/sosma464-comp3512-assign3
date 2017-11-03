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
 protected function getSelectStatementJoin($table){
     if($table == "Books"){
         return "SELECT SUM(Quantity), ISBN10, Title FROM AdoptionBooks as a1 JOIN Books as b1 ON a1.BookID = b1.BookID GROUP BY a1.BookID ORDER BY SUM(Quantity) DESC LIMIT 10";
     }else{
     return getSelectStatement();
 }
 }
}
?>