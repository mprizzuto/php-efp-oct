<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP password checker</title>
	</head>
	<body>
	<?php
	
	function formatVar($input) {
		echo "<pre>";
		var_dump($input);
		echo "</pre>";
	}
	// formatVar($_POST);
	$password = $_POST["the-password"] ?? null;

	function passwordValidator($password) {
		$userMessage = "";
		// $lettersAndNums = "/^[a-zA-Z]\d{1}+$/";
		$lettersAndNums = "/^[a-zA-Z \d{1}]+$/";
		// $sentence = "a0";
		$numsOnly = "/^\d+$/";
		$lettersOnly = "/^[a-zA-Z]+$/";
		$lettersNumsSpecialChars = "/./";

		if ( trim($password) === "" ) {
			return "required!" . 0;
		} 

		elseif ( strlen($password) < 8 and preg_match_all($numsOnly, $password, $matches) === 1) {
			return "very weak password, you only entered less than 8 chars and only nums" . 1;
		}

		elseif ( strlen($password) < 8 and preg_match_all($lettersOnly, $password, $matches) === 1) {
			return "weak password, less than 8 chars long and only letters" . 3;
		}

		elseif ( strlen($password) >= 8 and preg_match_all($lettersAndNums, $password, $matches) === 1)  {
			return "strong password, you entered atleast 8 letters an atleast one number" . 6;
		} 

		elseif ( strlen($password) >= 8 and preg_match_all($lettersNumsSpecialChars, $password, $matches) ) {
			return "very strong password, you entered atleast 8 alphanumeric characters and atleast one special char" . 10;
		}
	}

	?>

	<h1>type a password</h1>

	<p>and we will tell you how strong it is</p>

	<p>a number from 1-10 is returned. 1 is a very weak password and 10 is a very strong password</p>

	<form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
		<label for="the-password">type a password
			<input type="password" name="the-password" id="the-password">
		</label>

		<input type="submit" value="submit">
	</form>
	<?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
		<?=passwordValidator($password)?>
	<?php endif?>
	</body>
</html>