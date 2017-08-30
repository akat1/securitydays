<?php
	if ( ! isset($_COOKIE['id']) )
	{
		setcookie("id",rand()%0xffff,time()+3600);
	}
	else
	{
		$dbHash = (0xdeadbeef/$_COOKIE['id'])<<2+1;
	}
?>
