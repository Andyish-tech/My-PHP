<?php
//exersise of class colled car
class Car{
    public $CarName;
    public $CarPlate;
    public $CarManYear;

    public function displayCar(){
        echo"Car Name:" .$this ->CarName;
        echo"</br>";
        echo"Car Plate:" .$this ->CarPlate;
        echo"</br>";
        echo"Car ManYear:" .$this ->CarManYear;
        echo"</br>";
        echo"</br>";
    }
}
$car1 = new Car();
$car1 ->CarName="Rolls royce";
$car1 ->CarPlate="RAE 159 C";
$car1 ->CarManYear="2024";
$car1 -> displayCar();
//////////////////////////rjfruygfbyvturighbvnytughb
$car2 = new Car();
$car2 ->CarName="Range Rover";
$car2 ->CarPlate="RAE 259 D";
$car2 ->CarManYear="2024";
$car2 -> displayCar();

////////////////////itygh8jtiojrkgf09o

$car3 = new Car();
$car3 ->CarName="AUDI";
$car3 ->CarPlate="RAE 576 B";
$car3 ->CarManYear="2024";
$car3 -> displayCar();
?>