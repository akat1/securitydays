<tr>
<td>
<br>
<?php

	if ( $_COOKIE['user'] != '21232f297a57a5a743894a0e4a801fc3' )
	{
		echo ' Permission denied (INVALID USER) ';
	} else {
		if ( isset($_POST['passwd']) )
		{
			if ( $_POST['passwd'] == "computer" )
			{
				echo '<H1>BRAWO! Uda³o Ci siê!</H1>';
				echo 'Has³o na strone: METROPOLIS';
			}
			else
				echo '<center><b>BAD PASSWORD!</b></center>';
		}
		else
		{
			echo '<form method="POST">';
			echo 'PASSWORD: <input name="passwd" type="text"><br>';
			echo '<input type="submit" value="ENTER"><br>';
			echo '</form>';
		}
	}

?>
</td>
</tr>
