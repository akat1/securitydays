<tr>
<td>
<br>
<?php

	/* trusterix */

	function getTime()
	{
		return (time()>>4)&0x0FFFFFFF;
	}

	function getHash($a)
	{
		$a = ($a + 0xdeadbeef) + ($a<<12);
		$a = ($a ^ 0xbadc0ded) ^ (($a>>19)&0x1FFF);
		$a = ($a + 0xbabebabe) + ($a<<5);
		$a = ($a + 0xdeaddead) ^ ($a<<9);
		$a = ($a + 0xfeedbabe) + ($a<<3);
		$a = ($a ^ 0xbada5569) ^ (($a>>16)&0xFFFF);

		return $a;
	}

	if ( !isset($trusterix) )
	{
		echo("Trusetrix 0.1b by Top\$ecurity\n");
		echo("ERROR 6: trusterix/config.dat - no such file\n");
		die("ERROR 21: ROOT DIR IS NOT SET");
	}
	
	if ( isset($_POST['login']) && isset($_POST['password']) )
	{
		$login = $_POST['login'];
		$password = $_POST['password'];
	}
			

	if ( isset($login) && isset($password) )
	{
		if ( $login == 'admin' and strtolower($password) == dechex(getHash(getTime())) )
		{
			echo '<H1>BRAWO! Uda³o Ci siê!</H1>';
			echo '<b>Has³o</b>: RESISTANCE';
		}
		else
		{
			if ( $login == 'admin' )
				echo 'Z³e has³o!';
			else
				echo 'Z³y login i has³o!';
		}
	}
	else
	{
		echo '<form method="POST">';
		echo 'Login: <input type="text" name="login"><br>';
		echo 'TrustixClock: <input type="password" name="password"><br>';
		echo '<input type="submit" value="LOGIN">';
		echo '<hr>';
		echo 'System oparty o autorsk± platformê Top$ecurity TRUSTERIX';
	}

?>
</td>
</tr>

