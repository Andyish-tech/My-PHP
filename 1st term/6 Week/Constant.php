<?php
// Php constant
define('BASEPATH', "https://www.php.net/manual/en/function");
echo BASEPATH;

//php variable  declaration

define('PI', 3.14); 
echo "<br>" .PI;
//write php script tomare and perimeter of circle.

$area = PI* pow( 20,2);
echo "<br>" .$area;

$circlePerimeter = 2*PI*20;

echo "<br>" .$circlePerimeter;

CONST MESSAGE= "Am Good";
echo "<br>" .MESSAGE;

//MAGIC CONSTANT

echo "<br>" .__LINE__; //Current line number
echo "<br>" .__FILE__; //Current file name
echo "<br>" .__DIR__; //Current directory path
echo "<br>" .__FUNCTION__; //Current function name
echo "<br>" .__CLASS__; //Current class name
echo "<br>" .__NAMESPACE__ ;