						<tr>
								<td colspan="3" align="left" style="padding: 5px;">
								<h3>Generator haseł</h3>
								W celu zaprezentowania Państwu naszych możliwości, udostępniamy darmowe narzędzie, które łączy przyjemne z pożytecznym. Narzędzie służy do generowania silnych haseł, a przy okazji typuje 6 liczb, które - mamy nadzieję - okażą się dla Państwa co najmniej tak samo szczęśliwe jak dla Marcina - naszego kolegi z pracy, który 5 lipca 2008 trafił piątkę!<br><br>
								<form action="index.html?dzial=generator" method="post">
									<input name="gen" type="submit" value="Generuj">
								</form>
								<br>
<?php
	function srandom() {
		global $seed;
		$seed = microtime() * 1000000;
	}

	function random() {
		global $seed;
		$p = 937;
		$seed = abs((($seed + 1) * $p) % 1000000);
		return $seed;
	}

	function genPass() {
		$str = "ABCDEFGHIJKLMNOPQRSTUWVXYZabcdefghijklmnopqrstuvwxyz0123456789";
		$len = strlen($str);
		for ($i = 0; $i < 16; $i++) {
			$n = abs(random() % $len);
			$tmp = $str[$i];
			$str[$i] = $str[$n];
			$str[$n] = $tmp;
		}
		$pass = substr($str, 0, 16);
		return $pass;
	}

	if (isset($_POST['gen'])) {
		srandom();
		$pass = genPass();
		echo "Hasło: <b>$pass</b><br>\n";
		$i = 0;
		echo "Szczęśliwe liczby: <b>";
		while ($i < 6) {
			$num = random() % 49 + 1;
			if (empty($t[$num])) {
				echo $num;
				$t[$num] = 1;
				$i++;
				if ($i < 6) {
					echo ", ";
				}
			}
		}
		echo "</b><br>\n";
	}
?>
								</td>
						</tr>
