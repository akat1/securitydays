<?php
	function getValue($str) {
		$len = strlen($str);

		// hashing
		for ($i = 0; $i < $len; $i++) {
			for ($j = 0; $j < $len; $j++) {
				for ($k = 0; $k < $len; $k++) {
					$d1[$i][$j][$k] = ord($str[$i]) * ord($str[$j]) * ord($str[$k]);
				}
			}
		}

		// redukcja 1
		for ($i = 0; $i < $len; $i++) {
			for ($j = 0; $j < $len; $j++) {
				$d2[$i][$j] = 0;
				for ($k = 0; $k < $len; $k++) {
					$d2[$i][$j] += $d1[$i][$j][$k];
				}
			}
		}

		// redukcja 2
		for ($i = 0; $i < $len; $i++) {
			$d3[$i] = 0;
			for ($j = 0; $j < $len; $j++) {
				$d3[$i] += $d2[$i][$j];
			}
		}

		// redukcja 3
		$d4 = 0;
		for ($i = 0; $i < $len; $i++) {
			$d4 += $d3[$i];
		}

		return $d4;
	}

	function hashMe($str) {
		$len = strlen($str);

		if ($len > 64) {
			return "Not Supported";
		}

		$a = 0xF7D8C391;
		$b = 0x8C4D9A26;
		for ($i = 0, $j = 0; $i < $len; $i += 8, $j++) {
			$s = substr($str, $i, 8);
			$val = getValue($s);
			if ($j % 2) {
				$b ^= $val;
			} else {
				$a ^= $val;
			}
		}

		$b ^= $a;

		$s = sprintf("%08x%08x", $a, $b);

		return $s;
	}
?>
