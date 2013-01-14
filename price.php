<?php
require_once("class/OrderClass.php");

if (isset($_POST['button']))
{
	OrderClass::update_charge_by_id($_POST['order_id'], $_POST['price']);
}
else
{

?>

<table>
	<caption>Geef een prijd in euro's</caption>
	<form action='index.php?content=price' method='post'>
		<tr>
			<td><input type='text' name='price'/></td>
		</tr>
		<tr>
			<td><input type='submit' name='button' value='verstuur'/></td>
		</tr>
		<input type='hidden' name='user_id' value='<?php echo $_GET["user_id"]; ?>'/>
		<input type='hidden' name='order_id' value='<?php echo $_GET["order_id"]; ?>'/>
		
	</form>
</table>
<?php
}
?>