<?php

/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Init game and redirect to play game
 */
$app->router->get("guess/init", function () use ($app) {
    // init session for game start;
    // Sökvägen är relativ namespace: Filip\Guess\Guess()
    // $game = new Guess();
    $_SESSION["game"] = new Filip\Guess\Guess();
    return $app->response->redirect("guess/play");
});



/**
 * Show game status
 */
$app->router->get("guess/play", function () use ($app) {
    // echo "Some debugging information";
    $title  = "Play Game";

    if (!isset($_SESSION["game"])) {
        return $app->response->redirect("guess/init");
    }

    $response = $_SESSION["response"] ?? null;
    $guessNumber = $_SESSION["guessNumber"] ?? null;
    $cheat = $_SESSION["cheat"] ?? null;
    $guessCount = $_SESSION["game"]->getTries();

    $_SESSION["response"] = null;

    $_SESSION["guessNumber"] = null;
    $_SESSION["cheat"] = null;

    $data = [
        "guessCount" => $guessCount,
        "cheat" => $cheat,
        "guessNumber" => $guessNumber,
        "response" => $response
    ];

    $app->page->add("guess/play", $data);
    // $app->page->add("guess/debug");

    return $app->page->render([
        "title" => $title,
      ]);
});


/**
 * Process guesses
 */
$app->router->post("guess/processing.php", function () use ($app) {
    // echo "Some debugging information";
    $title  = "Play Game";
    $game = $_SESSION["game"] ?? null;

    if (!isset($_SESSION["game"])) {
        return $app->response->redirect("guess/init");
    }

    $doGuess = $_POST["submitGuess"] ?? null;
    $doCheat = $_POST["cheatGuess"] ?? null;
    $resetGuess = $_POST["resetGuess"] ?? null;

    if ($doGuess) {
        $_SESSION["guessNumber"] = $_POST["guessNumber"];
        $_SESSION["response"] = $game->makeGuess($_POST["guessNumber"]);
        if ($_SESSION["guessNumber"] == $game->getNumber()) {
            return $app->response->redirect("guess/init");
        }
    }

    if ($doCheat) {
        $_SESSION["cheat"] = $game->getNumber();
    }

    if ($resetGuess) {
        return $app->response->redirect("guess/init");
    }

    // $app->page->add("guess/play", $data);
    // $app->page->add("guess/debug");

    return $app->response->redirect("guess/play");
});



/**
* Showing message Hello World, rendered within the standard page layout.
 */
$app->router->get("lek/hello-world-page", function () use ($app) {
    $title = "Hello World as a page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("anax/v2/article/default", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
