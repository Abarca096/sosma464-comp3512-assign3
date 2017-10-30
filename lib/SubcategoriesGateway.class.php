<?php

class SubcategoriesGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT SubcategoryName, SubCategoryID FROM Subcategories ";
 }

 protected function getOrderFields() {
 return 'SubcategoryName';
 }
 protected function getPrimaryKeyName() {
 return "SubcategoryID";
 }
}

?>