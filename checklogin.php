<?php
require_once("./class/LoginClass");
//hier wordt gekeken of er een gebruikersnaam en ww is ingevuld
//een uitroepteken maakt van true false
	if ( !empty($_POST['username']) && !empty($_POST['password']) )
	{	//check of het ingevulde gebruikersnaam en ww bestaan in de database
	
	
		if ( LoginClass::check_email_password_exists($_POST['username'], $_POST['password']) )
		{
			
			if (LoginClass::check_if_activated($_POST['username']) )
				{ echo "bestaat";
				/*$record = mysql_fetch_array($result);
				switch($record['Gebruikersrol'])
			{
				case 'Klant':
					$_SESSION['id'] = $record['id'];
					$_SESSION['Gebruikersrol'] = 'Klant';
					header('location:index.php?content=customer');
					break;
				case $_SESSION['Gebruikersrol'] = 'Admin';
					$_SESSION['id'] = $record['id'];
					header('location:index.php?content=administrator');
					break;
				case$_SESSION['Gebruikersrol'] = 'Beheerder';
					$_SESSION['id'] = $record['id'];
					header('location:index.php?content=beheerder');
					break;
				default:
					header('location:index.php?content=login');
					break;
			}*/
			
		}
		else
		{
			echo "De combinatie van username en password komt niet in deze database voor. <br />
			u wordt doorgestuurd naar de inlogpagina.";
		header('refresh:4;url=index.php?content=login');
		}
		
	}
	else
	{
	echo "Een of meerdere velden zijn niet ingevuld. <br /> U wordt teruggestuurd naar de inlogpagina.
	<meta http-equiv='refresh' content='4;url=index.php?content=login' />";
	}
?>	