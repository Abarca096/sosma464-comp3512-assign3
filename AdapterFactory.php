<?php
//this class returns an object that connects to the database
class AdapterFactory{
	public static function createAdapter(){
return new DatabaseHelper();
}
}
?>
