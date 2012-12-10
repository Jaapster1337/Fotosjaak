<script type='text/javascript'>
	$( function(){
		$(".datepicker").datepicker({ dateFormat: "yy-mm-dd" });
		//$(".datepicker").datepicker( "option", "autoSize", true );
			$(#'eventform').validate({
				messages : {
					mission_short : "<p>u bent verplicht om dit veld in te vullen</p>"
				
				}
			});
	});
	

</script>
<?php
	$options = "<option value='' >--aantal foto's--</option>";
	for ( $i = 50; $i <= 1000; $i+=50 )
	{
		$options .= "<option value='".$i."'>".$i."</option>";
	}
?>

<p>plaats een opdracht</p>
<form action='index.php?content=opdracht' method='post' id='eventform'>
	<!--korte omschijving van de opdracht-->
		korte omschrijving<br />
		<textarea cols='60' rows='5' name='mission_short' placeholder='Geef een korte beschrijving van de opdracht.' class='required'></textarea><br />
	<!--uitgebreide omschrijving -->
		Uitgebreide omschijving opdracht<br />
		<textarea cols='60' rows='5' name='mission_long' placeholder='Geef een uitgebreide beschrijving van de opdracht.' class='required'></textarea><br />	
	<!--datum oplevering-->
		Geef hier de datum van de oplevering<br />
		<input type='text' class='datepicker' name='deliverydate' placeholder= 'yyyy-mm-dd' class='required'/><br />
	<!--datum evenement-->
		Geef hier de datum van het evenement<br />
		<input type='text' class='datepicker' name='eventdate' placeholder='yyyy-mm-dd' class='required'/><br />
	<!--kleur of zwartwit-->
		<input type='radio' name='color' value='blackAndWhite' checked='checked'/>zwart-wit<br />
		<input type='radio' name='color' value='color'/>kleur<br />
	<!--aantal foto's-->
		Selecteer het aantal foto's <br />
		<select name='numberOfPictures' class='required'>
			<?php echo $options; ?>
		</select><br />
	<input type='submit' name='submit' value='verstuur' />
</form>