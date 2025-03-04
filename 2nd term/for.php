<?php
// $sum= 0;
// for($i = 0; $i <=100; $i++) {

//     if($i%2==0 ){
//         $sum+= $i;
//     }
// }
// echo "Sum =" . $sum . "<br>";

// $i=2;

// while($i<=10){

//     $sum+= $i;
//     $i+=2;
// }
// echo "Sum =" . $sum . "<br>";

//do while

// do{
//     $sum+= $i;
//     $i+=2;
// }while($i<=100);

// echo "Sum =" . $sum . "<br>";
$sum=0;
$arr=[7,78,80,40,12,3,56];

foreach($arr as $value) {
    echo "Values =" . $value. "<br>";
    $sum=$sum + $value;
    echo "Sum =" . $sum . "<br>";
}

// multiplication table for multiplication 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12

    $num=1;
    while($num<=12){
    echo "Multiplication Table of " . $num . "<br>";
    for($i=1; $i<=10; $i++){
        echo $num . " x " . $i . " = " . ($num * $i) . "<br>";
     
    }
    echo "<br>";
    $num++;
}

//a programm to check if number is prime

function isPrime($number) {
    if ($number <= 1) {
       echo "It is not prime number " . $number . "<br>";
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
           echo"It is prime number ".$number;
        }
    }
    return true;
}
isPrime(21)
?>