<ul>
	<li>
		<a href='index.php?content=homepage'>Home</a>
	</li>
	<?php
		if (isset ($_SESSION['Gebruikersrol']))
		{	
		
			switch ($_SESSION['Gebruikersrol'])
			{	
				
				case 'customer':
					echo "<li>
						  <a href='index.php?content=faq_nl'>FAQ <img src='./pictures/nlvlag.jpg' /></a>
						  </li>
						  <li>
						  <a href='index.php?content=faq_eng'>FAQ <img src='./pictures/gbvlag.png' /></a>
						  </li>
";
					break;
				case 'sjaak':
						echo "<li>
						  <a href=''></a>
						  </li>";
				
					break;
					
				case 'root':
						echo"<li>
						  <a href=''></a>
						  </li>";
					
					break;
				default:
					break;
			}
			echo "<li><a href='index.php?content=logout'>Uitloggen</a></li>";
		}
		else
		{
			echo"<li>
					<a href='index.php?content=register'>Registreren!</a>
				 </li>
				<li>
					<a href='index.php?content=login'>inloggen</a>
				</li>";
		}
	

	?>
</ul>