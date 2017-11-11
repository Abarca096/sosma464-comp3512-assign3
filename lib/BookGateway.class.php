<?php

class BookGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT BookID, ISBN10, ISBN13, Title, CopyrightYear, SubcategoryID, ImprintID, ProductionStatusID, BindingTypeID, TrimSize, PageCountsEditorialEst, LatestInstockDate, Description, CoverImage FROM Books ";
 }

 protected function getOrderFields() {
 //return 'LastName, FirstName';
 }
 protected function getPrimaryKeyName() {
 return "BookID";
 }

protected function getSelectStatementJoin($table){
 if ($table == "Subcategories"){
 return "SELECT BookID, ISBN10, ISBN13, Title, CopyrightYear, SubcategoryID, ImprintID, ProductionStatusID, BindingTypeID, TrimSize, PageCountsEditorialEst, LatestInstockDate, Description, CoverImage FROM Books WHERE SubcategoryID=:id";
}else if($table == "Imprints"){
 return "SELECT BookID, ISBN10, ISBN13, Title, CopyrightYear, SubcategoryID, ImprintID, ProductionStatusID, BindingTypeID, TrimSize, PageCountsEditorialEst, LatestInstockDate, Description, CoverImage FROM Books WHERE ImprintID=:id";
}else{
 return getSelectStatement();
}
}

protected function getSecondaryKeyName(){
  return "ISBN10";
}

protected function getQuery(){
 return "SELECT ISBN10, ISBN13, Title, CopyrightYear, TrimSize, PageCountsEditorialEst, Description, SubcategoryName, Subcategories.SubcategoryID as SubID, Status, Imprint, Imprints.ImprintID as ImpID, BindingType 
                FROM Books, Subcategories, Imprints,Statuses, BindingTypes 
                WHERE Books.SubcategoryID=Subcategories.SubcategoryID 
                AND Books.ImprintID=Imprints.ImprintID 
                AND Books.ProductionStatusID=Statuses.StatusID 
                AND Books.BindingTypeID=BindingTypes.BindingTypeID
                AND ISBN10";
}
}
?>