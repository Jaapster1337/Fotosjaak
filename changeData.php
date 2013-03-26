<?php
 require_once("class/UserClass.php");
 include("./functions/function.php");

	if ( isset($_POST['submit']))
		{
			UserClass::ChangeData($_POST);
			echo "U wijzigingen zijn verwerkt";
		}
		else
		{

		?>

<form action='index.php?content=changedata' method='post'>
	<table>
		<tr>
			<th> you can change your settings here </th>
		</tr>
<?php echo UserClass::find_users($_POST); ?>
	</table>
</form>

<?php
 }
?>