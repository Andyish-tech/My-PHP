<?php
//string function

$str=" php built in function";
echo strlen ( $str); // This show the length of string

echo "<br>" .strtolower ( $str ); // This change string to lower case

echo "<br>"  .strtoupper ( $str ); // This change string to upper case

echo "<br>"  . str_replace ("Hello", "Andy", "Hello World!"); // This function will search and replace Hello with Andy

//echo "<br>"  . str_replace_all ("Hello", "Mugisha", "Hello World!");

$array = array("banana", "apple", "orange");

echo "<br>" .implode(",", $array); // This function will transfor the array into strings

//echo "<br>" .explode(",", $str); // This function transform the string into an array

$date = date("Y-m-d H:i:s"); //this display the current date
echo "<br>" .$date;

$timestamp = mktime(12, 0, 0, 10, 15, 2024);
echo "<br/>" . date ("Y-m-d H:i:s:a", $timestamp);
echo "<br>";

echo "<br> Timestamp: " . $timestamp; // convert the timestamp 

echo "<br> Time stamp is:" . date("Y-m-d H:i:s", $timestamp); // convert the timestamp

$TIME =TIME();
echo "<br>" ."Current Time: " . $TIME;
echo "<br>";
echo date("Y-m-d H:i:s", $TIME);
echo "<br>";
$timestamp1 = strtotime ("yesterday");
echo date("Y-m-d", $timestamp1);