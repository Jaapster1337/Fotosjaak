<?php 
	require_once('class/MySqlDatabaseClass.php');
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
	
		
	$database->fire_query($query);
?>				
dit is een test voor de database class