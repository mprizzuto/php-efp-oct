<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <meta charset="utf-8">

    <title>PHP retirement calculator</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="retirement calculator using PHP">
  </head>
  <body>
    <?php 
    include "../functions.php";
    $error = $messageTitle = $userMessage = $yearsLeftToRetire = $retirementYear = $retirementYear = "";
    // formatInput($_POST);

    $currentAge = $_POST["current-age"] ?? null;
    $retirementAge = $_POST["retirement-age"] ?? null;

    $currentYear = (int) date("Y");

    $yearsLeftToRetire = (int)$retirementAge - (int)$currentAge ;

    $retirementYear = $currentYear + (int) $yearsLeftToRetire;

    $retirementMessage = $retirementAge <= 0 ? "you can retire already" : "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      if (in_array("", $_POST)) {
        $error = "<span class='error'>required</span>";
        $messageTitle = "invalid input";
        $userMessage = "you must complete the form";
      }
      
      $userMessage = sanitizeInput(retirementCalc());
    }

    ?>
    <main class="exercise-main">
      <section class="retirement-calc">
        <inner-column>
          <h1 class="heading-one">retirement calculator</h1>

          <form class="efp-form" method="post" action="<?=$_SERVER["PHP_SELF"]?>">
            <label for="current-age">current age
              <input type="text" name="current-age" id="current-age"><?=$error?>
            </label>

            <label for="retirement-age">age you want to retire
              <input type="text" name="retirement-age" id="retirement-age"><?=$error?>
            </label>

            <input type="submit" value="submit">
          </form>
        </inner-column>
      </section>
      <section class="results">
        <inner-column>
          <h2 class="heading-two"><?=$messageTitle?></h2>

          <p><?=$userMessage?></p>
        </inner-column>
      </section>
    </main>
  </body>
</html>