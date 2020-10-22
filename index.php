<?php
$B = 90;
function sqrtSimpl($num) {
  $outside = 1;
  $inside = $num;
  $d = 2;

  while ($d * $d <= $inside) {
  	if ($inside % ($d * $d) == 0) {
  		$inside = $inside / ($d * $d);
  		$outside = $outside * $d;
  		
  		$out['b'] = $inside;
  		$out['a'] = $outside;

  	} else {
  		$d = $d + 1;
  		$out['c'] = "√" . $inside;
  	}
  }

  return $out;
}

if (isset($_POST)) {
	if ($_POST['skaic'] == "Krast") {
		if ($_POST['AB'] != 0 && $_POST['BC'] != 0) {
			$AC = $_POST['AB'] * $_POST['AB'] + $_POST['BC'] * $_POST['BC'];
			$simpledAC = sqrtSimpl($AC);

			if (isset($simpledAC['a'])) {
				$AC = $simpledAC['a'] . "√" . $simpledAC['b'];
			} elseif (isset($simpledAC['c'])) {
				$AC = $simpledAC['c'];
			} else {
				$AC = "error";
			}

		}

		if ($_POST['AC'] != 0 && $_POST['AB'] != 0) {
			$BC = $_POST['AC'] * $_POST['AC'] - $_POST['AB'] * $_POST['AB'];
			$simpledBC = sqrtSimpl($BC);
			if (isset($simpledBC['a'])) {
				$BC = $simpledBC['a'] . "√" . $simpledBC['b'];
			} elseif (isset($simpledBC['c'])) {
				$BC = $simpledBC['c'];
			} else {
				$BC = "error";
			}

		}

		if ($_POST['AC'] != 0 && $_POST['BC'] != 0) {
			$AB = $_POST['AC'] * $_POST['AC'] - $_POST['BC'] * $_POST['BC'];
			$simpledAB = sqrtSimpl($AB);
			if (isset($simpledAB['a'])) {
				$AB = $simpledAB['a'] . "√" . $simpledAB['b'];
			} elseif (isset($simpledAB['c'])) {
				$AB = $simpledAB['c'];
			} else {
				$AB = "error";
			}

		}

		if ($_POST['A'] != 0 && $_POST['AC'] != 0) {
			$BC = round($_POST['AC'] * sin(deg2rad($_POST['A'])), 2);
			$AB = round($_POST['AC'] * cos(deg2rad($_POST['A'])), 2);
		}


		if ($_POST['A'] != 0 && $_POST['AB'] != 0) {
			$BC = round($_POST['AB'] * tan(deg2rad($_POST['A'])), 2);
		}

		if ($_POST['A'] != 0 && $_POST['BC'] != 0) {
			$AB = round($_POST['BC'] * tan(deg2rad($_POST['A'])), 2);
		}

		if ($_POST['C'] != 0 && $_POST['AC'] != 0) {
			$AB = round($_POST['AC'] * sin(deg2rad($_POST['C'])), 2);
			$BC = round($_POST['AC'] * cos(deg2rad($_POST['C'])), 2);
		}

		if ($_POST['C'] != 0 && $_POST['BC'] != 0) {
			$AB = round($_POST['BC'] * tan(deg2rad($_POST['C'])), 2);
		}

		if ($_POST['C'] != 0 && $_POST['AB'] != 0) {
			$BC = round($_POST['AB'] * tan(deg2rad($_POST['C'])), 2);
		}

	} elseif ($_POST['skaic'] == "Kamp") {
		if ($_POST['AB'] != 0 && $_POST['BC'] != 0) {

			$A = $_POST['BC'] / $_POST['AB'];
			$A = round(atan($A) * (180 / pi()));

			$C = $_POST['AB'] / $_POST['BC'];
			$C = round(atan($C) * (180 / pi()));
		}

		if ($_POST['AB'] != 0 && $_POST['AC'] != 0) {

			$C = $_POST['AB'] / $_POST['AC'];
			$C = round(asin($C) * (180 / pi()));

			$A = $_POST['AB'] / $_POST['AC'];
			$A = round(acos($A) * (180 / pi()));
		}

		if ($_POST['BC'] != 0 && $_POST['AC'] != 0) {

			$A = $_POST['BC'] / $_POST['AC'];
			$A = round(asin($A) * (180 / pi()));

			$C = $_POST['BC'] / $_POST['AC'];
			$C = round(acos($C) * (180 / pi()));
		}
	} else {
		print("Klaida");
	}

}

?>
<html>
<head>
	<title>Sin,cos,tan calculator</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<img src="triangle.png" style="height: 300px; width: 300px;"> <br>
	<div id="main">
		<form method="POST" action="index.php">

			<label for="skaic">Ką apskaičiuoti:</label>

			<select id="skaic" name="skaic">
		  		<option value="Krast">Kraštines</option>
		  		<option value="Kamp">Kampus</option>
			</select> <br> <br>

			∠A = <input type="text" name="A"> <br>
			∠B = 90° <br>
			∠C = <input type="text" name="C"> <br> <br>

			AB = <input type="text" name="AB"> <br>
			BC = <input type="text" name="BC"> <br>
			AC = <input type="text" name="AC" value="<?php #echo $AC; ?>"> <br> <br>

			<input type="submit" name="Skaičiuoti" value="Skaičiuoti">
		</form>

		<p id="sprend" name="sprend" value="1" rows="10" cols="50">
			Sprendimas: <br>
			<?php 
			if ($_POST['skaic'] == "Krast") {

				if ($_POST['AB'] != 0 && $_POST['BC'] != 0) {

					echo "AC² = " . $_POST['AB'] . "² + " . $_POST['BC'] . "² <br>";
					echo "AC² = " . $_POST['AB'] * $_POST['AB'] . " + " . $_POST['BC'] * $_POST['BC'] . "<br>";
					echo "AC = " . $AC . "<br>";
				}

				if ($_POST['AC'] != 0 && $_POST['AB'] != 0) {

					echo "BC² = " . $_POST['AC'] . "² - " . $_POST['AB'] . "² <br>";
					echo "BC² = " . $_POST['AC'] * $_POST['AC'] . " - " . $_POST['AB'] * $_POST['AB'] . "<br>";
					echo "BC = " . $BC . "<br>";
				}

				if ($_POST['AC'] != 0 && $_POST['BC'] != 0) {

					echo "AB² = " . $_POST['AC'] . "² - " . $_POST['BC'] . "² <br>";
					echo "AB² = " . $_POST['AC'] * $_POST['AC'] . " - " . $_POST['BC'] * $_POST['BC'] . "<br>";
					echo "AB = " . $AB . "<br>";
				}

				if ($_POST['A'] != 0 && $_POST['AC'] != 0) {

					echo "BC = AC * sin" . $_POST['AC'] . "° <br>";
					echo "BC = " . $_POST['AC'] . " * " . round(sin(deg2rad($_POST['A'])), 3) . "<br>";
					echo "BC = " . $BC . "<br>";

					echo "AB = AC * cos" . $_POST['A'] . "°";
					echo "AB = " . $_POST['AC'] . " * " . round(cos(deg2rad($_POST['A'])), 3) . "<br>";
					echo "AB = " . $AB . "<br>";
				}

				if ($_POST['A'] != 0 && $_POST['AB'] != 0) {

					echo "BC = AB * tan" . $_POST['A'] . "°";
					echo "BC = " . $_POST['AB'] . " * " . round(tan(deg2rad($_POST['A'])), 3) . "<br>";
					echo "BC = " . $BC . "<br>";
				}

				if ($_POST['A'] != 0 && $_POST['BC'] != 0) {

					echo "AB = BC * tan" . $_POST['A'] . "° <br>";
					echo "AB = " . $_POST['BC'] . " * " . round(tan(deg2rad($_POST['A'])), 3) . "<br>";
					echo "AB = " . $AB . "<br>";
				}

				if ($_POST['C'] != 0 && $_POST['AC'] != 0) {

					echo "AB = AC * sin" . $_POST['C'] . "° <br>";
					echo "AB = " . $_POST['AC'] . " * " . round(sin(deg2rad($_POST['C'])), 3) . "<br>";
					echo "AB = " . $AB . "<br>";

					echo "BC = AC * cos" . $_POST['C'] . "° <br>";
					echo "BC = " . $_POST['AC'] . " * " . round(cos(deg2rad($_POST['C'])), 3) . "<br>";
					echo "BC = " . $BC . "<br>";
				}

				if ($_POST['C'] != 0 && $_POST['BC'] != 0) {

					echo "AB = BC * tg" . $_POST['C'] . "° <br>";
					echo "AB = " . $_POST['BC'] . " * " . round(tan(deg2rad($_POST['C'])), 3) . "<br>";
					echo "AB = " . $AB . "<br>";
				}

				if ($_POST['C'] != 0 && $_POST['AB'] != 0) {

					echo "BC = AB * tg" . $_POST['C'] . "° <br>";
					echo "BC = " . $_POST['AB'] . " * " . round(tan(deg2rad($_POST['C'])), 3) . "<br>";
					echo "BC = " . $BC . "<br>";
				}

			} elseif ($_POST['skaic'] == "Kamp") {
				if ($_POST['AB'] != 0 && $_POST['BC'] != 0) {

					echo "∠A = tg(" . $_POST['BC'] . " / " . $_POST['AB'] . ")<br>";
					echo "∠A = " . $A . "° <br>";

					echo "∠C = tg(" . $_POST['AB'] . " / " . $_POST['BC'] . ")<br>";
					echo "∠C = " . $C . "° <br>";
				}

				if ($_POST['AB'] != 0 && $_POST['AC'] != 0) {

					echo "∠C = sin(" . $_POST['AB'] . " / " . $_POST['AC'] . ")<br>";
					echo "∠C = " . $C . "° <br>";

					echo "∠A = cos(" . $_POST['AB'] . " / " . $_POST['AC'] . ")<br>";
					echo "∠A = " . $A . "° <br>";
				}
				if ($_POST['BC'] != 0 && $_POST['AC'] != 0) {

					echo "∠A = sin(" . $_POST['BC'] . " / " . $_POST['AC'] . ")<br>";
					echo "∠A = " . $A . "° <br>";

					echo "∠C = cos(" . $_POST['BC'] . " / " . $_POST['AC'] . ")<br>";
					echo "∠C = " . $C . "° <br>";
				}
			}
			?>
		</p>
	</div>
</body>
</html>