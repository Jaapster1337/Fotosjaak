<?php
if ( isset($_POST['submit']))
{
	//geef het pad op naar het bestand LoginClass.php
	require_once ('class/LoginClass.php');
	//kijkt in de tabel login of het emailadres al bestaat
	if ( LoginClass::emailaddress_exists($_POST['email']) )
	{
		/*meldt dat het emailadres al in gebruik is en dat er een ander adres gekozen moet worden*/
		echo "het ingevulde emailadres is al in gebruik.<br /> vul een nieuw emailadres in. <br />
		u wordt door gestuurd naar de registratie pagina.";
		header('refresh:4;url=index.php?content=register');
	}
	else
	{
	//schrijf alle gegevens naar de database
		LoginClass::insert_into_login($_POST);
		echo "U bent succesvol geregistreerd. U ontvangt binnen enkele ogenblikken een activatiemail";
		header("refresh:3;url=index.php");
	//verstuur een email met een activatielink	
	}
}
else
{

?>

<form action='index.php?content=register' method='post'>
	<table>
		<tr>
			<td>firstname</td>
			<td><input type='text' name='firstname' /></td>
		</tr>
		<tr>
			<td>infix</td>
			<td><input type='text' name='infix' /></td>
		</tr>
		<tr>
			<td>surname</td>
			<td><input type='text' name='surname' /></td>
		</tr>
		<tr>
			<td>address</td>
			<td><input type='text' name='address' /></td>
		</tr>
		<tr>
			<td>addressnr</td>
			<td><input type='text' name='addressnr' /></td>
		</tr>
		<tr>
			<td>city</td>
			<td><input type='text' name='city' /></td>
		</tr>
		<tr>
			<td>zipcode</td>
			<td><input type='text' name='zipcode' /></td>
		</tr>
		<tr>
			<td>country</td>
			<td><input type='text' name='country' /></td>
		</tr>
		<tr>
			<td>phonenumber</td>
			<td><input type='text' name='phonenumber' /></td>
		</tr>
		<tr>
			<td>mobilenumber</td>
			<td><input type='text' name='mobilenumber' /></td>
		</tr>
		<tr>
			<td>email</td>
			<td><input type='text' name='email' /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='submit' /></td>
		</tr>
	</table>
</form>
<?php
}
?>