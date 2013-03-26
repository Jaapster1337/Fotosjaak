<script type='text/javascript'>
	$("document").ready(function(){
		//alert("het werkt!")
		/*$("button").click(function(){
			valueAlt = $("img").attr("alt");
			alert(valueAlt);			
			$("img").attr("alt", "HAMSTER");
			valueAlt = $("img").attr("alt");
			alert(valueAlt);
		});*/
		$("#1").click(function(){
			$("[id=pict1]").attr("src", "./developer/img/rdhamster.jpg")
						   .attr("alt", "dwerghamster");
		});
		
		$("#2").click(function(){
			$("[id=pict1]").attr("src", "./developer/img/kameel.jpg")
						   .attr("alt", "kameel");
		});
		
		/*$("#pict1").mouseover(function(){
			if ($("#pict1").attr("alt")== "kameel")
			{
			 alert("EPIC CAMEL MOUSEOVER");
			}
			else if ($("#pict1").attr("alt")== "dwerghamster")
			{
				alert("EPIC HAMSTER MOUSEOVER");
			}
			
		});*/
		$("#pict1").hover(
			function(){
				$(this).attr("src", "./developer/img/rdhamster.jpg");
			},
			function(){
			$(this).attr({"src": "./developer/img/kameel.jpg",
						  "alt": "ik sta op het plaatje",
						  "width": "500"});
			}
		);
		
	});
</script>

<p>plaatjes en attribuut filters</p>
<img id='pict1' src='./developer/img/kameel.jpg' width='320' height='240'  alt='kameel' />
<button id='1'>show hamster</button>
<button id='2'>show camel</button>