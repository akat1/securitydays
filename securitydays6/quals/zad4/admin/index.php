<?php

	if ( ! isset($_POST['login']) || ! isset($_POST['password']) )
	{
		header("Location: ../");
	}
	
	$userName = "marcin";
	$md5Hash  = "87f75ce3f908a819a9a2c77ffeffcc38";
	
	if ( $_POST['login'] != $userName || md5($_POST['password']) != $md5Hash )
	{
		die('Go away!');
	}
	
	echo "<h1>Brawo uda�o Ci si� pomy�lnie uko�czy�e� zadanie!</h1>";
	echo "<h2><b>Has�o</b>: CHAOSPHERE</h2>";
?>
