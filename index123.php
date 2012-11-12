<?php 
	require_once("class/MySqlDatabaseClass.php");
	require_once("class/LoginClass.php");
	
	$query = "INSERT INTO `login`	(`id`,
									 `username`,
									 `pass`,
									 `userrole`,
									 `activated`)
						VALUES	  ( Null,
									'test@gmail.com',
									'geheim',
									'sjaak',
									'yes')";
	
		
	//$database->fire_query($query);
	
	//$login = new LoginClass();
	/*
	$query = "SELECT * FROM `login`";
	$result = $login->find_by_sql($query);
	foreach( $result as $value )
	{
		echo   $value->id." | 
			 ".$value->username." |
			 ".$value->pass." |
			 ".$value->userrole." |
			 ".$value->activated.
			 "<br />";
	}*/
	
	echo LoginClass::find_all();
		
?>				
dit is een test voor de database class