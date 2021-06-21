<?php

class Produit extends Entity
{
    public $id;
    public $nom;
    public $prix;
    public $image;
    public $type;
    public $description;

    /**
     * Q3 : Pour éviter toute manipulation externe des propriétés des entités, nous allons rendre chaque propriété des entités interne et nous allons créer des getters et des setters.
     * Par exemple, pour la propriété id :
     * - mettre la propriété id en privé (la rendre interne)
     * - créer une méthode publique getId(): string qui renvoie la propriété interne
     * - créer une méthode publique setId(string $value): void qui permet de changer la propriété interne
     */

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $value): void
    {
        $this->id = $value;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $value): void
    {
        $this->nom = $value;
    }

    public function getPrix(): string
    {
        return $this->prix;
    }

    public function setPrix(string $value): void
    {
        $this->prix = $value;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $value): void {
        $this->image = $value;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $value): void
    {
        $this->type = $value;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $value): void
    {
        $this->description = $value;
    }
}
?>