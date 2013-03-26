<?php

require_once("class/UserClass.php");
include("functions/functions.php");
if ( isset($_POST['submit']))
{
	UserClass::ChangeData($_POST);
					
	echo "U wijzigingen zijn verwerkt";

}
if ( isset($_GET['ID']) )
{
	if($_GET['action'] == 'edit')
	{
	
	UserClass::find_users_by_id($_POST);
				
?>
 <h4> <center>Gegevens van <?php UserClass::show_firstname();?></h4></center>


				
					
		<form action='index.php?content=view_registration'method='post'>
		<table id='faq_ned'>
		<?php UserClass::find_users($_POST); ?>
		</table>

		</form>
		
<?php
	}
	
	if ($_GET['action'] == 'drop')
	{	
		UserClass::delete_user($_POST);
		
		header('refresh:0;url=index.php?content=view_registration');
	}
}
else
{
UserClass::find_user_info($_POST);

?>
<h4><center> view registration </center></h4>


<table>

	<tr>
			<th>ID</th>
			<th>Voornaam</th>
			<th>Achternaam</th>
			<th>info</th>
			<th>remove</th>
			
	</tr>
	<?php
	UserClass::options($_POST);
	?>


</table>
<?php
}
?>