<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>TopSecurity - Kontakt</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
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
				<td width="58%" style="padding: 5px;">
				<center>
					<h2>Kontakt</h2>
					<?php 
						if ( isset($_POST['do']) &&
						     isset($_POST['reply']) &&
						     isset($_POST['temat']) &&
						     isset($_POST['wiadomosc'])
						    )
						{
							echo '<b>replyId: '.md5(rand()).'</b> - proszę przechować tę wartość, przyda się w razie problemów z dostarczeniem wiadomości<br><br>';
						}
					?>
					<form method='post'>
					<table>
						Do:<select name='do'>
							<option  value='1'>Kontakt - prezes</option>
							<option  value='2'>Kontakt - administrator</option>
							<option  value='3'>Kontakt - ksiegowosc</option>
							<option  value='4'>Kontakt - helpdesk</option>
						</select><br>
					Twój adres: <input type='text' name='reply' value=''><br>
					Temat:<input type='text' name='temat' value=''><br>
					Treść:<textarea name='wiadomosc'></textarea><br>
					<input type='submit' value='Wyślij'>
				</center>
				</td>
			</tr>
</table>
</form>


				</center>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="3" height="80" valign="bottom">
				<span style="font-size: x-small">
				<br>&copy; SecurityDays crew 2oo8</span><br><a href="http://validator.w3.org/check?uri=referer"><img src="gfx/html401.png" alt="Valid HTML 4.01 Transitional" vspace=3></a>
				</td>
			</tr>
		</table>
<br>
</body>
</html>
