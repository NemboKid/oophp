<?php

include __DIR__ . "/config.php";
include __DIR__ . "/autoload.php";
include __DIR__ . "/src/functions.php";

session_name();
session_start();
//

if (!isset($_SESSION["game"])) {
    $_SESSION["game"] = new Guess();
}

if (isset($_POST["submitGuess"])) {
    $guess = $_POST["guessNumber"];
    $guessCount = $_SESSION["game"]->getTries();
    $response = $_SESSION["game"]->makeGuess($guess);

    header("Location: index.php?response=" . $response . "&count=" . $guessCount);
}

if (isset($_POST["cheatGuess"])) {
    $cheat = $_SESSION["game"]->getNumber();
    header("Location: index.php?cheat=".$cheat);
}

if (isset($_POST["resetGuess"])) {
    // $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    // Finally, destroy the session.
    session_destroy();
    header("Location: index.php");
}
