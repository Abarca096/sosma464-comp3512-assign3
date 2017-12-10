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
 return "SELECT COUNT(b1.CountryCode) AS count, b1.CountryCode AS Code, c1.CountryName AS countryName FROM BookVisits as b1, Countries as c1 WHERE c1.CountryCode = b1.CountryCode GROUP BY c1.CountryName ORDER BY COUNT(b1.CountryCode) DESC LIMIT 15";
 }
 protected function getTopTen() {
 return "SELECT SUM(Quantity) as sum,ISBN10, Title FROM AdoptionBooks as a1 JOIN Books as b1 ON a1.BookID = b1.BookID GROUP BY a1.BookID ORDER BY SUM(Quantity) DESC LIMIT 10";
 }
 protected function getUniqueCountryCount() {
 return "SELECT  COUNT(DISTINCT(CountryCode)) as countries FROM BookVisits ";
 }
 
 protected function getNumberofVisits(){
  return "SELECT COUNT(DateViewed) as visits,DateViewed FROM BookVisits WHERE DateViewed LIKE '06/%/2017' ";
 }
  protected function getEmployeeMessageCount(){
  return "Select Count(MessageID) as messages from EmployeeMessages WHERE MessageDate LIKE '2017-06-%'; ";
 }
 protected function getEmployeeToDoCount(){
  return "Select Count(DateBy) as todos from EmployeeToDo WHERE DateBy LIKE '2017-06-%'; ";
 }
 
 protected function getUniqueCountries() {
 return "SELECT COUNT(DISTINCT(CountryCode)) as countries FROM BookVisits WHERE DateViewed LIKE '06/%/2017'; ";
 }
//Displays the top 15 countries and their count
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
//finds the top 10 adopted books with their title, cover, and amount adopted
public function findTopTen($sortFields=null){
 $sql = $this->getTopTen();
 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetchAll();
}
//finds how many countries the site had visits from 
public function findUniqueCountryCount($sortFields=null){
 $sql = $this->getUniqueCountryCount();
 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetch();
}
//finds how many countries the site had visits from 
public function findUniqueCountries($sortFields=null){
 $sql = $this->getUniqueCountries();
 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetch();
}
//finds how many visits there were over all to the site in june 2017
public function findNumberofVisits($sortFields=null){
 $sql = $this->getNumberofVisits();
 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetch();
}
//finds how many messages there were in june 2017
public function findEmployeeMessageCount($sortFields=null){
 $sql = $this->getEmployeeMessageCount();
 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetch();
}
//finds how many toDos an employee has to do in june 2017
public function findEmployeeToDoCount($sortFields=null){
 $sql = $this->getEmployeeToDoCount();
 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetch();
}

//finds the country name and its visit count based on a country code
public function findByCC($id)
{
 $sql = 'SELECT COUNT(b1.CountryCode) as count, b1.CountryCode as Code, c1.CountryName as countryName FROM BookVisits as b1, Countries as c1 WHERE c1.CountryCode = b1.CountryCode AND b1.CountryCode =:id GROUP BY c1.CountryName ORDER BY COUNT(b1.CountryCode) DESC LIMIT 15';

 $statement = DatabaseHelper::runQuery($this->connection, $sql,
 Array(':id' => $id));
 return $statement->fetch();
} 
//finds how many visits occured per day
public function findDate($sortFields = null)
{
 $sql = "SELECT COUNT(DateViewed) as visits, SUBSTRING(DateViewed,4,2) as day FROM BookVisits WHERE DateViewed LIKE '06/%/2017' GROUP BY SUBSTRING(DateViewed,4,2) ORDER BY SUBSTRING(DateViewed,4,2) ";

 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetchAll();


}
//finds how many visits happened per country
  public function findAllVisits($sortFields=null)
{
 $sql = "SELECT COUNT(b1.CountryCode) AS count, b1.CountryCode AS Code, c1.CountryName AS countryName 
       FROM BookVisits as b1, Countries as c1 
       WHERE c1.CountryCode = b1.CountryCode GROUP BY c1.CountryName ORDER BY COUNT(b1.CountryCode) DESC";
 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetchAll();
}
 
}

?>