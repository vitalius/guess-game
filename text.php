<?php
//////////////////////////////////
//
// Vitaliy Pavlenko
// 11/28/12
//
// "Media" file, has all the texts
//

include "bsgen.php";

$greet  = "Greetings friend! I'm thinking of a number between 0 and 9. ";
$greet .= "Guess the number in 3 tries and I will tell you ";
$greet .= "a valuable business advice! ";
$greet .= "Enter your guess now.";

$gthan  = "Sorry my number is greater than ".$guess.". Enter new guess";
$lthan  = "Sorry my number is less than ".$guess.". Enter new guess";

$fail   = "My number was $number. Good luck next time!";

$win    = "Wow, you've guessed my number. ";
$win   .= "In my professional opinion. ". bs() . ". ";
$win   .= "I hope this advice will serve you well. Good bye.";

$error  = "There has been an error, please hang up and try again. ";


// Format the Gather API in proper XML and wait for user input
function gather($number, $try, $say) {
  $r  = "<?xml version='1.0' encoding='utf-8' ?>";
  $r .= "<Response>";
  $r .= "<Gather numDigits='1' action='guess-game.php?number=";
  $r .= $number;
  $r .= "&amp;try=";
  $r .= $try;
  $r .= "' method='GET'>";
  $r .= "<Say voice='woman'>".$say."</Say>";
  $r .= "</Gather>";
  $r .= "</Response>";
  return $r;
}

// Simply say something and hang-up
function say($say) {
  $r  = "<?xml version='1.0' encoding='utf-8' ?>";
  $r .= "<Response>";
  $r .= "<Say voice='woman'>".$say."</Say>";
  $r .= "</Response>";
  return $r;
}

?>
