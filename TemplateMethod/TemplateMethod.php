<?php
abstract class Pet {
    abstract function eat();
    abstract function run();
    abstract function talk();
    function doAction() {
        $this->eat();
        $this->run();
        $this->talk();
    }
}

class Cat extends Pet {
    function eat() {
        echo "Cat is eating".PHP_EOL;
    }
    function run() {
        echo "Cat is running".PHP_EOL;
    }
    function talk() {
        echo "Meo Meo".PHP_EOL;
    }
}

class Dog extends Pet {
    function eat() {
        echo "Dog is eating".PHP_EOL;
    }
    function run() {
        echo "Dog is running".PHP_EOL;
    }
    function talk() {
        echo "Go Go Go".PHP_EOL;
    }
}

$dog = new Dog();
echo "Dog's actions:".PHP_EOL;
$dog->doAction();

echo PHP_EOL;

$cat = new Cat();
echo "Cat's actions:".PHP_EOL;
$cat->doAction();

?>