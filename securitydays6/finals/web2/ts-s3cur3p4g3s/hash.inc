						<tr>
								<td colspan="3" align="left" style="padding: 5px;">
								<h3>Algorytm haszujący ts-237</h3>
								Tym razem demonstrujemy prototyp naszego najnowszego algorytmu haszującego ts-237. Algorytm jest ciągle w fazie testów, niemniej do końca października planujemy wprowadzić go na rynek. Zaimplementowaliśmy go już w naszych systemach. Jeżeli będziecie mieli Państwo uwagi co do działania algorytmu, to możecie przesyłać je na adres ts237@topsecurity.
								<br><br>
								<form action="index.html?dzial=hash" method="post">
									<input name="str" type="text">
									<input name="hash" type="submit" value="GetHash">
								</form>
								<br>
								</td>
						</tr>
<?php
	include("./ts-s3cur3p4g3s/hash-func.inc");

	error_reporting(E_ALL ^ E_NOTICE);		// for testing
	if (isset($_POST['str'])) {
		$hash = hashMe($_POST['str']);
		echo "<tr><td>Hash: <b>$hash</b></td></tr>";
	}
	error_reporting(0);
?>
