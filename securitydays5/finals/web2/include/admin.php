<tr>
<td>
<?php

	if ( ! isset($adminlog) )
		die("passdb/ - directory not found");

	if ( isset($_POST['login']) && isset($_POST['pwd']) )
	{
		if ( $_POST['login'] == "root" && $_POST['pwd'] == "army" )
		{
			echo '<center>';
			echo '<h1>BRAWO! Udalo Ci sie!</h1><br>';
			echo 'Haslo: KNIFEPARTY<br>';
			echo '<br>';
			echo '</center>';
		}
		else
		{
			echo 'Bledne logowanie';
		}
	}
	else
	{
		echo '<center>';
		echo '<form method="POST">';
		echo 'login: <input name="login" type="text"><br>';
		echo 'passw: <input name="pwd" type="password"><br>';
		echo '<input type="submit" value="zaloguj"><br>';
	}

?>
</td>
</tr>

