<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Wirtualna firma Top$ecurity</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<style type="text/css">
<!--
.style1 {font-size: small}
.style2 {color: #FF0000}
A:link          { COLOR: gray; TEXT-DECORATION: none; }
A:visited       { COLOR: gray; TEXT-DECORATION: none; }
A:active        { COLOR: black; TEXT-DECORATION: none; }
A:hover         { color: black; TEXT-DECORATION: none;}
-->
</style>
</head>
<body style="padding: 0px; margin: 0px; background: #ffffff; font-family: verdana,times; font-size: small">
		<table style="border-color: #000000; border-style:solid; border-width:1px; width:750px; background-image: url('gfx/tlo.jpg')" cellspacing="0" cellpadding="0" align="center">
			<tr>
				<td style="background-image: url('gfx/topsecurity1.jpg'); padding: 5px" height="223" align="center" valign="top" colspan="3">
				<span class=style1><span class=style2>
				Top$ecurity S.A.</span>, ul. Leśna 6/666, 69-997 Bezpiecznowo, tel. 0700-69-6969
				</span>
				</td>
			</tr>
			<tr>
				<td style="padding-left: 20px; background-image: url('gfx/topsecurity2.jpg');" height="41" align="left" valign="middle" colspan="3"><big>
				<a href="?id=c2l0ZTow">O firmie</a> | <a href="?id=c2l0ZToz">Oferta</a> | <a href="?id=c2l0ZToy">Praca</a> | <a href="?id=c2l0ZTox">Kontakt</a></big>
				</td>
			</tr>
<?php

	if ( isset($_GET['id']) )
	{

		$_GET['id'] = stripslashes(base64_decode($_GET['id']));
		if ( strstr($_GET['id'],'(') || strstr($_GET['id'],')') )
			die ('nice try!');
		$db = mysql_connect('localhost','zad3','sekjuriti');
		mysql_select_db('zad3'); 
		$res = mysql_query("SELECT id,id,id,id,id,id,id,id,id,id,id,id,header FROM strony WHERE id='".$_GET['id']."'");

		if ( $res )
		{
			$r = mysql_fetch_row($res); 
			echo "<tr><td><center><h1> $r[12] </h1></center></td></tr>";
		}
		else
		{
			echo "<tr><td><center><h1> ERROR </h1></center></td></tr>";
		}

		switch($_GET['id'])
		{
			case 'site:0':
				readfile('ink/ofirmie.php');
				break;
			case 'site:1':
				readfile('ink/kontakt.php');
				break;
			case 'site:2':
				readfile('ink/praca.php');
				break;
			case 'site:3':
				readfile('ink/oferta.php');
				break;
			case 'admin':
				include('ink/admin.php');
				break;
			default:
				readfile('ink/404.php');
				break;
		}
	}
	else
	{
		readfile('ink/ofirmie.php');
	}
?>
			<tr>
				<td align="center" colspan="3" height="80" valign="bottom">
				<span style="font-size: x-small">
				<br><br>
				&copy; by <a href="http://securitydays.pl">SecurityDays Crew</a> 2004-2007
				</td>
			</tr>
		</table>
<br>
</body>
</html>
