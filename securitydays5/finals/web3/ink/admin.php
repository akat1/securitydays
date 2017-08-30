<tr>
<td>
<?php

	if ( isset($_POST['login']) && isset($_POST['pwd']) ) 
	{
		if ( $_POST['login'] == "root" && $_POST['pwd'] == "kIgHeUfFhuAs" )
		{
			echo '<center>';
			echo '<h1>BRAWO! Udalo Ci sie!</h1><br>';
			echo 'Haslo: 7WORDS<br>';
			echo '<br>';
			echo '</center>';
		}
		else
		{
			echo 'Zly login i/lub haslo!';
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

