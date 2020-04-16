<?php

// include __DIR__ . "../config.php";
// include __DIR__ . "../autoload.php";
// include __DIR__ . "../src/functions.php";


$response = "Guess a number!";
$count = 6;
$cheat = "";
// echo "<pre>";
// var_dump($_SESSION);

if (isset($_GET)) {
    if (isset($_GET["response"])) {
        $response = $_GET["response"];
        $count = $_GET["count"];
    }
    // if (isset($_GET["count"])) {
    //
    // }
    if (isset($_GET["cheat"])) {
        $cheat = "The cheat says the correct answer is: " . $_GET["cheat"];
    }
}

?>


<main>
    <article class="">
      <h2>Guess my number (POST)</h2>
        <div class="">
          <div style="width: 30%; height: 70px; text-align: center; border: 1px solid red; margin: 2em;">
              <p style=""><?= $response ?></p>
              <p style=""><?= $cheat ?></p>
          </div>
            <?php echo "Guess a number between 1 and 100, you have " . $count . " tries left.";  ?>
            <form class="" action="processing.php" method="post">
                <input type="number" name="guessNumber" step="1" placeholder="Guess a number">
                <input type="submit" name="submitGuess" value="Make Guess">
                <input type="submit" name="resetGuess" value="Reset Game">
                <input type="submit" name="cheatGuess" value="Cheat">
            </form>
        </div>
    </article>
</main>
