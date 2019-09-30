<?php

interface Animal
{
    public function returnAnimal();
    public function returnAnimalSaid();
}

class Dog
{
    public function returnAnimal()
    {
        return 'dog ';
    }

    public function returnAnimalSaid() {
        return 'woof woof';
    }
}

class Cat
{
    public function returnAnimal()
    {
        return 'cat ';
    }

    public function returnAnimalSaid() {
        return 'meow meow';
    }
}

class GeneratePetsFacade
{
    private $dog;
    private $cat;

    public function __construct()
    {
        $this->dog = new Dog();
        $this->cat = new Cat();
    }

    public function returnPets()
    {
        $animalsArray = [
            0 => [
                    $this->cat->returnAnimal(),
                    $this->cat->returnAnimalSaid(),
                ],
            1 => [
                    $this->dog->returnAnimal(),
                    $this->dog->returnAnimalSaid(),
                ],
        ];
        for($i = 1; $i <= 10; $i++) {
            $randomAnimalIndex = array_rand($animalsArray);
            echo '<pre>' . $i . ' - ';
            echo $animalsArray[$randomAnimalIndex][0];
            echo $animalsArray[$randomAnimalIndex][1];
        }
    }
}

function showPets(GeneratePetsFacade $facade)
{
    $facade->returnPets();
}

$facade = new GeneratePetsFacade();
showPets($facade);