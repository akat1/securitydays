<?php
	
	/* TopSecurity - Unhackable technologies!  */
	/* M.Niedoceniany - m.niedoceniany@ts.labs */
	/* (c) by TopSecurity                 2oo8 */

	include("admin/admin.php");


	/* debug? */

	if ( $_GET['debug'] )
	{
		$del = abs((abs($_GET['del'])%0x7ffffff0)) + 1;
		$ins = abs((abs($_GET['inc'])%0x7ffffff0)) + 1;
	}
	else
	{
		$del = 1;
		$ins = 1;
	}

	/* auth stuff */

	if ( isset($_POST['login']) && isset($_POST['password']) )
	{

		echo '<tr><td>';

		if ( $_GET['debug'] )
		{
			echo '<!-- ';
			echo levenshtein($adminPass, $_POST['login'] . $_POST['password'], $ins, 1, $del);
			echo '-->';
		}

		if ( levenshtein($adminPass, $_POST['login'] . $_POST['password'], $ins, 1, $del) == 0 )
			adminArea();
		else
			echo 'Nieprawid³owy login i/lub has³o!';
		echo '</td></tr>';
	}
	else
	{
		include("incl/loginForm.inc");
	}

?>
