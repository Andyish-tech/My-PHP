<?php

// $a =10;
// $b= 5;
// echo "Before Swap :A=$a and B=$b <br>";
// //SWAP
// $temp = $a; //temp value =10
// $a=$b; // a=5
// $b= $temp; // b=10
// echo" After Swap :A=$a andy B=$b ";
 
// echo "<br>.<br>.<br><br><br><br><br><br>";

//  for ($i= 1; $i< 20; $++){
    
 
// }

function mult ($num) {
    for ($i=1; $i<=$num; $i++){
        echo $i * $num ."<br>";
        $i++;
    }
}
echo mult(5);

// function prim($num){
// if ($num/$num ==1 && $num%2 !==0 || $num==2){
//     echo "Prime number: $num ";
// }else{
//     echo "$num is not Prime";
// }
// }
// echo prim(9);


function prime($num){
    if ($num/$num ==1 && $num/$num !==1 || $num==2 || $num==1){
        echo "Prime number: $num ";
    }else{
        echo "$num is not Prime";
    }
    }
    echo prime(13);

    $rep = replace("you", "me", "you are not me");
    echo $rep;