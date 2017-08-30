<?php ini_set('display_errors', 0); ?>
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
				<a href="?dzial=V1dwS1lXTkhUblJOV0VKaFZWUXdPVU5uUFQwSwo">O firmie</a> | <a href="?dzial=V1dwS1lXSkhUblZWYldkTENnPT0K">Oferta</a> | <a href="?dzial=V1ZSSk5XUlhVa2hTYmtwclVWUXdPVU5uUFQwSwo">Kontakt</a></big>
				</td>
			</tr>
<?php
if (isset($_GET['dzial']))
{
	$dzial = base64_decode(base64_decode(base64_decode(base64_decode($_GET['dzial']))));
}
else
{
	$dzial="";
}

switch($dzial)
{
	case "":
	case "ofirmie":
	{
?>
			<tr>
				<td width="58%" style="padding: 5px;">
				<h2>O firmie</h2>
				<p align="justify"><b>Top$ecurity</b> jest jedną z wiodących firm świadczących profesjonalne usługi w branży finansowej oraz wskazuje firmom możliwości rozwoju i pomaga im je wykorzystywać. Kilkuletnie doświadczenie pozwala nam zaoferować usługi idealnie spełniające potrzeby naszych Klientów, dzięki szybkiej i fachowej obsłudze. Nasze kompetencje dotychczas doceniło wiele firm z różnych branż.<br> Wychodząc naprzeciw oczekiwaniom Klientów świadczymy m.in. następujące usługi:<br>
				<ul>
					<li> doradztwo finansowe,
					<li> doradztwo podatkowe,
					<li> doradztwo europejskie.
				</ul>
				</td>
				<td width="4%">
				&nbsp;
				</td>
				<td width="38%" style="padding: 5px;">
				<big><b>MISJA:</b></big><br><br>
				<big>Oferowanie wysokiej jakości usług, zrozumienie potrzeb Klienta oraz wskazywanie firmom możliwości rozwoju</big><br><br><p align="justify">Zgodnie z misją firmy, współpracując z naszymi Klientami staramy się dążyć do uzyskania przez naszych Klientów przewagi nad konkurencją zarówno na rynku krajowym, jak i międzynarodowym. Naszym zadaniem jest również przygotować powierzone nam firmy do zmieniających się realiów na rynku. <br><br>
				</td>
			</tr>
			<tr>
				<td valign="middle" style="padding: 5px;">
				<big><b>CEL:</b></big><br><p align="justify">Wizja rzetelnej i profesjonalnej firmy zapewniającej kompleksową obsługę wszelkich potrzeb w zakresie usług finansowych realizowana jest przez nas w praktycznym działaniu. Celem nadrzędnym jest pomóc naszym Klientom w uzyskaniu strategicznej przewagi nad konkurencją. Chcemy dostarczać innowacyjnych, a zarazem praktycznych rozwiązań: od pomysłu poprzez realizację, aż po ocenę jego efektywności.<br><br>
				</td>
				<td>
				</td>
				<td style="padding: 5px;">
				Nasze zyski:<br><br><img src="gfx/wykres.jpg" alt="wykres" border=1 style="border-color: black">
				</td>
			</tr>
<?php
	break;
	}
	case "oferta":
	{
?>
			<tr>
				<td colspan="3" height="30">
				&nbsp;
				</td>
			</tr>
			<tr>
				<td width="36%" style="padding: 5px;" align="center">
				<b>Doradztwo finansowe</b><br>
				Działalność instytucji finansowych podlega szczególnym zasadom opodatkowania. W zakresie aspektów rozwiązań finansowych doradzamy również instytucjom niefinansowym. Pomagamy rozwiązywać kwestie podatkowe związane z pozyskiwaniem finansowania.
				</td>
				<td width="36%" style="padding: 5px;" align="center">
				<b>Doradztwo podatkowe:</b><br>Top$ecurity proponuje wszechstronne doradztwo podatkowe zarówno w przypadku dużych transakcji międzynarodowych, jak i doradztwo w zakresie podatków osobistych.
				</td>
				<td width="28%" style="padding: 5px;" align="center">
				<b>Doradztwo Europejskie:</b><br>Dążąc do jak najlepszego przygotowania przedsiębiorstwa do zmian wynikających z integracji Polski z UE.
				</td>
			</tr>
<?php
	break;
	}
	case "kontakt":
	{
?>
			<tr>
				<td colspan="3" align="center">
				<h2>Organizacja firmy</h2><br><br><img src="gfx/schemat.gif" alt=""  border=1 style="border-color: black"><br><br><big>KONTAKT:</big><br><br>
				Dyrektor: <b>Jan Nieomylny</b><br>
				z-ca dyr. Dział marketingu: <b>Adam Propaganda</b><br>
				z-ca dyr. Dział audytu i doradztwa: <b>Marian Pomocny</b><br>
				Główna księgowy: <b>Maria Hojna</b><br>
				Główny Informatyk: <b>Marcin Niedoceniany</b><br>
				Kierownik Biura Administracji: <b>Anna Porządnicka</b><br>
				Kierownik Biura Prawnego<b>: Zuza Przebiegła</b><br>
				Email: <a href="mailto:biuro@securitydays.pl">biuro@securitydays.pl</a>
				</td>
			</tr>
<?php
	break;
	}

	case "administrator":
	case "adm":
	case "admin":
	{
?>
			<tr>
				<td colspan="3" align="center">
				<h2>Admin area</h2><br>
				<font color="red"><b>WARNING!</b></font><br>
				<img src="admin/sys/gfx/stop.jpg"><br>
				<b>Restricted area. All activity is logged.</b><br>
				<br>
				<br>
				<form action="admin/?action=login" method="POST">
					login: <input name="login" type="text"><br>
					password: <input name="password" type="password"><br>
					<input type="submit" value="zaloguj">
				</form>
				</td>
			</tr>
<?php
	break;
	}
	default:
	{
	echo "
			<tr>
				<td colspan=\"3\" align=\"center\">
				<br><font color=red><b>Nie ma takiego działu!</b></font><br>
				</td>
			</tr>
";
	}
}
?>
			<tr>
				<td align="center" colspan="3" height="80" valign="bottom">
				<span style="font-size: x-small">
				<br><br><b>&copy; by SecurityDays crew 2oo8<br><a href="http://validator.w3.org/check?uri=referer"><img src="gfx/html401.png" alt="Valid HTML 4.01 Transitional" vspace=3></a>
				</td>
			</tr>
		</table>
<br>
</body>
</html>
