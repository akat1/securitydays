<?php

	if ( isset($_POST['passwd']) && isset($_POST['login']) )
	{
		if($_POST['passwd'] == 'root' &&
			$_POST['login'] == 'admin' )
		{
			echo '<h1>BRAWO! Udalo Ci sie!</h1><br>';
			echo 'HASLO: BLUELINES';
		}
		else
		{
			echo 'Nice try!';
		}
	}

?>
