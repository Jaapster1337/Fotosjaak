<?php
require_once("./class/OrderClass.php");
require_once("./class/LoginClass.php");
require_once("./class/UserClass.php");
require_once("./class/MySqlDatabaseClass.php");

	global $database;
	$query = "SELECT *
			  FROM `user`,`login`
			  WHERE `user`.`id` = '".$_SESSION['user_id']."'
			  AND `login`.`id` = '".$_SESSION['user_id']."'";

	
if ( isset($_POST['submit'])){
	global $database;

	//$result = mysql_query($query, $database);
	//wegschrijven van queries naar een database
	$query = "UPDATE `user` SET
														`firstname` = '".$_POST['firstname']."',
														`infix` = '".$_POST['infix']."',
														`surname`= '".$_POST['surname']."',
														`address` = '".$_POST['address']."',
														`addressnr` = '".$_POST['addressnr']."',
														`city` = '".$_POST['city']."',
														`zipcode` = '".$_POST['zipcode']."',
														`country` = '".$_POST['country']."',
														`phonenumber` = '".$_POST['phonenumber']."',
														`mobilenumber` = '".$_POST['mobilenumber']."',
														`email` = '".$_POST['email']."'													
														WHERE `id` = '{$_SESSION['user_id']}'";
	$database->fire_query( $query );
//echo $query; exit();
 //or die ("record is niet weggeschreven".$query);
 ?>

	<p><h4>U heeft de onderstaande gegevens ingevuld.<br />
	U wordt doorgestuurd naar de homepage.</h4></p>
<table border="0">

	<tr>
		<td>Voornaam</td>
		<td><?php echo $_POST["firstname"];?></td>
	</tr>
	<tr>
		<td>Tussenvoegsel</td>
		<td><?php echo $_POST["infix"];?></td> 
	</tr>
	<tr>
		<td>Achternaam</td>
		<td><?php echo $_POST["surname"];?></td> 
	</tr>
	<tr>
		<td>Adres</td>
		<td><?php echo $_POST["address"];?></td> 
	</tr>
	<tr>
		<td>Postcode</td>
		<td><?php echo $_POST["addressnr"];?></td> 
	</tr>
	<tr>
		<td>Stad</td>
		<td><?php echo $_POST["city"];?></td> 
	</tr>
	<tr>
		<td>Telefoon vast</td>
		<td><?php echo $_POST["zipcode"];?></td> 
	</tr>
	<tr>
		<td>Telefoon mobiel</td>
		<td><?php echo $_POST["country"];?></td> 
	</tr>
	<tr>
		<td>Naam school</td>
		<td><?php echo $_POST["phonenumber"];?></td> 
	</tr>
	<tr>
		<td>Naam opleiding</td>
		<td><?php echo $_POST["mobilenumber"];?></td> 
	</tr>
</table>
<?php }else{ 
	//$result = $database->fire_query($query);
	//$object = mysql_fetch_object($result);
	$result = mysql_query($query);
	$object = mysql_fetch_object($result);
	?>
<form action='index.php?content=updateregistration' method='post' id='regForm'>
	<table>
		<tr>
			<td>firstname</td>
			<td><input type='text' name='firstname' value='<?php echo $object->firstname ?>' /></td>
		</tr>
		<tr>
			<td>infix</td>
			<td><input type='text' name='infix' value='<?php echo $object->infix ?>'/></td>
		</tr>
		<tr>
			<td>surname</td>
			<td><input type='text' name='surname' value='<?php echo $object->surname ?>'/></td>
		</tr>
		<tr>
			<td>address</td>
			<td><input type='text' name='address' value='<?php echo $object->address ?>'/></td>
		</tr>
		<tr>
			<td>addressnr</td>
			<td><input type='text' name='addressnr' value='<?php echo $object->addressnr ?>'/></td>
		</tr>
		<tr>
			<td>city</td>
			<td><input type='text' name='city' value='<?php echo $object->city ?>'/></td>
		</tr>
		<tr>
			<td>zipcode</td>
			<td><input type='text' name='zipcode' value='<?php echo $object->zipcode ?>'/></td>
		</tr>
		<tr>
			<td>country</td>
			<td><input type='text' name='country' value='<?php echo $object->country ?>'/></td>
		</tr>
		<tr>
			<td>phonenumber</td>
			<td><input type='text' name='phonenumber' value='<?php echo $object->phonenumber ?>'/></td>
		</tr>
		<tr>
			<td>mobilenumber</td>
			<td><input type='text' name='mobilenumber' value='<?php echo $object->mobilenumber ?>'/></td>
		</tr>
		<tr>
			<td>email</td>
			<td><input type='text' name='email'  value='<?php echo $object->email ?>'/></td>
		</tr>
		<tr>
			<td>email</td>
			<td><input type='text' name='email'  value='<?php echo $object->email ?>'/></td>
		</tr>		
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='submit' /></td>
		</tr>
	</table>
</form>
<?php } 
//<meta http-equiv='refresh' content='4;url=index.php?content=homepage' />
?>
