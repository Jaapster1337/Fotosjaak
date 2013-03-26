<h3>Dit is een dialog venster</h3>
<style>
#blok
{
	width:100px;
	height:100px;
	background-color:RGBA(6,6,6,1);
}

#dialog
{
	width:700px;
}
</style>
<script type='text/javascript'>
	
	$('document').ready(function(){
		//alert("Ik werk!");
		$('#button').click(function(){
			$('#dialog').dialog({ buttons: { "Maak blauw": function(){
															 $('#blok').css('background-color', 'blue');
															 $(this).dialog('close');
														   },
											 "Maak rood": function(){
															 $('#blok').css('background-color', 'red');
															 $(this).dialog('close');
														   },
											 "Maak groen": function(){
															 $('#blok').css('background-color', 'green');
															 $(this).dialog('close');
														   }			
										   },
								   modal: true,
								   width: 400,
								   height:0,
								   position: { my: "center", at: "center", of: window },
								   show: 'slow',
								   close: function( event, ui ) {
										alert("Het dialogvenster is gesloten");
								   }
								});
		});
	});	
</script>

<div id='dialog' title='Maak een keuze'></div>
<button id='button'>dialog tonen</button>
<div id='blok'></div>