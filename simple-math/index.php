<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <meta charset="utf-8">

    <title>simple math</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="PHP and simple math. what can go wrong???">
    
  </head>
  <body>  

  	<?php 

  	include "../functions.php";
  	$userMessage = $resultsTitle = $errorMessage = "";
  	$numberOne = $_POST["number-one"] ?? null;
  	$numberTwo = $_POST["number-two"] ?? null;

  	// formatInput($_POST);

  	if ($_SERVER["REQUEST_METHOD"] === "POST") {
  		if ( in_array("", $_POST) ) {
  			$errorMessage = "<span class='error'>required</span>";
  			$resultsTitle = "you didnt enter anything";
  			$userMessage = "try again";
  		}
  		if ( onlyNums($numberOne) === 0 ) {
  			$errorMessage = "<span class='error'>numbers only!</span>";
  		}
  		else {
  			$userMessage = "$numberOne added to $numberTwo is " . addNums($numberOne, $numberTwo) . "<br> $numberOne subtracted from $numberTwo is  " . subtractNums($numberOne,$numberTwo) . "<br> $numberOne  divided by $numberTwo is " . divideNums($numberOne, $numberTwo) . "<br> $numberOne multiplied by $numberTwo is " . multiplyNums($numberOne, $numberTwo);
  		}
  	}
  	?>
  	<main class="exercise-main">
  		<section>
  			<inner-column>
  				<h1 class="heading-one">PHP simple math</h1>

  				<form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
  					<label for="number-one">type a number
  						<input type="text" name="number-one" id="number-one"><?=$errorMessage?>
  					</label>

  					<label for="number-two">type another number
  						<input type="text" name="number-two" id="number-two"><?=$errorMessage?>
  					</label>

  					<input type="submit" value="submit">
  				</form>
  			</inner-column>
  		</section>

  		<section class="results">
  			<inner-column>
  				<h2 class="heading-two"><?=$resultsTitle?></h2>
  				<p><?=$userMessage?></p>
  			</inner-column>
  		</section>
  	</main>
  </body>
</html>