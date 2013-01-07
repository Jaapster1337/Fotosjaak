<?php
require_once("MySqlDatabaseClass.php");
require_once("UserClass.php");
require_once("LoginClass.php");
require_once("DateFormatClass.php");
require_once("DbFormatClass.php");


class OrderClass
{
	//Fields
	private $order_id;
	private $user_id;
	private $order_short;
	private $order_long;
	private $deliverydate;
	private $eventdate;
	private $color_pictures;
	private $number_of_pictures;
	private $orderdate;
	private $confirmed;
	private $charge;
	private $paid;

	//Constructor
	public function __construct()
	{

	}

	public static function find_by_sql( $query )
	{
		global $database;
		//datum genereren
		$date = date("Y-m-d H:i:s");
		echo $date; exit();
		$result = $database->fire_query( $query );
		$object_array = array();
		while ( $row = mysql_fetch_object( $result ) )
		{
			$object = new OrderClass();
			$object->order_id = $row->order_id;
			$object->user_id = $row->user_id;
			$object->order_short = $row->order_short;
			$object->order_long = $row->order_long;
			$object->deliverydate = $row->deliverydate;
			$object->eventdate = $row->eventdate;
			$object->color_pictures = $row->color_pictures;
			$object->number_of_pictures = $row->number_of_pictures;
			$object->orderdate = $row->orderdate;
			$object->confirmed = $row->confirmed;
			$object->charge = $row->charge;
			$object->paid = $row->paid;
			$object_array[] = $object;	
		}
		return $object_array;
	}

	public static function insert_into_Order( $postarray )
	{
		global $database;
		$date = date("Y-m-d H:i:s");
		$query = "INSERT INTO `order` (
				 `order_id`,
				 `user_id`,
				 `order_short`,
				 `order_long`,
				 `deliverydate`,
				 `eventdate`,
				 `color_pictures`,
				 `number_of_pictures`,
				 `orderdate`,
				 `confirmed`,
				 `charge`,
				 `paid`)
		VALUES  ( Null,
				'".$_SESSION['user_id']."',
				'".$postarray['order_short']."',
				'".$postarray['order_long']."',
				'".date ("Y-m-d", strtotime($postarray['deliveryDate']))."',
				'".date ("Y-m-d", strtotime($postarray['eventDate']))."',
				'".$postarray['color']."',
				'".$postarray['numberOfPictures']."',
				'".$date."',
				'no',
				'0',
				'no')";
		$database->fire_query($query);	
		$order_id = mysql_insert_id();
		self::send_orderactivation_email($postarray, $order_id, $date);
		echo "U opdracht is goed ontvangen. U krijgt een bevestigingsmail toegestuurd. Nadat u op de bevestigingslink heeft geklikt is de opdracht definitief.";
		header("refresh:40000;url=index.php?content=customerHomepage");
	}

	public static function send_orderactivation_email($postarray, $order_id, $date)
	{
		$user = UserClass::find_firstname_infix_surname();
		$carbonCopy = "sjaak@fotosjaak.nl";
		$blindCarbonCopy = "info@belastingdienst.nl";
		$ontvanger = LoginClass::find_email($_SESSION['user_id']);
		$password = LoginClass::find_pass($_SESSION['user_id']);
		$onderwerp = "Activatiemail website FotoSjaak";

		$bericht = "Geachte heer/mevrouw <b>".$user->get("firstname").
								" ".$user->get("infix").
								" ".$user->get("surname")."</b><br /><br />
								 Wij hebben de onderstaande order van u ontvangen.<br />
								 <table>
									<tr>
										<td>Uw order_id</td>
										<td>".$order_id." </td>
									</tr>
									<tr>
										<td>Korte omschrijving</td>
										<td>".$postarray['order_short']."</td>
									</tr>
									<tr>
										<td>Uitgebreide omschrijving</td>
										<td>".$postarray['order_long']."</td>
									</tr>
									<tr>
										<td>Opleveringsdatum</td>
										<td>".$postarray['deliveryDate']."</td>
									</tr>
									<tr>
										<td>Evenementdatum</td>
										<td>".$postarray['eventDate']."</td>
									</tr>
									<tr>
										<td>Kleur</td>
										<td>".$postarray['color']."</td>
									</tr>
									<tr>
										<td>Aantal foto's</td>
										<td>".$postarray['numberOfPictures']."</td>
									</tr>
									<tr>
										<td>Aanvraagdatum</td>
										<td>".date("d-m-Y", strtotime($date))."</td>
									</tr>									
								 </table>
								 TODO:hier komt de order
								 Wanneer u op de onderstaande link klikt is de order definitief.<br />
								 Ugaat hierdoor akkoord met de algemene voorwaarden.<br />
								 <a href='http://localhost/school/2012-2013/Blok 2/index.php?content=confirmOrder&order_id=".$order_id."&username=".$ontvanger."&password=".$password."'>bevestig order</a><br /><br />
								 Met vriendelijke groet,<br />
								 <i><u>Sjaak de Vries</u></i><br />
								 uw fotograaf";

		$headers = "From: info@fotosjaak.nl\r\n";
		$headers .= "Reply-To: info@fotosjaak.nl\r\n";
		$headers .= "Cc: ".$carbonCopy."\r\n";
		$headers .= "Bcc: ".$blindCarbonCopy."\r\n";
		$headers .= "X-mailer: PHP/".phpversion()."\r\n";
		$headers .= "MIME-version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
		mail( $ontvanger, $onderwerp, $bericht, $headers );
	}
	
	
	public static function confirm_order_by_id($order_id)
	{
		global $database;
		//TODO check of de persoon die deze order op confirmed wil zetten wel de
		//persoon is die deze opdracht geplaatst heeft.
		$query = "UPDATE `order` SET `confirmed` = 'yes'
		WHERE `order_id` = '".$order_id."'";
		$database->fire_query($query);
	}
	
	public static function find_orders_users()
	{
		global $database;
		$query = "SELECT * FROM `order`, `user`
		WHERE `order`.`user_id` = `user`.`id`
		ORDER BY 'user_id'";
		$result = $database->fire_query($query);
		$rows = "";
		$previous = "";
		while ( $object = mysql_fetch_object($result))
		{
		//var_dump($object);
		$current = $object->user_id;
		if ( $current != $previous)
		{
		$rows.= "<tr>
					<td colspan='5'>test</td>
					id = [".$object->user_id."] 
						  ".$object->firstname." 
						  ".$object->infix." 
						  ".$object->surname."
				</tr>";
		}
		$previous = $current;
		$rows .=   "<tr>						
						<td>".$object->order_id."</td>
						<td>".$object->order_short."</td>
						<td>
						oplevering: ".DateFormat::change($object->deliverydate)."<br />
						Evenement: ".DateFormat::change($object->eventdate)."<br />
						plaatsing: ".DateFormat::change($object->orderdate)."<br />
						</td>
						<td>".$object->number_of_pictures."</td>
						<td>".DbFormat::translate_color($object->color_pictures)."</td>
						<td>".DbFormat::translate_paid($object->paid)."</td>
						<td>".DbFormat::translate_paid($object->confirmed)."</td>
						<td>".$object->charge."</td>
						<td>
							<a href='index.php?content=upload_form&customer={$object->user_id}&order_id={$object->order_id}'>
							dit is een plaatje.png							
							</a>
						</td>
					</tr>";
		}
		return $rows;
	}
 }
?>