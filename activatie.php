<?php
require_once("./class/LoginClass.php");

if (isset($_POST['submit']))
{
	if ( !strcmp($_POST['pass'],$_POST['pass-check']))
	{
		//echo "sla het nieuwe wachtwoord op";
		echo LoginClass::update_password($_POST['email'], $_POST['pass']);
		echo "Uw wachtwoord is succesvol veranderd. <br /> U wordt doorgestuurd naar de startpagina";
		header("refresh:3;url=index.php");
	}
	else
	{
		echo   "De ingevoerde wachtwoorden komen niet overeen <br />
				Probeer het nogmaals";
				header("refresh:3;url=index.php?content=activatie.php&em=".$_POST['email']."&pw=".$_POST['oldpass']);
	}
	
}
else
{	
	if (LoginClass::check_email_password_exists($_GET['em'], $_GET['pw']))
	{ 
?>
	welkom op de site. Uw account wordt geactiveerd nadat u <br />
	een nieuw wachtwoord heeft gekozen.
	<form action='index.php?content=activatie' method='post'>
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
				<input type='hidden' name='oldpass' value='<?php echo $_GET['pw']; ?>' />
				</td>
			</tr>
		</table>
	</form>
<?php
	}
	else
	{
		echo "U heeft geen rechten op deze pagina. U wordt doorgestuurd naar de index.";
		header("refresh:3;url=activatie.php");
	}
}
?>