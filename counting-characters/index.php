<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <meta charset="utf-8">

    <title>PHP counting characters</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="counting the number of characters using PHP">
    
  </head>
  <body>
    <?php 
    include "../functions.php";
    $characters = $resultsMessage = $userMessage = $errorMessage = "";

    $userInput = $_POST["user-input"] ?? null;



    if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {
      if ( in_array("", $_POST) ) {
        $errorMessage = "<span class='error'>required</span>";
        $resultsMessage = "you didnt enter anything";
      }

      else {
        $userMessage = "there are " . sanitizeInput(countChars($userInput)) . " characters";
      }
    }
    ?>
    <main class="exercise-main">
      <section class="exercise">
        <inner-column>
          <h1 class="heading-one">character counter</h1>

          <p class="description">Enter something into the form below and the program will tell you howmanay characters are in it</p>

          <form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
            
            <label for="user-input">type something
              <input type="text" name="user-input" id="user-input"><?=$errorMessage?>
            </label>

            <input type="submit" vaule="submit">
          </form>
        </inner-column>
      </section>
      <section class="results">
        <inner-column>
          <h2 class="heading-two"><?=$resultsMessage?></h2>
          <p><?=$userMessage?></p>
        </inner-column>
      </section>
    </main>

  </body>
</html>