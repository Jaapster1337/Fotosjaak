<?php
require_once("MySqlDatabaseclass.php");
class UserClass
{
//fields
	private $id;
	private $firstname;
	private $infix;
	private $surname;
	private $address;
	private $addressnumber;
	private $city;
	private $zipcode;
	private $country;
	private $telphonenumber;
	private $mobilenumber;
		
	//properties
	//public function getFirstname() { return $this->firstname; }
	
	public function getField($name ){ return (property_exists(__CLASS__, $name ) ) ? $this->$name : Null;}
	
	public function SetField($name, $value ){ return (property_exists(__CLASS__, $name ) ) ? $this->$name = $value : $this->$name = NULL;}
		
	public static function find_by_sql( $query )	
		{
			global $database;// globale variable database
			$result = $database->fire_query( $query);//vestuurt het resulataat naar de database
			$object_array = array();
			
			while ($row = mysql_fetch_object ( $result ) )
			{
			 $object = new UserClass();
			 $object->id = $row->id;
			 $object->firstname = $row->firstname;
			 $object->infix = $row->infix;
			 $object->surname = $row->surname;
			 $object->address = $row->address;
			 $object->addressnr = $row->addressnr;
			 $object->city = $row->city;
			 $object->zipcode = $row->zipcode;
			 $object->country = $row->country;
			 $object->phonenumber= $row->phonenumber;
			 $object->mobilenumber= $row->mobilenumber;
			 $object_array[] = $object;
			 
			}
			return $object_array;
		}
	
	public static function find_firstname_infix_surname()
	{
		$query = "SELECT * FROM `user`
				  WHERE `id` = '".$_SESSION['user_id']."'";
		//var_dump(array_shift(self::find_by_sql($query))); exit();
		$user = array_shift(self::find_by_sql($query));
		return $user;
		
	}
	public static function ChangeData($postArray)
	{
		global $database;
		
		$query = "UPDATE `user`,`login`
			  SET `user`.`firstname` = '".safetext($postArray["vn"])."', 
			      `user`.`infix` = '".safetext($postArray["tv"])."', 
				  `user`.`surname`= '".safetext($postArray["an"])."', 
				  `user`.`address`= '".safetext($postArray["stra"])."', 
				  `user`.`addressnr`= '".safetext($postArray["huisnr"])."', 
				  `user`.`city`= '".safetext($postArray["Stad"])."', 
				  `user`.`zipcode` = '".safetext($postArray["pc"])."', 
				  `user`.`country`= '".safetext($postArray["land"])."', 
				  `user`.`phonenumber`= '".safetext($postArray["tel"])."', 
				  `user`.`mobilenumber`= '".safetext($postArray["mob"])."', 
				  `login`.`username` = '".safetext($postArray["email"])."', 
				  `login`.`pass`= '".safetext($postArray["wacht"])."'
				  WHERE `user`.`id` = '".$_SESSION["user_id"]."'
				  AND
				  `login`.`id` = '".$_SESSION["user_id"]."'";
				  $database->fire_query($query);
				 header("refresh:4;index.php?content=home");
	}
	public static function find_users($postArray)
	{
			global $database;
			
			$query = "Select * from `user`,`login` Where `user`.`id` = '".$_GET['ID']."'	";
			 $result = $database->fire_query($query);
			 $record = mysql_fetch_array($result);	
				
		echo "<tr>
		<td>Firstname</td>
		<td><input type ='text' name= 'vn' value = '".$record['firstname']."' /></td>
		</tr>
		
		<tr>
		<td>Infix</td>
		<td><input type ='text' name= 'tv' value = '".$record['infix']."' /></td>
		</tr>
		
		<tr>
		<td>Surname</td>
		<td><input type ='text' name= 'an' value = '".$record['surname']."' /></td>
		</tr>
		
		<tr>
		<td>Address</td>
		<td><input type ='text' name= 'stra' value = '".$record['address']."' /></td>
		</tr>
		
		<tr>
		<td>Addresnumber</td>
		<td><input type ='text' name= 'huisnr' value = '".$record['addressnr']."' /></td>
		</tr>
		
		
		<tr>
		<td>City</td>
		<td><input type ='text' name= 'Stad' value = '".$record['city']."' /></td>
		</tr>
		
		<tr>
		<td>Zipcode</td>
		<td><input type ='text' name= 'pc' value = '".$record['zipcode']."' /></td>
		</tr>
		
		<tr>
		<td>Country</td>
		<td><input type ='text' name= 'land' value = '".$record['country']."' /></td>
		</tr>
		
		<tr>
		<td>Telephone_number</td>
		<td><input type ='text' name= 'tel' value = '".$record['phonenumber']."' /></td>
		</tr>
		
		<tr>
		<td>Mobile_number</td>
		<td><input type ='text' name= 'mob' value = '".$record['mobilenumber']."' /></td>
		</tr>
		
		<tr>
		<td>Email</td>
		<td><input type ='text' name= 'email' value = '".$record['username']."' /></td>
		</tr>
		
		<tr>
		<td>Wachtwoord</td>
		<td><input type ='password' name= 'wacht' value = '".$record['pass']."' /></td>
		</tr>
		
		<tr>
		<td><input type='submit' name='submit' value='submit'/></td>
		</tr>";
		
	}
	
	public static function find_customers($postArray)
	{
			global $database;
			
			$query = "Select * from `user`,`login` WHERE `user`.`id` = '".$_GET["ID"]."' AND  `login`.`id` = '".$_GET["ID"]."' ";
			 $result = $database->fire_query($query);
			 $record = mysql_fetch_array($result);	
				
		echo "<tr>
		<td>Firstname</td>
		<td><input type ='text' name= 'vn' value = '".$record['firstname']."' /></td>
		</tr>
		
		<tr>
		<td>Infix</td>
		<td><input type ='text' name= 'tv' value = '".$record['infix']."' /></td>
		</tr>
		
		<tr>
		<td>Surname</td>
		<td><input type ='text' name= 'an' value = '".$record['surname']."' /></td>
		</tr>
		
		<tr>
		<td>Addres</td>
		<td><input type ='text' name= 'stra' value = '".$record['address']."' /></td>
		</tr>
		
		<tr>
		<td>Addresnumber</td>
		<td><input type ='text' name= 'huisnr' value = '".$record['addressnr']."' /></td>
		</tr>
		
		
		<tr>
		<td>City</td>
		<td><input type ='text' name= 'Stad' value = '".$record['city']."' /></td>
		</tr>
		
		<tr>
		<td>Zipcode</td>
		<td><input type ='text' name= 'pc' value = '".$record['zipcode']."' /></td>
		</tr>
		
		<tr>
		<td>Country</td>
		<td><input type ='text' name= 'land' value = '".$record['country']."' /></td>
		</tr>
		
		<tr>
		<td>Telephone_number</td>
		<td><input type ='text' name= 'tel' value = '".$record['phonenumber']."' /></td>
		</tr>
		
		<tr>
		<td>Mobile_number</td>
		<td><input type ='text' name= 'mob' value = '".$record['mobilenumber']."' /></td>
		</tr>
		
		<tr>
		<td>Email</td>
		<td><input type ='text' name= 'email' value = '".$record['username']."' /></td>
		</tr>
		
		<tr>
		<td>Wachtwoord</td>
		<td><input type ='password' name= 'wacht' value = '".$record['pass']."' /></td>
		</tr>
		
		<tr>
		<td><input type='submit' name='submit' value='submit'/></td>
		</tr>";
		
	}
	
	public static function find_users_by_id($postArray)
	{
		global $database;
		$query = "SELECT *
				FROM `user`
				WHERE `ID` = '{$_GET['ID']}'";
				$result = $database->fire_query($query);
				$record = mysql_fetch_array($result);	
	}
	
	public static function find_user_info($postArray)
	{
		global $database;
		$query = " SELECT * FROM `user`";
		$database->fire_query($query);
	}
	public static function delete_user($postArray)
	{
		global $database;
		
		$query = "DELETE FROM `user`,`login`
		WHERE `user`.`id` = ".$_GET['ID']."";
		$database->fire_query($query);
	}
	
	public static function options($postArray)
	{
	global $database;
	$query = "SELECT *
				FROM `user`";
			
				$result = $database->fire_query($query);
				$record = mysql_fetch_array($result);
	while ($row = mysql_fetch_array($result))
	{

		echo 	"<tr>
				<td>{$row['id']}</td>
				<td>{$row['firstname']}</td>
				<td>{$row['surname']}</td>
				<td><a href='index.php?content=view_registration&ID={$row['id']}&action=edit' ><img src = 'css/edit.png' alt='edit'></a></td>
				<td><a href='index.php?content=view_registration&ID={$row['id']}&action=drop'>
				<img src = 'css/download.png' alt='delete'></tr>
				</tr>";	
	}
	}
	public static function show_firstname()
	{
		global $database;
		
		$query = "SELECT `firstname` FROM `user` WHERE `id` = ".$_GET['ID']."";
		$result = $database->fire_query($query);
		$record = mysql_fetch_array($result);
		echo $record['firstname'];
	}
	

}
?>