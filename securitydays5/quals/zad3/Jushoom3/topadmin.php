<tr>
<td>
<br>
<?php

	if ( isset($_POST['passwd']) )
	{
		if ( $_POST['passwd'] == "NONEBUTMYOWN" )
		{
			echo '<H1>BRAWO! Uda�o Ci si�!</H1>';
			echo 'Has�o na strone: THEBURNINGRED';
		}
		else
			echo '<center><b>[execve]: /checkPass: BAD</b></center>';
	}
	else
	{
		echo '<form method="POST">';
		echo 'PASSWORD: <input name="passwd" type="password"><br>';
		echo '<input type="submit" value="ENTER"><br>';
		echo '</form>';
	}

?>
</td>
</tr>

