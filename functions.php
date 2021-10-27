<?php 
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
	
	function greetUser($name) :string {
		return $name;
	}

	function countChars($input) :int {
		return strlen($input);
	}
	
	// returns truthy if white space exists, and falsy otherwise
	function checkWhitespace($input) {
		return trim($input) === "" ? 1  : 0;
	}

	// check a string for letters. returns truthy if letters only, falsy otherwise
	function onlyWords($input) {
		$pattern = "/^[a-zA-Z]+$/";
		return preg_match_all($pattern, $input);
	}

?>