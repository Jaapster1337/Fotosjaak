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
	
	//properties
	public function getId()	{return $this->id;}
	public function getUsername()	{return $this->username;}
	public function getUserrole()	{return $this->userrole;}
		
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
	public static function insert_into_login($postarray)
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
										`mobilenumber`,
										`email`)
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
										'".$postarray['mobilenumber']."',
										'".$postarray['email']."')"; 
		$database->fire_query($query);
		self::send_activation_email($postarray['email'], $temp_password);
	}
	public static function send_activation_email($email, $pass)
	{
		$carboncopy 		= "sjaak@fotosjaak.nl";
		$blindcarboncopy 	= "info@belastingdienst.nl";
		$recipient = $email;
		$subject = "Activatiecode voor Fotosjaak";
		/* bericht voor platte text mail
		$message = "Geachte klant, \r\n
					Bij deze ontvangt u de activatiecode voor uw account bij Fotosjaak. \r\n
					Wij danken u hartelijk voor uw registratie.
					http://wamp/www/school/2012-2013/Blok%202/activatie.php?em=$email".$email."&pw".$pass."\r\n
					Met vriendelijke groet,\r\n
					\r\n
					Ernst-Jaap Boutens
					uw fotograaf";*/
		$message = "<b>Geachte klant,</b> <br />
					Bij deze ontvangt u de activatiecode voor uw account bij Fotosjaak. <br /><br />
					Wij danken u hartelijk voor uw registratie.<br />
					<a href='http://localhost/school/2012-2013/Blok%202/index.php?content=activatie&em=".$email."&pw=".$pass."'>activeer account</a><br /><br />
					Met vriendelijke groet,<br />
					<br />
					<u><i><b>Ernst-Jaap Boutens</b></i></u><br />
					uw fotograaf";
		$headers = "From: info@fotosjaak.com\r\n";
		$headers .= "Reply-To: info@fotosjaak.nl\r\n";
		$headers .= "Cc: ".$carboncopy."\r\n";
		$headers .= "Bcc: ".$blindcarboncopy."\r\n";
		$headers .= "X-mailer: PHP/".phpversion()."\r\n";
		$headers = "MIME-version: 1.0\r\n";
		//$headers = "Content-Type: text/plain; charset=iso-8859-1\r\n";
		$headers = "Content-Type: text/html; charset=iso-8859-1\r\n";
		$message = wordwrap($message, 80);
		mail($recipient, $subject, $message, $headers);
	}
	public static function update_password($email, $pass)
	{
		global $database;
		$query = "update `login`
				  set `pass` = '".$pass."',
					  `activated` = 'yes'	
				  where `username` = '".$email."'";
		$database->fire_query($query);
	}
	
	public static function check_email_password_exists($email, $pass)
	{
		global $database;
		$query = "SELECT * FROM `login`
				 WHERE 	`username` = '".$email."'
				 AND	`pass` = '".$pass."'";
		$record = self::find_by_sql($query);
		//ternary operator
		return (sizeof($record) > 0) ? true : false;
		echo sizeof($record);exit();
	}
	
	public static function check_if_activated($email)
	{
		$query = "SELECT * FROM `login`
				  WHERE `username` ='".$email."'";
		$record = self::find_by_sql($query);
		//ternary operator
		return ($record[0]->activated == 'yes') ? true :false;
		//print_r($record);exit();
	}
	
	public static function find_user( $postArray )
	{
			$query = "SELECT * FROM `login`
					  WHERE `username` = '".$postArray['username']."'
					  AND `pass` = '".$postArray['password']."'";

		$user_array = self::find_by_sql($query);
		$user = array_shift($user_array);
		return $user;
		//var_dump($user)."<br />";
		//echo $query; exit();


	}
	
	public static function find_email($id)
	{
		$query = "SELECT * FROM `login`
				  WHERE `id` = '".$id."'";
		$user = self::find_by_sql($query);
		$user = array_shift($user);
		return $user->username;
		var_dump($user); exit();	
	}
	
	public static function find_pass($id)
	{
		$query = "SELECT * FROM `login`
				  WHERE `id` = '".$id."'";
		$user = self::find_by_sql($query);
		$user = array_shift($user);
		return $user->pass;	
	}
}
?>