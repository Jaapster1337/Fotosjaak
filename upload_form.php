<?php
if (isset($_POST['submit']))
{
	/*var_dump($_FILES['foto']);
	echo "
		de volgende gegevens worden doorgestuurd middels het formulier<br />
		Naam van de foto: ".$_FILES['foto']['name']."<br />
		type foto: ".$_FILES['foto']['type']."<br />
		padnaam tijdelijke opslag: ".$_FILES['foto']['tmp_name']."<br />
		error-nummer: ".$_FILES['foto']['error']."<br />
		bestandsgrootte: ".$_FILES['foto']['size']/(1024)." kB";*/
	
	//zet in dit bestand alle bestandstypen(mime-types) die je als upload wil accepteren	
	$mime_type = array('image/png','image/jpeg','image/pjpeg','image/gif');
	//check of het geuploade bestand een correct mime-type heeft
	if (in_array($_FILES['foto']['type'], $mime_type))
	{ 	//maken van map
		$dir = 'fotos/'.$_POST['user_id']."/".$_POST['order_id']."/";
		//echo $dir; exit();
		if ( !file_exists($dir) )
		{
			mkdir($dir, 0777, true);
			mkdir($dir."thumbnails/",0777, true);
		}
		
		//verplaatsen van geuploade fotos
		if (is_uploaded_file($_FILES['foto']['tmp_name']) )
		{
			move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$_FILES['foto']['name']);
		}
		
		//maken van thumbnail
		define("THUMD_SIZE", 80);
		$path_photo = $dir.$_FILES['foto']['name'];
		$path_thumbnail = $dir."thumbnails/tn_".$_FILES['foto']['name'];
		$specs_image = getimagesize($path_photo);
		$ratio_image = $specs_image[0]/$specs_image[1];
		//als $ratio_image groter is dan 1 is het een landscape foto. kleiner dan 1 = portrait. als het 1 is dan is het een vierkant.
		if ($ratio_image >=1)
		{
			//landscape
			$tn_width = THUMB_SIZE;
			$tn_height = THUMB_SIZE/$ratio_image;
		}
		else
		{
			//protrait
			$tn_height = THUMB_SIZE;
			$tn_width = THUMB_SIZE * $ratio_image;
		}
		
		$thumb = imagecreatetruecolor($tn_width, $tn_height);
		$source = imagecreatefromjpeg($path_photo);
		imagecopyreampled($thumb,
						  $source,
						  0,
						  0,
						  0,
						  0,
						  $tn_width,
						  $tn_height,
						  $specs_image[0],
						  $specs_image[1]);
		imagejpg($thumb, $path_thumbnail, 100);
		
	}
	else
	{
		echo "Het uploaden van het bestand met de extensie: ".$_FILES['foto']['type']." is niet toegestaan.";
		header("refresh:4;url=index.php?content=upload_form&user_id=".$_POST['user_id']."&order_id=".$_POST['order_id']);
	}
}
?>
<form action='' method='post' enctype='multipart/form-data'>
	<table>
		<tr>
			<td>kies een foto</td>
			<td><input type='file' name='foto'/></td>
		</tr>
		<tr>
			<td>beschrijving foto</td>
			<td><textarea cols='50' rows='5' name='beschrijving'></textarea></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='submit' value='verstuur' /></td>
		</tr>	
	</table>
	<input type='hidden' name='user_id' value='<?php echo $_GET["user_id"];?>'/>
	<input type='hidden' name='order_id' value='<?php echo $_GET["order_id"];?>'/>
</form>