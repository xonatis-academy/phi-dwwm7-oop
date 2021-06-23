<?php

// STATIC SPACE
class Chat
{
    private $nom;
    private $age;

    public function __construct(string $nouveauNom, float $nouvelAge)
    {
        $this->nom = $nouveauNom;
        $this->age = $nouvelAge;
    }

    public function sePresenter() 
    {
        echo "Je m'appelle : " . $this->nom;
    }
}

// RUNTIME

$chat1 = new Chat('Felix');
$chat1->sePresenter();

$chat2 = new Chat('Tigrou');
$chat2->sePresenter();

