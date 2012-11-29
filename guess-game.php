<?php
//////////////////////////////////
//
// Vitaliy Pavlenko
// 11/28/12
//
// Game Guess a Number.
//
// But over the phone, with Twilio APIs!
//
// This file contains game logic
//

// Gather GET variables if they exist, otherwise set defaults
$try    = array_key_exists("try", $_GET) ? --$_GET["try"] : 3;
$guess  = array_key_exists("Digits", $_REQUEST) ? $_REQUEST["Digits"] : -1;
$number = array_key_exists("number", $_GET) ? $_GET["number"] : rand(0,9);

// Contains all the response text
include "text.php";

// Formulate proper response

if ($guess == $number) {  // Winner
  $response = say($win);
} else {
  switch ($try) {        
     case 3:
       $response = gather($number, $try, $greet);
       break;
     case 2:
     case 1:
       if ($guess > $number)
          $response = gather($number, $try, $lthan);
       else
          $response = gather($number, $try, $gthan);
       break;
     case 0:
       $response = say($fail);
       break;
     default:
       $response = say($error);
  }
}

// Render
echo $response;

?>