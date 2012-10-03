<?php

//Generic car information. Information that applies to all cars.
abstract class Car {
   
    public function getType(){
        echo $this->type;
    }
}

//Class that holds all the details on how to make a Honda.
class Honda extends Car{
    private $type = "Honda";
   
    public function getType(){
        echo $this->type;
    }
    //Add any code that makes this car different.
}

//Class that holds all the details on how to make a Toyota.
class Toyota extends Car{
    private $type = "Toyota";
   
    public function getType(){
        echo $this->type;
    }
    //Add any code that makes this car different.
}

//Class that holds all the details on how to make a Mazda.
class Mazda extends Car{
    private $type = "Mazda";
   
    public function getType(){
        echo $this->type;
    }
    //Add any code that makes this car different.
}

//The Car factory.  Input the type of car you want, and it will give it to you.
class CarFactory {
   
    //Different types of cars.
    const HONDA = "Honda";
    const TOYOTA = "Toyota";
    const MAZDA = "Mazda";
   
    //Make the car that is selected.
    public static function createCar($carType){
        switch($carType){
            case self::HONDA:
                return new Honda();
                break;
            case self::TOYOTA:
                return new Toyota();
                break;
            case self::MAZDA:
                return new Mazda();
        }
        die("Car isn't recognized.");
    }
   
}

//Make a car factory
$carFactory = new CarFactory();
//Create a Car
$Honda = $carFactory->createCar(CarFactory::HONDA);
//Run a method.
$Honda->getType();

$Mazda = $carFactory->createCar(CarFactory::MAZDA);
$Mazda->getType();

$Toyota = $carFactory->createCar(CarFactory::TOYOTA);
$Toyota->getType();

?>