<ul>
	<li>
		<a href='index.php?content=homepage'>Home</a>
	</li>
	<?php
		if (isset ($_SESSION['user_role']))
		{	
		
			switch ($_SESSION['user_role'])
			{	
				
				case 'customer':
					echo "<li>
						  <a href='index.php?content=opdarcht'>opdracht plaatsen</a>
						  </li>
						  <li>
						  <a href='index.php?content=faq_eng'>FAQ <img src='./pictures/gbvlag.png' /></a>
						  </li>";
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
				case 'developer':
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