<?php

interface Animal
{
    public function returnAnimal();
    public function returnAnimalSaid();
    public function returnAnimalColor();
}

class Dog implements Animal
{
    public function returnAnimal()
    {
        return 'dog ';
    }

    public function returnAnimalSaid()
    {
        return 'woof woof';
    }

    public function returnAnimalColor()
    {
        return '#3f5efb';
    }
}

class Cat implements Animal
{
    public function returnAnimal()
    {
        return 'cat ';
    }

    public function returnAnimalSaid()
    {
        return 'meow meow';
    }

    public function returnAnimalColor()
    {
        return '#fc466b';
    }
}

class PetsFacade
{
    private $dog;
    private $cat;

    public function __construct()
    {
        $this->dog = new Dog();
        $this->cat = new Cat();
    }

    public function generateRandomPets()
    {
        $animalsArray = [
            0 => [
                    $this->cat->returnAnimal(),
                    $this->cat->returnAnimalSaid(),
                    $this->cat->returnAnimalColor()
                ],
            1 => [
                    $this->dog->returnAnimal(),
                    $this->dog->returnAnimalSaid(),
                    $this->dog->returnAnimalColor()
                ],
        ];

        $htmlToShow = '';

        for($i = 1; $i <= rand(10, 30); $i++) {
            $randomAnimalIndex = array_rand($animalsArray);
            $animal = $animalsArray[$randomAnimalIndex];
            $htmlToShow .= '<pre>' . $i . ' - ';
            $htmlToShow .= '<label style="color: ' . $animal[2] . '">';
                $htmlToShow .= $animal[0] . $animal[1];
            $htmlToShow .= '</label>';
        }

        echo $htmlToShow;
    }
}

function showPets(PetsFacade $facade)
{
    $facade->generateRandomPets();
}

$facade = new PetsFacade();
showPets($facade);