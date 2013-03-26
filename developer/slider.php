<h3>Dit is een slider</h3>
<style>
#slider
{
	width:100px;
	height:10px;
}

img
{
	width:100px;
	height:100px;
}
</style>
<script type='text/javascript'>
	$('document').ready(function(){
		//alert("Ik werk!");
		$('#slider1').slider({ max: 400,
							  min: 0,
							  orientation: 'vertical',
							  value: 100,
							  slide: function( event, ui ) {
								$('img').css('height', ui.value);
							  }							
							});
		$('#slider').slider({ max: 400,
							   min: 0,
							   orientation: 'horizontal',
							   value: 100,
							   slide: function(event, ui){
								$('img').css('width', ui.value);
							   }		
							 });
		
	});
</script>

<div id='slider'></div>
<div id='slider1'></div>
<img src='./developerzone/img/panda.jpg' />