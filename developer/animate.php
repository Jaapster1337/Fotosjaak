<style>
 #rooddivje
 {
	background-color:red;
	width:200px;
	height:200px;
	position:absolute;
	top:50px;
 }
</style>
<p>Animatie</p>
<script type='text/javascript'>
	$("document").ready(function(){
	
		$("button").click(function(){
			var cssObjectAfter = {"width" : "200px",
								  "height" : "200px",
								  "background-color" : "yellow",
								  "font-size" : "3em",
								  "opacity" : "0.5",
								  "top" : "50px",
								  "left" : "600px"};
								  
			var cssObjectBefore = {"width" : "200px",
								  "height" : "200px",
								  "background-color" : "red",
								  "font-size" : "3em",
								  "top" : "300px",
								  "opacity" : "1.0"};
			
			var cssObjectLeft = {"width" : "200px",
								  "height" : "200px",
								  "background-color" : "purple",
								  "font-size" : "0.1em",
								  "top" : "300px",
								  "left" : "0px",
								  "opacity" : "1.0"};
			
			var cssObjectEnd = {"width" : "200px",
								  "height" : "200px",
								  "background-color" : "green",
								  "font-size" : "1em",
								  "top" : "50px",
								  "left" : "0px",
								  "opacity" : "1.0"};
			$("#rooddivje").animate( cssObjectAfter, 2000, animateBack);
			
			function animateBack(){
				$("#rooddivje").animate(cssObjectBefore, 2000, animateLeft);
			}
			
			function animateLeft(){
				$("#rooddivje").animate(cssObjectLeft, 2000, animateEnd);
			}
			
			function animateEnd(){
				$("#rooddivje").animate(cssObjectEnd, 2000);
			}
		});	
	});	
</script>

<div id='rooddivje'>Ik wordt geanimeerd</div>
<button>animeer mij</button>