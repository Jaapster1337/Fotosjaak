<?php
	function safetext( $text='')
	{
		$text = trim($text);
		if ( get_magic_quotes_gpc() )
		{
			
		}
		else
		{
		  $text = addslashes($text);
		}
		return $text;
	}

?>