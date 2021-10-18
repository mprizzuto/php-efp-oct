<!DOCTYPE html>
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

	?>

	<form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
		<label>
			<input type="" name="">
		</label>

		<input type="submit" value="submit">
	</form>
	</body>
</html>