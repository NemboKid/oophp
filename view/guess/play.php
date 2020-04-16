<?php

namespace Anax\View;

/**
 * Template file to render a view with content.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

$response = $response ?? null;
$guessCount = $guessCount ?? null;
$cheat = $cheat ?? null;
// echo "<pre>";
// var_dump($_SESSION);

// if (isset($_GET)) {
//     if (isset($_GET["response"])) {
//         $response = $_GET["response"];
//         $count = $_GET["count"];
//     }
    // if (isset($_GET["count"])) {
    //
    // }
if ($cheat !== null) {
    $cheatMsg = "The cheat says the correct answer is: " . $cheat;
} else {
    $cheatMsg = "";
}

if ($response == null) {
    $response = "Make a guess";
}
// }

?>

<main>
    <article class="">
      <h2>Guess my number (SESSION)</h2>
        <div class="">
          <p style=""><?= $cheatMsg ?></p>
          <div style="width: 40%; height: 70px; text-align: center; border: 1px solid red; margin: 2em;">
              <p style=""><?= $response ?></p>
          </div>
            <?php echo "Guess a number between 1 and 100, you have " . $guessCount . " tries left.";  ?>
            <form class="" action="processing.php" method="post">
                <input type="number" name="guessNumber" step="1" placeholder="Guess a number">
                <input type="submit" name="submitGuess" value="Make Guess">
                <input type="submit" name="resetGuess" value="Reset Game">
                <input type="submit" name="cheatGuess" value="Cheat">
            </form>
        </div>
    </article>
</main>
