<?php
	$file = "incl/".$_GET['page'].".inc";
	include("incl/setid.inc");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>Wirtualna firma Top$ecurity</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
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
				<a href="?page=ofirmie">O firmie</a> | <a href="?page=oferta">Oferta</a> | <a href="?page=kontakt">Kontakt</a></big>
				</td>
			</tr>
<?php
	if ( file_exists($file) )
		include($file);
	else
		include("incl/ofirmie.inc");
?>
			<tr>
				<td align="center" colspan="3" height="80" valign="bottom">
				<span style="font-size: x-small">
				<br><br><b>SecurityDays 2oo8</b></span><br><a href="http://validator.w3.org/check?uri=referer"><img src="gfx/html401.png" alt="Valid HTML 4.01 Transitional" vspace=3></a>
				</td>
			</tr>
		</table>
<br>
</body>
</html>

<!-- dbhash: <?php echo $dbHash; ?> -->
