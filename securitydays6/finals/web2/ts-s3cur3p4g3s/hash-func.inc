<?php
	function hashMe($str) {
		$len = strlen($str);

		$t[0][0][0] = md5("");

		for ($i = 1; $i <= $len; $i++) {
			$t[$i][0][0] = md5(substr($str, $i - 1, 1));
			$t[0][$i][0] = md5(substr($str, $i - 1, 1));
		}

		for ($i = 1; $i <= $len; $i++) {
			for ($j = 1; $j <= $len; $j++) {
				$t[$i][$j][0] = $t[$i - 1][$j][0].$t[$i - 1][$j - 1][0].$t[$i][$j - 1][0];
				$t[$i][$j][0] = md5($t[$i][$j][0]);
			}
		}

		for ($k = 1; $k <= $len; $k++) {
			for ($i = $k; $i <= $len; $i++) {
				for ($j = $k; $j <= $len; $j++) {
					$t[$i][$j][$k] = $t[$i - 1][$j][$k - 1].$t[$i - 1][$j - 1][$k - 1].$t[$i][$j - 1][$k - 1];
					$t[$i][$j][$k] = md5($t[$i][$j][$k]);
				}
			}
		}

		return $t[$len][$len][$len];
	}
?>
