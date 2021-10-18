<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP anagram checker</title>
	</head>
	<body>
	<?php 
	// a more legible var_dump();
	function formatVar($input) {
		echo "<pre>";
		var_dump($input);
		echo "</pre>";
	}
	// formatVar();

	function compareWords($wordOne, $wordTwo) {
		// split both strings into an array
		$strOne = str_split($wordOne);
		$strTwo = str_split($wordTwo);

		// sort the array
		sort($strOne);
		sort($strTwo);

		// turn the array into a word
		$wordOneSorted = implode("", $strOne);
		$wordTwoSorted = implode("", $strTwo);

		// check if words are/ aren't anagrams
		if ($wordOneSorted === "$wordTwoSorted") {
			return "words are anagrams";
		} else {
			return "words arent anagrams ";
		}
	}

	// returns "words are anagrams"
	echo compareWords("marco" ,"ocram");

	?>
	<p><mark><span class="result"><?=compareWords("marco" ,"ocram")?></span></mark></p>

	<script>
		console.clear();
	</script>
	</body>
</html>