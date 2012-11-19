<?php
echo "gebruikersnaam: ".$_get['em']."<br />";
echo "wachtwoord: ".$_get['pw']."";
?>
wekom op de site. Uw account wordt geactiveerd nadat u <br />
een nieuw wachtwoord heeft gekozen.
<form action='' method=''>
	<table>
		<tr>
			<td>Voer een nieuw wachtwoord in</td>
			<td><input type='password' name='pass'></td>
		</tr>
		<tr>
			<td>Herhaal het nieuwe wachtwoord</td>
			<td><input type='password' name='pass-check'></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='submit' value='send'></td>
		</tr>
	</table>
</form>