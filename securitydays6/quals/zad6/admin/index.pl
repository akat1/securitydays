<?php


if ( isset($_POST['login']) && isset($_POST['password']) )
{
	if ( $_POST['login'] == 'adm' && md5($_POST['password']) == 'fc2deeb0091304fad22f311bc11a92a4' )
	{
		echo("<h1>BRAWO! UDA£O CI SIÊ!</h1><br>");
		echo("<b>Has³o:</b> UNSTABLEELEMENTS");
		die();
	}
	else
		die("0");
}
else
{
	include("perlmotd.txt");
	die("[DEBUG]: Database error 0x2f0e0000");
}

?>
