<?php error_reporting(0); ?>

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
				<a href="?file=ofirmie">O firmie</a> | <a href="?file=oferta">Oferta</a> | <a href="?file=praca">Praca</a> | <a href="?file=kontakt">Kontakt</a></big>
				</td>
			</tr>
<?php

	switch($_GET['file'])
	{
		case 'ofirmie':
			readfile('include/ofirmie.php');
			break;
		case 'kontakt':
			readfile('include/kontakt.php');
			break;
		case 'praca':
			readfile('include/praca.php');
			break;
		case 'oferta':
			readfile('include/oferta.php');
			break;
		case 'admin':
			$adminlog = 4;
			include('include/admin.php');
			break;
		default:
			readfile('include/oferta.php');
			break;
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
