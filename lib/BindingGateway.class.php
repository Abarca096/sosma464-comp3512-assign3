<?php

class SubcategoriesGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT BindingType, BindingTypeID FROM BindingTypes";
 }

 protected function getOrderFields() {
 return "BindingType";
 }
 protected function getPrimaryKeyName() {
 return "BindingTypeID";
 }
}

?>