<?php
namespace Filip\Guess;

/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class Guess
{
    /**
     * @var int $number   The current secret number.
     * @var int $tries    Number of tries a guess has been made.
     */
    public $number;
    public $tries;

    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the current number if no value is sent in.
     *
     * @param int $number The current secret number, default -1 to initiate
     *                    the number from start.
     * @param int $tries  Number of tries a guess has been made,
     *                    default 6.
     */
    public function __construct(int $number = -1, int $tries = 6)
    {
        if ($number > 0) {
            $this->number = $number;
        } else {
              $this->number = $this->random();
        }
        $this->tries = $tries;
    }



   /**
    * Randomize the secret number between 1 and 100 to initiate a new game.
    *
    * @return void
    */
    public function random() : int
    {
        $randint = rand(0, 100);
        return $randint;
    }



    /**
     * Get number of tries left.
     *
     * @return int as number of tries made.
     */
    public function getTries() : int
    {
        return $this->tries;
    }



    /**
     * Get the secret number.
     *
     * @return int as the secret number.
     */
    public function getNumber() : int
    {
        return $this->number;
    }



    /**
     * Make a guess, decrease remaining guesses and return a string stating
     * if the guess was correct, too low or to high or if no guesses remains.
     *
     * @throws GuessException when guessed number is out of bounds.
     *
     * @return string to show the status of the guess made.
     */
    public function makeGuess($guess) : string
    {
        if ($guess < 0 || $guess > 100) {
            throw new GuessException("The number must be between 0-100.");
        }
        $response = "";
        if ($this->tries < 1) {
            $response = "You have consumed all guesses";
            return $response;
        }
        if ($guess == $this->number) {
            $response = "<b>YOU GUESSED RIGHT!!!</b><br>(A new game will start automatically.)";
        } elseif ($guess > $this->number) {
            $response = "You guessed <b>" . $guess . "</b>, that's too high...";
        } else {
            $response = "You guessed <b>" . $guess . "</b>, that's too low...";
        }
        $this->tries = $this->tries - 1;
        return $response;
    }
}
