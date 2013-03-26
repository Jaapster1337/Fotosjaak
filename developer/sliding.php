<p>sliding</p>
<style>
#blauwdivje
{
	width:250px;
	height:150px;
	background-color:RGBA(0,0,255,0.3);
}
</style>

<script type='text/javascript'>
	$("document").ready(function(){
		//alert("Het werkt!");
		$('form').wrapAll('<div id="blauwdivje" />');
		$("#slideup").click(function(){
			//$("#blauwdivje").slideUp('normal');
			//$("#blauwdivje").slideUp('slow');
			//$("#blauwdivje").slideUp('fast');
			$("#blauwdivje").slideUp(4000);
		});
		
		$("#slidedown").click(function(){
			//$("#blauwdivje").slideDown('normal');
			//$("#blauwdivje").slideDown('slow');
			//blauwdivje").slideDown('fast');
			$("#blauwdivje").slideDown(12000);
		});
		
		$("#slidetoggle").click(function(){
			//$("#blauwdivje").slideToggle('normal');
			//$("#blauwdivje").slideToggle('fast');
			//$("#blauwdivje").slideToggle('slow');
			$("#blauwdivje").slideToggle(600);
		});
		
		 
	});
</script>


<form>
	username: <input type='text'/>
	password: <input type='text'/>
	<input type='submit'/>
</form>

<button id='slideup'>slideup</button>
<button id='slidedown'>slidedown</button>
<button id='slidetoggle'>slidetoggle</button>
<button id='linkdisappear'>link disappear</button>