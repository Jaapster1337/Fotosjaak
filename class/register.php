<?php
if ( isset($_POST['submit']))
{
	//Code om de gegevens op te slaan
}

?>

<form action='register.php' method='post'>
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
			<td>addressnumber</td>
			<td><input type='text' name='addressnumber' /></td>
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