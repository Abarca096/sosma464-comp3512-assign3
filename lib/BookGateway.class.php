<?php

class BookGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT BookID, ISBN10, ISBN13, Title,
 CopyrightYear, SubcategoryID, ImprintID, ProductionStatusID, BindingTypeID, TrimSize, PageCountsEditorialEst, LatestInstockDate, Description, CoverImage FROM Books LIMIT 20 ";
 }

 protected function getOrderFields() {
 //return 'LastName, FirstName';
 }
 protected function getPrimaryKeyName() {
 return "BookID";
 }

}

?>