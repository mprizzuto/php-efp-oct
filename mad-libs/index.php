<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <meta charset="utf-8">

    <title>mad libs</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">
  </head>
  <body>
    <?php  
    $error = $userMessage = "";
    include "../functions.php";
    // formatInput($_POST);

    $noun = $_POST["noun"] ?? null;
    $verb = $_POST["verb"] ?? null;
    $adverb = $_POST["adverb"] ?? null;
    $adjective = $_POST["adjective"] ?? null;

    $speechArr = [$noun, $verb, $adverb, $adjective];
    $errorsArr = [];
    
    $onlyLetters = "/^[a-zA-Z0-9]+$/";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      if ( in_array("", $_POST) ) {
        // check for empty values and set error
        $errorReport = "user entered empty value";
        $error = "<span class='error'>required</span>";
        array_push($errorsArr, $errorReport);
      } else if ($_POST) {
        // set error if user tries to submit anything that isnt a letter
          foreach ($_POST as $key => $value) {
            if (onlyWords($value) === 0) {
               $error = "<span class='error'>only enter letters!</span>";
               $userMessage = "user entered invalid data";
               $errorReport = "user entered invaid data";

               array_push($errorsArr, $errorReport);
            }
          }
        }
        // if there are no errors, output the form data
        if ( count($errorsArr) == 0 ) {
            $userMessage = "the $noun quickly $verb nicely $adverb is $adjective";
          }

    }
    ?>
  	<main class="exercise-main">
  		<section class="mad-libs">
  			<inner-column>
  				<h1 class="heading-one">mad libs</h1>
  				<p class="description">follow the form instructions.</p>

  				<form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
  					
  					<label for="noun">type a noun
  						<input type="text" name="noun" id="noun"><?=$error?>
  					</label>

  					<label for="verb">type a verb
  						<input type="text" name="verb" id="verb"><?=$error?>
  					</label>

  					<label for="adverb">type an adverb
  						<input type="text" name="adverb" id="adverb"><?=$error?>
  					</label>

  					<label for="adjective">type an adjective
  						<input type="text" name="adjective" id="adjective"><?=$error?>
  					</label>

  					<input type="submit" value="submit">
  				</form>
  			</inner-column>
  		</section>

      <?php if ( $_SERVER["REQUEST_METHOD"] === "POST" and !in_array("", $_POST)) : ?>
        <section class="results">
        <inner-column>
          <h2>your results</h2>
         <?=sanitizeInput($userMessage)?>
        </inner-column>
      </section>
      <?php endif; ?>
  	</main>
  </body>
</html>