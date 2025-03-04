<?php
// $i = 1;
// while ($i<= 4){
//     $j = 1;
//     while ($j <= 5) {
//         echo "$i $j <br/>";
//         $j++;
//     }
//     $i++;
// }

$s = 1;
while ($s<= 5){
    $h = 1;
    while ($h <= 5) {
        echo "X";
        $h++;
    }
    echo "<br/>";
    $s++;
}

//Rectangular x position

$i= 1;
while ($i<= 5){
    $j = 1;
    while ($j <= $i) {
        echo "*";
        $j++;
}
echo "<br>";
$i++;
}

// triangle position using nested loops

//triangle using for loop

for ($i= 5; $i > 0; $i--) {
    for ($j = 5; $j >= $i; $j--) {
        echo $j;
    }
    echo "<br>";
}

$num = 23;
$sumofdigit =0;
$temp = $num;
while ($num > 0 ) {
    $r = $num % 10; //23%10=3
    $sumofdigit += $r; //sum = 0+3= 3
    $num = (int) ($num /10); //n=23/10=20
}

echo"The sum of the digits of the numbers $temp is $sumofdigit."; //2+3=5

//Fibunacci Series

function fibanacci ($num){
    $a = 0;
    $b = 1;
    for ($i = 1; $i <= $num; $i++) {
        echo $a ."<br>";
        $c = $a + $b;
        $a = $b;
        $b = $c;
    }
}
echo "the fibanacci series:<br>";
echo fibanacci(10); //the fibanacci series calling function

