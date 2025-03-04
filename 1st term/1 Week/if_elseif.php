<?php
$scoreMarks=300;

if($scoreMarks >=90 && $scoreMarks <=100){
    echo "Grade: A";
}
elseif($scoreMarks >=80 && $scoreMarks<=89){
    echo "Grade: B";
}
elseif($scoreMarks >=70 && $scoreMarks<=79){
    echo "Grade: C";
}
elseif($scoreMarks >=60 && $scoreMarks<=69){
    echo "Grade: D";
}
elseif($scoreMarks >=50 && $scoreMarks<=59){  
    echo "Grade: E";
}elseif($scoreMarks > 100){
    echo "Invalid score range";
}
else{
    echo "Fail F";
}