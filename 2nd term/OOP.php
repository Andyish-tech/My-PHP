<?php

class Person{
    //properties
    public $firstName;
    public $lastName;
    public $age;

    //method

    public function displayInfo(){
        echo"First Name". $this->firstName;
        echo"</br>";
        echo"Last Name". $this->lastName;
        echo"</br>";
        echo"Age". $this->age;
        echo"</br>";
}
}
//create object
$myPerson = new Person();
$myPerson ->firstName ="Tony";
$myPerson ->lastName ="Peter";
$myPerson ->age = 22;
$myPerson -> displayInfo();

//create object
$myPerson1 = new Person();
$myPerson1 ->firstName ="Mugabo";
$myPerson1 ->lastName ="Peter";
$myPerson1 ->age = 35;
$myPerson1 -> displayInfo();


?>