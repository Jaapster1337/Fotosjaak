<style>
#rooddivje
{
	background-color:red;
	width:200px;
	height:200px;

}
</style>
<p>Animatie</p>
<script type='text/javascript'>
	$("document").ready(function(){
	
		$("button").click(function(){
		
			var cssObjectAfter = {"width" : "400px",
								  "height" : "50px",
								  "background-color" : "blue"};
			$("rooddivje").animate(cssObjectAfter : 2000);
			
			});
		});
</script>

<div id='rooddivje'>animatie</div>
<button>animeer mij</button>