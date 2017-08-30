<?php
	
	if ( isset($_POST['login']) && isset($_POST['passwd']) )
	{
		if ( md5($_POST['login']) == '21232f297a57a5a743894a0e4a801fc3' && md5($_POST['passwd']) == '63a9f0ea7bb98050796b649e85481845')
		{
			include('adm.php5');
		}
		else
		{
			echo 'Zly login i/lub haslo';
		}
	}
	else
	{
		echo '<br>';
		echo '<form method="post"><br>';
		echo '<input type="text" name="login"><br>';
		echo '<input type="text" name="passwd"><br>';
		echo '<input type="submit" value="zaloguj"><br>';
		echo '</form>';
		echo '</br>';

	}

?>
