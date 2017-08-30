<?php
	function db_connect() {
		$link = mysql_connect("127.0.0.1:3306", "topsecurity", "!QA2ws#ED");
		mysql_select_db("topsecurity");
		mysql_query("SET NAMES 'utf8'");
		return $link;
	}
?>
