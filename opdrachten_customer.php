<?php
require_once("./class/OrderClass.php");

?>
Opdrachten van klanten
<p>
<table>
	<form action='' method=''>
		<tr>
			<th>ordernr.</th>
			<th>opdracht</th>
			<th>datum</th>
			<th>aantal foto's</th>
			<th>kleur foto's</th>
			<th>betaald</th>
			<th>bevestigd</th>
			<th>prijs</th>
			<th>bevestigd</th>
		</tr>
		<?php echo OrderClass::find_orders_by_id(); ?>
	</form>
</table>