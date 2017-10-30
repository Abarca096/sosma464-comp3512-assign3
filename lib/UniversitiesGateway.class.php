<?php

class UniversitiesGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement(){
 return "SELECT Name, Address, City, State, Zip, Website, Longitude, Latitude, UniversityID FROM Universities";
 }
 protected function getOrderFields() {
 return 'Name';
 }
 protected function getPrimaryKeyName(){
 return "UniversityID";
 }
 protected function getStateSelect(){
  return "SELECT DISTINCT State FROM Universities;";
 }
 protected function getStateName(){
 return "State";
 }
 public function findByState($id){
 $sql = $this->getSelectStatement() . ' WHERE ' .
 $this->getStateName() . '=:id';

 $statement = DatabaseHelper::runQuery($this->connection, $sql,
 Array(':id' => $id));
 return $statement->fetchAll();
} 
public function findStates(){

 $sql = $this->getStateSelect();
 // add sort order if required
 if (! is_null($sortFields)) {
 $sql .= ' ORDER BY ' . $sortFields;
 }
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetchAll();
}
}


?>