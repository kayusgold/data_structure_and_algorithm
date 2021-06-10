<?php

/**
 * Meta binary search also known as one-sided binary can be used to get index of an element in an array
 * The array is not needed to be sorted.
 * It is a modified form of binary search that incrementally constructs the index of the target value in the array. Like normal binary search, meta binary search takes O(log n) time.
 */

function metaBinarySearch(array $list, $search_value, $n)
{
    $tries = 0;
    // Set number of bits to represent
    $lg = log($n - 1, 2) + 1;

    $pos = 0;
    for ($i = $lg - 1; $i >= 0; $i--) {
        $tries++;
        echo "Try: $tries \r\n";
        if ($list[$pos] == $search_value)
            return $pos;

        // Incrementally construct the index of the target value
        $new_pos = $pos | (1 << $i);

        // find the element in one direction and update $position
        if (($new_pos < $n) && ($list[$new_pos] <= $search_value)) {
            $pos = $new_pos;
        }
    }
    //if element is found, return position else return -1
    return (($list[$pos] == $search_value) ? $pos : -1);
}

//USAGE:
$list = [1, 2, 3, 4, 5, 6];
$needle = 2;
$return = metaBinarySearch($list, $needle, count($list));
echo "<p>Index of $needle in " . json_encode($list) . " is $return</p>";

$start = 1;
$end = 1000000;
for ($i = 0; $i <= $end; $i++) {
    $list[] = $i;
}
$needle = 9999;
//echo "Index 10005 has value " . $list[10005];
$return = metaBinarySearch($list, $needle, count($list));
echo "<p>Index of $needle in the list is $return</p>";
