<meta charset="utf-8">
<title>sortable demo</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
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
						  <a href='index.php?content=opdracht'>opdracht plaatsen</a>
						  </li>
						  <li>
						  <a href='index.php?content=opdrachten_customer'>geplaatse opdrachten</a>
						  </li>
						  <li>
						  <a href='index.php?content=updateregistration'>gegevens wijzigen</a>
						  </li>";
					break;
				case 'sjaak':
						echo "<li>
						  <a href='index.php?content=opdrachten'>opdrachten</a>
						  </li>
						  <li>
						  <a href='index.php?content=customerdata'>klantgegevens</a>
						  </li>";
				
					break;
					
				case 'root':
						echo"<li>
						  <a href=''></a>
						  </li>";
					
					break;
				case 'developer':
						echo"
						<ul id='sortable'>
					      <li>
						  <a href='index.php?content=developer/selectors'>selectors</a>
						  </li>
						  <li>
						  <a href='index.php?content=developer/filters'>filters</a>
						  </li>
						  <li>
						  <a href='index.php?content=developer/image-attrib'>image attributes</a>
						  </li>
						  <li>
							<a href='index.php?content=developer/inserting'>inserting</a>
						  </li>
						  <li>
							<a href='index.php?content=developer/addclass'>addclass</a>
						  </li>
						  <li>
							<a href='index.php?content=developer/show-hide-selection'>show-hide-selection</a>
						  </li>
						  <li>
							<a href='index.php?content=developer/fading'>fading</a>					  
						  </li>
						  <li>
						  <a href='index.php?content=developer/sliding'>sliding</a>
						  </li>
						  <li>
						  <a href='index.php?content=developer/image_rotator'>rotator</a>
						  </li>
						  <li>
						  <a href='index.php?content=developer/animate'>animation</a>
						  </li>
						  <li>
						  <a href='index.php?content=developer/datepicker'>datepicker</a>
						  </li>
						   <li>
						  <a href='index.php?content=developer/draggable'>draggable</a>
						  </li>
						   <li>
						  <a href='index.php?content=developer/droppable'>droppable</a>
						  </li>
						  <li>
						  <a href='index.php?content=developer/resizable'>resizable</a>
						  </li>
						  <li>
						  <a href='index.php?content=developer/selectable'>selectable</a>
						  </li>
						  <li>
						  <a href='index.php?content=developer/sortable'>sortable</a>
						  </li>
						  <li>
						  <a href='index.php?content=developer/progressbar'>progressbar</a>
						  </li>
						  <li>
						  <a href='index.php?content=developer/removeclass'>removeclass</a>
						  </li>
						  <li>
						  <a href='index.php?content=developer/tabs'>tabs</a>
						  </li>
						  <li>
						  <a href='index.php?content=developer/accordion'>accordion</a>
						  </li>
						  <li>
						  <a href='index.php?content=developer/dialog'>dialog</a>
						  </li>
						</ul>";				
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
	<script>$("ul").sortable();</script>
</ul>