<?php
// utility Function
function printLineBreak() {
  echo "\n---------------------------------------------\n";
}

// 1.Write a PHP function to sort an array of strings by their length, in ascending order.
// (Hint: You can use the usort() function to define a custom sorting function.)

$sampleArray = ["def", "a", "b", "pqrstuv", "bc", "ghij", "klmno", "wxyz"];
function sortArrayByLength($a, $b) {
  return strlen($a) - strlen($b);
};

usort($sampleArray, "sortArrayByLength");
print_r($sampleArray);

printLineBreak();

// 2.Write a PHP function to concatenate two strings,
// but with the second string starting from the end of the first string.

$string1 = "Hello  ";
$string2 = "World";

function concatStringWithReplace($string1, $string2) {
  $string1 = trim($string1);
  $string2 = trim($string2);

  $string2[0] = $string1[strlen($string1) - 1];

  return $string1 . $string2;
};

echo concatStringWithReplace($string1, $string2);

printLineBreak();

// 3.Write a PHP function to remove the first and last element from an array
// and return the remaining elements as a new array.

$targetArrayToRemove = [1, 2, 3, 4, 5];

function removeFirstAndLastElement($array) {
  array_shift($array);
  array_pop($array);
  return $array;
};

print_r(removeFirstAndLastElement($targetArrayToRemove));

printLineBreak();

// 4.Write a PHP function to check if a string contains only letters and whitespace.

$targetString = "Hello World";

function isLettersAndWhitespace($str) {
  return preg_match('/^[a-zA-Z\s]+$/', $str) ?
  'String Contains Only Letters and Whitespace' :
  'String Contains Other Characters';
}

echo isLettersAndWhitespace($targetString);

printLineBreak();

// 5.Write a PHP function to find the second largest number in an array of numbers.

$targetArray = [1, 2, 3, 4, 5];

function findSecondLargestNumber($array) {
  $largest = $array[0];
  $secondLargest = $array[0];

  foreach ($array as $value) {
    if ($value > $largest) {
      $secondLargest = $largest;
      $largest = $value;
    } else if ($value > $secondLargest) {
      $secondLargest = $value;
    }
  }

  return $secondLargest;
}

echo findSecondLargestNumber($targetArray);