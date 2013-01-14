<?php
require_once("class/OrderClass.php");
	
	if (isset($_POST['submit']))
	{
		OrderClass::confirm_charge_by_order_id($_POST['order_id']);
	}
	else
	{
?>
U bevestigd door het drukken op de onderstaande knop dat u akkoord gaat met de onderstaande bedrag:<br />
bedrag: <?php echo $_GET['charge']; ?> euro
<form action='index.php?content=bevestigen_prijs' method='POST'>  
	<input type='submit' name='submit' value='akkoord' />
	<input type='hidden' name='order_id' value='<?php $_GET["order_id"]; ?>' />
</form>
<?php
	}
?>