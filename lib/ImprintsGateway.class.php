<?php

class ImprintsGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT Imprint, ImprintID FROM Imprints ";
 }

 protected function getOrderFields() {
 return 'Imprint';
 }
 protected function getPrimaryKeyName() {
 return "ImprintID";
 }
}

?>