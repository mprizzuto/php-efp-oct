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

	// check a string for numbers only
	function onlyNums($input) {
		$pattern = "/^[0-9]+$/";
		return preg_match_all($pattern, $input);
	}

	function addNums(int $numOne, int $numTwo) {
		return $numOne + $numTwo;
	}

	function subtractNums(int $numOne, int $numTwo) {
		return $numOne - $numTwo;
	}

	function multiplyNums(int $numOne, int $numTwo) {
		return $numOne * $numTwo;
	}

	function divideNums(int $numOne, int $numTwo) {
		// return $numOne / $numTwo = 1;
		if ($numTwo === 0) {
			return "you cant divide by 0!";
		} if ($numTwo === 0) {
			return false;
		}
		else {
			return $numOne / $numTwo;
		}

	}






?>