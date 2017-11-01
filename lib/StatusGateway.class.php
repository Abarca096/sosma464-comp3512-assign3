<?php

class SubcategoriesGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT Status, StatusID FROM Statuses";
 }

 protected function getOrderFields() {
 return 'Status';
 }
 protected function getPrimaryKeyName() {
 return "StatusID";
 }
}

?>