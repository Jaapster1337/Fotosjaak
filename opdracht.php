<style type="text/css">
	p.error
	{
		background-color:RGBA(240,240,240,1.0);
		color:RGBA(240,0,0,0.4);
		width:400px;
	}
</style>

<script type='text/javascript'>
	$( function(){
		$(".datepicker").datepicker({ dateFormat: "dd-mm-yy" });
		//$(".datepicker").datepicker( "option", "autoSize", true );
				$('#eventForm').validate({
					rules: {
						order_short: "required",
						order_long: "required",
						deliveryDate: "required",
						eventDate: "required",
						numberOfPictures: "required"
						},						
					messages:	{
						order_short: "<p class='error'> Dit veld is verplicht",
						order_long: "<p class='error'>Dit veld is verplicht",
						deliveryDate: "<p class='error'>Dit veld is verplicht",
						eventDate: "<p class='error'>Dit veld is verplicht",
						numberOfPictures: "<p class='error'>Dit veld is verplicht"
						}
				})
	});
	

</script>
<?php
	$options = "<option value='' >--aantal foto's--</option>";
	for ( $i = 50; $i <= 1000; $i+=50 )
	{
		$options .= "<option value='".$i."'>".$i."</option>";
	}
	
		if ( isset($_POST['submit']) )
		{
			require_once("./class/OrderClass.php");
			//Formuliergegegevens opslaan in de database
			OrderClass::insert_into_Order($_POST);
			//Email sturen naar de persoon in kwestie
		}
		else
		{
?>

<p>plaats een opdracht</p>
<form action='index.php?content=opdracht' method='post' id='eventForm'>
	<!--korte omschijving van de opdracht-->
		korte omschrijving<br />
		<textarea cols='60' rows='5' name='order_short' placeholder='Geef een korte beschrijving van de opdracht.'></textarea><br />
	<!--uitgebreide omschrijving -->
		Uitgebreide omschijving opdracht<br />
		<textarea cols='60' rows='5' name='order_long' placeholder='Geef een uitgebreide beschrijving van de opdracht.'></textarea><br />	
	<!--datum oplevering-->
		Geef hier de datum van de oplevering<br />
		<input type='text' class='datepicker' name='deliveryDate' placeholder= 'dd-mm-yyyy' /><br />
	<!--datum evenement-->
		Geef hier de datum van het evenement<br />
		<input type='text' class='datepicker' name='eventDate' placeholder='dd-mm-yyyy' /><br />
	<!--kleur of zwartwit-->
		<input type='radio' name='color' value='black-white' checked='checked'/>zwart-wit<br />
		<input type='radio' name='color' value='color'/>kleur<br />
	<!--aantal foto's-->
		Selecteer het aantal foto's <br />
		<select name='numberOfPictures' class='required'>
			<?php echo $options; ?>
		</select><br />
	<input type='submit' name='submit' value='verstuur' />
</form>
<?php
		}
?>