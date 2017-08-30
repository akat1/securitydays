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
				<td align="center">
				    <br>
				    <font size="4" color="red">md5 improved challenge</font>
				    <br>
				    <?php include('md5i.php'); ?>
				    <?php
				    	if ( isset($_POST['testa']) && isset($_POST['testb']) )
					{
						if ( $_POST['testa'] == $_POST['testb'] )
						{
							echo '<b>Błąd! Wprowadzone ciągi są identyczne.</b>';
						}
						else
						{
							if ( md5i($_POST['testa']) == md5i($_POST['testb']) )
							{
								echo '<h1>BRAWO! Udało Ci się!</h1>';
								echo 'Hasło na strone: <b>THEGREATBELOW</b>';
							}
							else
							{
								echo '<b>Błąd!</b><br>';
								echo 'hash1: '.md5i($_POST['testa']).'<br>';
								echo 'hash2: '.md5i($_POST['testb']).'<br>';
							}
						}
					}
					else
					{
						echo '<br>';
						echo 'Nasi developerzy stworzyli najlepszy <a href="md5i.phps"><b>algorytm</b></a>!!!<br>';
						echo 'Jeżeli chcesz udowodnić nam, że się mylimy weź udział w zabawie.<br>';
						echo '<b>CEL</b>: Znajdź dwa różne ciągi, dla których hashe będą identyczne.<br>';
						echo '<br>';
						echo '<br>';
						echo '<form method="POST">';
						echo 'Arg1: <input name="testa" type="text"><br>';
						echo 'Arg2: <input name="testb" type="text"><br><br>';
						echo '<input type="submit" value="CHECK">';
						echo '</form>';
					}
				    ?>
				</td>
			</tr>
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
