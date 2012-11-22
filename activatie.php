<?php
require_once("./class/LoginClass.php");
//echo "gebruikersnaam: ".$_get['em']."<br />";
//echo "wachtwoord: ".$_get['pw']."";

if (isset($_POST['submit']))
{
	if ( !strcmp($_POST['pass'],$_POST['pass-check']))
	{
		echo "sla het nieuwe wachtwoord op";
		LoginClass::update_password($_POST['email'], $_POST['pass']);
	}
	else
	{
		
	}
	
}
else
{
?>
wekom op de site. Uw account wordt geactiveerd nadat u <br />
een nieuw wachtwoord heeft gekozen.
<form action='activatie.php' method='post'>
	<table>
		<tr>
			<td>Voer een nieuw wachtwoord in (max. 12 tekens)</td>
			<td><input type='password' name='pass' size=12 maxlength=12 /></td>
		</tr>
		<tr>
			<td>Herhaal het nieuwe wachtwoord</td>
			<td><input type='password' name='pass-check' size=12 maxlength=12 /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
			<input type='submit' name='submit' value='send' />
			<input type='hidden' name='email' value='<?php echo $_GET['em']; ?>' />			
			</td>
		</tr>
	</table>
</form>
<?php
}
?>