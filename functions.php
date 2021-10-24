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

?>