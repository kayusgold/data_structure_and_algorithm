<?php

/**
 * BINARY SEARCH
 * Binary search is a search technique that can only apply to a sorted list/array.
 * Two techniques can be used to acheive binary search: Iteration and Recursive
 * Algorithm must always be measured based on Space and Time Complexity
 * Big O (n) will be used to measure our complexity and worst case performance
 */

//METHOD 1: Iteration
function binarySearchIteration(array $list, $needle)
{
    //check for empty array
    if (count($list) == 0) return false;

    $low = 0;
    $high = count($list) - 1;
    //this variable is of no use in binary. but I am adding it to show the number of tries before the result is found
    $tries = 0;

    while ($low <= $high) {
        //find the middle index of the list
        $midIndex = floor(($low + $high) / 2);

        $tries++;
        echo "No. of tries: $tries\r\n";

        //check if the needle is the middle value and if not, is the needle less/greater than the middle value
        if ($list[$midIndex] == $needle) {
            //found
            return true;
        }
        //it is not, check if the needle less/greater than the middle value
        if ($needle < $list[$midIndex]) {
            //shift the high position(index) down to the position below the current check ($list[$midIndex])
            $high = $midIndex - 1;
        } else {
            //shift the low position(index) up to the position above the current check($list[$midIndex])
            $low = $midIndex + 1;
        }
    }
    //If the code reaches here, that means that the needle does not exist in the list
    return false;
}

//METHOD 2: Recursive
function binarySearchRecursive(array $list, $startIndex, $endIndex, $needle)
{
    echo "Trying now \r\n";
    //NOTE: we want to be able to eleminate some range from the list as soon as we check that our current average
    //index value is less/greater than the needle. Hence, we need to pass the startIndex and endIndex for the
    //new batch of recursion

    //ensure that we are not checking the array list in reverse order
    if ($endIndex < $startIndex) return false;

    //find the middle index of the list
    $midIndex = floor(($endIndex + $startIndex) / 2);

    //check if the needle is the middle value and if not, is the needle less/greater than the middle value
    if ($list[$midIndex] == $needle) {
        //found
        return true;
    } else if ($needle > $list[$midIndex]) {
        //shift the startIndex up to the position above the current check($list[$midIndex])
        return binarySearchRecursive($list, $midIndex + 1, $endIndex, $needle);
    } else {
        //shift the endIndex down to the position below the current check($list[$midIndex])
        return binarySearchRecursive($list, $startIndex, $midIndex - 1, $needle);
    }
}

$list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$needle = 10;
echo "<p>List 1 - 10 | needle: $needle</p>";
$return = binarySearchIteration($list, $needle);
//$return = binarySearchRecursive($list, 0, count($list)-1, $needle);
if ($return) {
    echo "<p>Found $needle? YES</p>========================================";
} else {
    echo "<p>Found $needle? NO</p>========================================";
}

$start = 1;
$end = 100;
for ($i = 0; $i <= $end; $i++) {
    $list[] = $i;
}
$needle = 10;
echo "<p>List $start - $end | needle: $needle</p>";
$return = binarySearchIteration($list, $needle);
if ($return) {
    echo "<p>Found $needle? YES</p>========================================";
} else {
    echo "<p>Found $needle? NO</p>========================================";
}

$start = 1;
$end = 10000;
for ($i = 0; $i <= $end; $i++) {
    $list[] = $i;
}
$needle = 10;
echo "<p>List $start - $end | needle: $needle</p>";
$return = binarySearchIteration($list, $needle);
if ($return) {
    echo "<p>Found $needle? YES</p>========================================";
} else {
    echo "<p>Found $needle? NO</p>========================================";
}

$start = 1;
$end = 1000000;
for ($i = 0; $i <= $end; $i++) {
    $list[] = $i;
}
$needle = 1;
echo "<p>List $start - $end | needle: $needle</p>";
//$return = binarySearchIteration($list, $needle);
$return = binarySearchRecursive($list, 0, count($list) - 1, $needle);
if ($return) {
    echo "<p>Found $needle? YES</p>========================================";
} else {
    echo "<p>Found $needle? NO</p>========================================";
}
