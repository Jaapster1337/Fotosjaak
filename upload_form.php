<?php
if (isset($_POST['submit']))
{
	echo "
		de volgende gegevens worden doorgestuurd middels het formulier<br />
		Naam van de foto: ".$_FILES['foto']['name']."<br />
		type foto: ".$_FILES['foto']['type']."<br />
		padnaam tijdelijke opslag: ".$_FILES['foto']['tmp_name']."<br />
		error-nummer: ".$_FILES['foto']['error']."<br />
		bestandsgrootte: ".$_FILES['foto']['size']/(1024)." kB";
}
?>
<form action='' method='post' enctype='multipart/form-data'>
	<table>
		<tr>
			<td>kies een foto</td>
			<td><input type='file' name='foto'/></td>
		</tr>
		<tr>
			<td>beschrijving foto</td>
			<td><textarea cols='50' rows='5' name='beschrijving'></textarea></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='submit' value='verstuur' /></td>
		</tr>	
	</table>
	<input type='hidden' name='user_id' value='<?php echo $_GET["customer"];?>'/>
	<input type='hidden' name='order_id' value='<?php echo $_GET["order_id"];?>'/>
</form>