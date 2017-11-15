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


public function getBooksBySubcategory($id){
  $sql= "SELECT BookID, ISBN10, ISBN13, Title, CopyrightYear, SubcategoryID, ImprintID, ProductionStatusID, BindingTypeID, TrimSize, PageCountsEditorialEst, LatestInstockDate, Description, CoverImage FROM Books WHERE SubcategoryID=:id";
  $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id));
 return $statement->fetchAll();
}

public function getBooksByImprint($id){
 $sql = "SELECT BookID, ISBN10, ISBN13, Title, CopyrightYear, SubcategoryID, ImprintID, ProductionStatusID, BindingTypeID, TrimSize, PageCountsEditorialEst, LatestInstockDate, Description, CoverImage FROM Books WHERE ImprintID=:id";
 $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id));
 return $statement->fetchAll();
}

public function getAllSubcategories(){
 $sql = "SELECT SubcategoryName, SubCategoryID FROM Subcategories ORDER BY SubcategoryName";
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetchAll();
}

public function getSubcategoryByID($id){
 $sql = "SELECT SubcategoryName, SubCategoryID FROM Subcategories WHERE SubCategoryID = :id ORDER BY SubcategoryName";
 $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id));
 return $statement->fetch();
}

public function getAllImprints(){
 $sql = "SELECT Imprint, ImprintID FROM Imprints ORDER BY Imprint";
 $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
 return $statement->fetchAll();
}

public function getImprintByID($id){
 $sql = "SELECT Imprint, ImprintID FROM Imprints WHERE ImprintID = :id ORDER BY Imprint";
 $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id));
 return $statement->fetch();
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