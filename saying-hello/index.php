<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <meta charset="utf-8">

    <title>PHP: saying hello</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="saying hello, using PHP and HTML 5">
  </head>
  <body>
  	<?php 
		include "../functions.php";

		$name = $_POST["name"] ?? null;
		$error = $resultsTitle = $userMessage = "";

		// only allow letters as valid input
		$onlyWords = "/^[a-zA-Z]+$/";

		// check srver request first!!
		if ($_SERVER["REQUEST_METHOD"] === "POST") {

			// check for empty values and set error message
			if ( in_array("", $_POST) ) {
				$error = "<span class='error'>required</span>";
				$resultsTitle = "you didnt enter anything, try again";
				// check for non-letter input and set error messages
			} else if (preg_match_all($onlyWords, $name) === 0) {
					$error = "<span class='error'>only enter letters</span>";
					$userMessage = "invalid entry, only enter letters";
			} else {
					$resultsTitle = "your results are";
					$userMessage = "hello " . sanitizeInput( greetUser($name) ) . " nice to meet you";
				}

			}
		?>

		<main class="exercise-main">
			<section class="welcome">
				<inner-column>
					<h1 class="heading-one">saying hello</h1>
					<p class="description">type your name and you will get a greeting</p>

					<form class="greet-user" method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
						<label for="name">type your name
							<input type="text" name="name" id="name"><?=$error?>
						</label>

						<input type="submit" value="submit">
					</form>
				</inner-column>
			</section>

			<section class="results">
				<inner-column>
					<h2 class="results-message"><?=$resultsTitle?></h2>
					<?php if ( !in_array("", $_POST) ): ?>
						<!-- <p>your results are</p> -->
						<?=$userMessage?>
					<?php endif; ?>
				</inner-column>

			</section>
		</main>
  </body>
</html>