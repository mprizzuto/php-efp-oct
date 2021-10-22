<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>validating input</title>
		<meta name="description" content="exercises for programmers using PHP and HTML 5">
		<style>
			label {
				display: block;
			}

			form {
				line-height: 2;
			}

			.error {
				color: red;
			}

			.error::before {
				content:  " ";
			}



		</style>
	</head>
	<body>
		<h1 class="main-title">input validator using PHP</h1>
		<?php 
		// initialize the variables
		$errorMessage = $userMessage  = "";

		// form variables
		
		$employeeId = $_POST["employee-id"] ?? null;
		$zipCode = $_POST["zip-code"] ?? null;
		$firstName = $_POST["first-name"] ?? null;
		$lastName = $_POST["last-name"] ?? null;
		// santize input
		function formatVar($input) {
			$input = htmlspecialchars($input);
			$input = trim($input);
			$input = stripslashes($input);

			return $input;
		}

		function employeeName($firstName, $lastName) {
			
			// only allow letters
			$includedChars = "/^[a-zA-Z]+$/";
			if ($firstName === "" or $lastName === "") {
				return "no name entered";
			} elseif (strlen($firstName) <= 2 or strlen($lastName) <= 2) {
				return "invalid length, name must me 3 letters or longer";
			} else if (preg_match($includedChars, $firstName) === 0) {
				return "invalid chars";
			}
			else {
				return $firstName . $lastName;
			}
		}

		function checkEmployeeId($employeeId) {
			// check for two upperCase letters and 4 numbers format
			$validId = "/^([A-Z]{2})-(\d{4})+$/";
			if ( preg_match_all($validId, $employeeId, $matches ) === 0) {
				return "invalid employee Id";
			} elseif ($employeeId === "") {
				return "no employee Id entered";
			} else {
				return "valid employee Id";
			}	
		}
		// echo checkEmployeeId($employeeId);

		function checkZipCode($zipCode) {
			$validZip = "/^[0-9]{5}+$/";

			if ( preg_match_all($validZip, $zipCode, $matches) === 0) {
				return "invalid zip code format";
			} else {
				return "valid zip code";
			}
		}

		function validateInput($firstName, $lastName, 
			$employeeId, $zipCode) {
			return "your name is " . employeeName($firstName, $lastName) . "<br>" .  checkEmployeeId($employeeId) . "<br>" . checkZipCode($zipCode);
		}

		// check for empty values, output appropriate messages
		if (in_array("", $_POST)) {
			$errorMessage= "<span class='error'>required!</span>";
			$userMessage = "you didnt complete the form";
		} else {
			// echo employeeName($firstName, $lastName);
		}

		?>
		<form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
			
			<label for="first-name">what is your first name?
				<input type="text" name="first-name" id="first-name"><?=$errorMessage?>
			</label>

			<label for="last-name">what is your last name?
				<input type="text" name="last-name" id="last-name"><?=$errorMessage?>
			</label>

			<label for="employee-id">whats your employee id?
				<input type="text" name="employee-id" id="employee-id" placeholder="AA-1234 format"><?=$errorMessage?>
			</label>

			<label for="zip-code">whats your zip code?
				<input type="text" name="zip-code" id="zip-code" placeholder="enter 5 numbers"><?=$errorMessage?>
			</label>

			<input type="submit" value="submit">
		</form>
		<?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
			<p><?=$userMessage?></p>
			<?= validateInput($firstName, $lastName, 
			$employeeId, $zipCode) ?>
		<?php endif ?>
	</body>
</html>