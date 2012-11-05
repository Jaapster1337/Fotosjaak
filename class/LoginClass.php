<?php
require_once("MySqlDatabaseClass.php")
class LoginClass
{
	//Fields
	private $id;
	private $username;
	private $pass;
	private $userrole;
	private $activated;
	
	//Constuctor
	public function __construct()
	{
	
	}
	
	public function find_by_sql($query)
	{
		global $database;
		$result = $database->fire_query($query);
		$object_array = array();		
		while($row = mysql_fetch_object($result))
		{
			$object = new LoginClass();
			$object->id = $row->id;
			$object->username = $row->username;
			$object->pass = $row->pass;
			$object->userrole = $row->userrole;
			$object->activated = $row->activated;
			$object_array[] = $object;
		}	
		return $object_array;
	}
	
}
?>