<script type='text/javascript'>
	$("document").ready(function(){
		//alert("Het werkt!");
		//$("tr:first").css("background-color", "RGB(220, 220, 220)");
		//$("tr:last").css("background-color", "RGB(220, 220, 220)");
		//$("tr:even").css("background-color", "RGB(220, 220, 220)");
		//$("tr:odd").css("background-color", "RGB(220, 220, 220)");
		//$("tr:eq(4)").css("background-color", "RGB(220, 220, 220)");
		//$("tr:not(tr:eq(2))").css("background-color", "RGB(220, 220, 220)");
		//$("tr:gt(2)").css("background-color", "RGB(220, 220, 220)");
		//$("tr:not(tr:gt(2))").css("background-color", "RGB(220, 220, 220)");
		//$("tr:lt(2)").css("background-color", "RGB(220, 220, 220)");
		//$("tr:nth-child(2n+1)").css("background-color", "RGB(220, 220, 220)");
		
		$("tr").css("background-color", "RGB(220, 220, 220)");
		$("tr").click(function(){
			$(this).css("background-color", "RGB(200, 200, 200)");
		});
		
		$("tr:not(tr:eq(0))").hover(function(){
			$(this).css("background-color", "RGB(200, 200, 200)");
			$(this).css("font-size", "1.2em");
		},
		function(){
			$(this).css("background-color", "RGB(220, 220, 220)");
			$(this).css("font-size", "1em");
		});
	});
</script>
<table>
	<tr>
		<th>id</th>
		<th>voornaam</th>
		<th>tussenvoegsel</th>
		<th>achternaam</th>
	</tr>
	<tr>
		<td>1</td>
		<td>Arjan</td>
		<td>de</td>
		<td>Ruijter</td>	
	</tr>
	<tr>
		<td>2</td>
		<td>Bert</td>
		<td>de</td>
		<td>Vries</td>	
	</tr>
	<tr>
		<td>3</td>
		<td>Johan</td>
		<td>de</td>
		<td>Bree</td>	
	</tr>
	<tr>
		<td>4</td>
		<td>Kees</td>
		<td>de</td>
		<td>Jong</td>	
	</tr>
</table>