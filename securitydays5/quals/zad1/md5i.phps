<?php
	/*
	 * MD5 IMPROVED!
	 * md5i designed in Top$ecurity Labs 2007
	 *
	 * Authors:
	 * Marcin Niedoceniany <marcin.niedoceniany@labs.ts.sec>
	 * Niedzielny Koder <niedzielny.coder@labs.ts.sec>
	 * 
	 */

	function md5i_round_one($x)
	{
		$x = str_rot13($x);

		$result = md5(md5($x));

		return $result[2].$result[3].$result[5].$result[7].$result[13].$result[17].$result[19].$result[23].$result[29].$result[31];
	}

	function md5i_round_two($x)
	{
		for ( $i = 0 ; $i < 0xFFFF ; $i++ )
			$x = md5($x);

		return $x;
	}

	function sha1i_round_two($x)
	{
		for ( $i = 0 ; $i < 0xFFFF ; $i++ )
			$x = sha1($x);

		return $x;
	}

	function md5i($x)
	{
		return md5i_round_two(md5i_round_one($x)).sha1i_round_two(md5i_round_one($x));
	}

?>

