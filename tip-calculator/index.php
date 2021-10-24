<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>tip calculator</title>
		<style>
			form {
				line-height: 2;
			}

			label, inner-column	{
				display: block;
			}

			.error::before {
				content: " ";
			}

			.error {
				color: red;
			}

			.results-title {
				color:  green;
			}


		</style>
	</head>
	<body>
		<?php
		$error = $userMessage = $total = "";
		$userMessage = "you didnt enter anything";
		// regEx for nums only
		$numbersOnly = "/^\d+$/";

		// form variables using null coalescing operator
		$billAmount = $_POST["bill-amount"] ?? null;
		$tip =  $_POST["tip"] ?? null;


		// an easier to read var_dump
		function formatInput($input) {
			echo "<pre>";
			var_dump($input);
			echo "</pre>";
		}

		// escape foreign characters
		function sanitizeInput($input) {
			$input = htmlspecialchars($input);
			$input = trim($input);
			$input = stripslashes($input);
			return $input;
		}

		// check for empty values and. if empty display error message(s)
		if ( in_array("", $_POST) ) {
			$error = "<span class='error'>required</span>";
		} else if ( preg_match_all($numbersOnly, $billAmount) === 0 or preg_match_all($numbersOnly, $tip) === 0) {
				$error = "<span class='error'>numbers only</span>";
		}
		elseif ((int) $billAmount <= 0 or (int) $tip <= 0) {

			$error = "<span class='error'>only enter numbers greater than 0</span>";
		}
		else {
			$total = ( (int) $tip / 100 * (int) $billAmount ) + $billAmount;

			$userMessage = "your tip is $tip % " . "your bill amount is $$billAmount your total is $$total";
		}
		?>

		<main class="exercise-main">
			<section class="tip-calculator">
				<inner-column>
					<h1 class="heading-one">tip calculator</h1>
					<p class="description">this exercise uses PHP and HTML</p>

					<form class="tip-calculator" method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
						<label for="bill-amount">bill amount
							<input type="text" name="bill-amount" id="bill-amount"><?=$error?>
						</label>

						<label for="tip">tip
							<input type="text" name="tip" id="tip"><?=$error?>
						</label>

						<input type="submit" value="submit">
					</form>
				</inner-column>
			</section>

			<section class="results">
				<inner-column>
					<?php if ( !in_array("", $_POST) ): ?>
						<h2 class="results-title">your results are</h2>
						<?=$userMessage?>
					<?php endif; ?>
				</inner-column>
			</section>
		</main>
	</body>
</html>