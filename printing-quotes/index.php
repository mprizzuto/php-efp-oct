<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <meta charset="utf-8">

    <title>php: printing quotes</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="using PHP to print a quote and author">
   
  </head>
  <body>
  	<?php
  	include "../functions.php";
  	$errorMessage = $userMessage = $resultsTitle = "";
  	$quote = $_POST["quote"] ?? null;
  	$author = $_POST["author"] ?? null;


  	if ($_SERVER["REQUEST_METHOD"] === "POST") {
  		if ( in_array("", $_POST) ) {
  			$errorMessage = "<span class='error'>required</span>";	
  		} else if ( trim($quote) === "" or trim($author) === "" ) {
  				$userMessage = "invalid input";
  		} else {
  			$resultsTitle = "your results";
  			$userMessage = "your quote is " .  "''$quote''" . " the author is" . $author;
  		}
  	}
  	?>
  	<main class="exercise-main">
  		<section>
  			<inner-column>
  				<form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
  					<label for="quote">type a quote
  						<input type="text" name="quote" id="quote"><?=$errorMessage?>
  					</label>

  					<label for="author">type an author
  						<input type="author" name="author" id="author"><?=$errorMessage?>
  					</label>

  					<input type="submit" value="submit">
  				</form>
  			</inner-column>
  		</section>

  		<section class="results">
  			<inner-column>
  				<?php if ( !in_array("", $_POST) ): ?>
  					<h2 class="heading-two"><?=$resultsTitle?></h2>
  				<?=sanitizeInput($userMessage)?>
  			<?php endif;?>
  			</inner-column>
  		</section>
  	</main>

  </body>
</html>