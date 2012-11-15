<?php
require_once("MySqlDatabaseClass.php");
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
	
	public static function find_by_sql($query)
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
	
	public static function find_all()
	{
		$query = "SELECT * FROM `login`";
		$result = self::find_by_sql($query);
		$output = ''; 
		foreach ( $result as $value )
		{
			$output .= $value->id." | 
				 ".$value->username." |
				 ".$value->pass." |
				 ".$value->userrole." |
				 ".$value->activated.
				 "<br />";
		}
		return $output;
	}



	public static function emailaddress_exists( $emailaddress ) 
	{
		global $database;
		$query = "SELECT * FROM `login` WHERE `username` = '".$emailaddress."'";
		$result = $database->fire_query($query);
		//ternary operator $variablel (bewering) ? waar : niet waar
		return ( mysql_num_rows($result) > 0 ) ? true : false;
	}
	public static function inster_into_login($postarray)
	{
		global $database;
		date_default_timezone_set("Europe/Amsterdam");
		$date = date("Y-m-d h:i:s");
		//maak een password van het email en de tijd en stop dit in een md5 hash
		$temp_password = md5($date.$postarray['email']);
		$query = "INSERT INTO `login` ( `id`,
										`username`,
										`pass`,
										`userrole`,
										`activated`,
										`datetime`)
								VALUES ( Null,
										'".$postarray['email']."',
										'".$temp_password."',
										'customer',
										'no',
										'".$date."')";
		$database->fire_query($query);
		//Opvragen id van net in login weggeschreven record
		$query = "SELECT * FROM `login` WHERE `username` = '".$postarray['email']."'";
		$id = array_shift (self::find_by_sql($query))->id;
		$query = "INSERT INTO `user` (	`id`,
										`firstname`,
										`infix`,
										`surname`,
										`address`,
										`addressnr`,
										`city`,
										`zipcode`,
										`country`,
										`phonenumber`,
										`mobilenumber`)
						VALUES		 (	'".$id."',
										'".$postarray['firstname']."',
										'".$postarray['infix']."',
										'".$postarray['surname']."',
										'".$postarray['address']."',
										'".$postarray['addressnr']."',
										'".$postarray['city']."',
										'".$postarray['zipcode']."',
										'".$postarray['country']."',
										'".$postarray['phonenumber']."',
										'".$postarray['mobilenumber']."')"; 
		//$database->fire_query($query);
	}
}
?>