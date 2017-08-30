<?php
	include("./ts-s3cur3p4g3s/hash-func.inc");

	$admin = 0;
	$err = 0;
	if (isset($_POST['user']) and isset($_POST['pass'])) {
		$user = $_POST['user'];
		$pass = hashMe($_POST['pass']);
		if ($user == "marcin.niedoc@topsec" and $pass == "d2b27495226747d1939aba24f591f087") {
			$admin = 1;
		} else {
			$err = 1;
		}

		if ($admin == 1) {
			include("./includ3/admin.php");
		}
	}

	if ($admin == 0) {
		include("./ts-s3cur3p4g3s/form.html");
	}

	if ($err == 1) {
		include("./ts-s3cur3p4g3s/login-err.html");
	}
?>
