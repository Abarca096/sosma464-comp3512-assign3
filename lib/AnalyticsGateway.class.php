<?php

class AnalyticsGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }
protected function getSelectStatement(){
 
}
protected function getOrderFields(){
 
}
protected function getPrimaryKeyName(){
 
}
 protected function getBookVisits()
 {
 return "SELECT COUNT(b1.CountryCode) as count, b1.CountryCode as Code, c1.CountryName as countryName FROM BookVisits as b1, Countries as c1 WHERE c1.CountryCode = b1.CountryCode GROUP BY c1.CountryName ORDER BY COUNT(b1.CountryCode) DESC LIMIT 15";
 }
 protected function getTopTen() {
 return "SELECT SUM(Quantity) as sum,ISBN10, Title FROM AdoptionBooks as a1 JOIN Books as b1 ON a1.BookID = b1.BookID GROUP BY a1.BookID ORDER BY SUM(Quantity) DESC LIMIT 10";
 }
 protected function getUniqueCountryCount() {
 return "SELECT  COUNT(DISTINCT(CountryCode)) as countries FROM BookVisits ";
 }
 
 protected function getNumberofVisits(){
  return "SELECT COUNT(DateViewed) as visits FROM BookVisits WHERE DateViewed LIKE '06/%' ";
 }
  protected function getEmployeeMessageCount(){
  return "Select Count(MessageID) as messages from EmployeeMessages WHERE MessageDate LIKE '%-06-%'; ";
 }
 protected function getEmployeeToDoCount(){
  return "Select Count(DateBy) as todos from EmployeeToDo WHERE DateBy LIKE '%-06-%'; ";
 }
 public function findGetBookVisits($sortFields=null)
{
 $sql = $this->getBookVisits();
 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetchAll();
}

public function findTopTen($sortFields=null){
 $sql = $this->getTopTen();
 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetchAll();
}
public function findUniqueCountryCount($sortFields=null){
 $sql = $this->getUniqueCountryCount();
 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetch();
}
public function findNumberofVisits($sortFields=null){
 $sql = $this->getNumberofVisits();
 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetch();
}

public function findEmployeeMessageCount($sortFields=null){
 $sql = $this->getEmployeeMessageCount();
 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetch();
}

public function findEmployeeToDoCount($sortFields=null){
 $sql = $this->getEmployeeToDoCount();
 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetch();
}



}

?>