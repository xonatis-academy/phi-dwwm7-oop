<?php

class User extends Entity
{
    public $id;
    public $nom;
    public $prenom;
    public $image;
    public $role;
    public $email;
    public $mot_de_passe;

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

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function setPrenom(string $value): void
    {
        $this->prenom = $value;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $value): void {
        $this->image = $value;
    }

    public function getRole(): string {
        return $this->role;
    }

    public function setRole(string $value): void {
        $this->role = $value;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $value): void {
        $this->email = $value;
    }

    public function getMotDePasse(): string {
        return $this->mot_de_passe;
    }

    public function setMotDePasse(string $value): void {
        $this->mot_de_passe = $value;
    }


}
?>