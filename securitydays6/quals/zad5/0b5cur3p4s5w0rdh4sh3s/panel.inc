<?php
	if (isset($_GET['logout'])) {
		unset($_SESSION['user']);
	}

	include("./0b5cur3p4s5w0rdh4sh3s/hash.inc");

	if (empty($_SESSION['user'])) {
		$zalogowany = 0;
		$err = 0;
		if (isset($_POST['user']) and isset($_POST['pass'])) {
			$user = $_POST['user'];
			$pass = hashMe($_POST['pass']);
			if ($user == "admin" and $pass == "e321429979a23a27") {
				$zalogowany = 1;
			} else if ($user == "marcin" and $pass == "e48b4e9e650adde0") {
				$zalogowany = 1;
			} else if ($user == "monika" and $pass == "e4b1f3916e50c73f") {
				$zalogowany = 1;
			} else {
				$err = 1;
			}
			if ($zalogowany == 1) {
				$_SESSION['user'] = $_POST['user'];
			}
		}

		if ($zalogowany == 0) {
			include("./0b5cur3p4s5w0rdh4sh3s/form.html");
		}

		if ($err == 1) {
			include("./0b5cur3p4s5w0rdh4sh3s/login-err.html");
		}
	}

	if (isset($_SESSION['user'])) {
		if ($_SESSION['user'] == 'admin') {
			include("./includ3/admin.php");
		} else {
			error_reporting(E_ALL);		// for debug reasons
			include("./0b5cur3p4s5w0rdh4sh3s/nowy-produkt.inc");
			if (isset($_POST['hash'])) {
				$hash = hashMe($_POST['str']);
				echo "<tr><td>Hash: <b>$hash</b></td></tr>";
			}
			error_reporting(0);
		}
	}
?>
