<?php

class BookVisits extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT VisitID, BookID, DateViewed, IpAddress,CountryCode FROM BookVisits";
 }

 protected function getOrderFields($order) {
 return  "COUNT(t1.CountryCode)";
 }
 protected function getPrimaryKeyName() {
 return "VisitID";
 }
 protected function getFirstJoin($table, $pk) {
 return  "SELECT t1.CountryCode, t2.CountryName FROM BookVisits as t1, ".$table."as t2 WHERE t1.CountryCode = t2.".$pk."GROUP BY t2.CountryName";
 }
 
 
 protected function getUniqueCountry(){
  return "SELECT COUNT(DISTINCT(CountryCode)) FROM BookVisits";
 }
 
  protected function getDateViewed() {
 return  "SELECT COUNT(DateViewed) FROM BookVisits WHERE DateViewed LIKE '06/%';";
 }
 
 public function findDateViewedStats($sortFields=null ){
    $sql = $this->getDateViewed();
    if(! is_null($sortFields)){
        $sql .= ' ORDER BY ' . $sortFields;
    }
  $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
  return $statement->fetchAll();
 }
 
 public function findUniqueCountryStats($sortFields=null ){
    $sql = $this->getUniqueCountry();
    if(! is_null($sortFields)){
        $sql .= ' ORDER BY ' . $sortFields;
    }
  $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
  return $statement->fetchAll();
 }
 


}
?>