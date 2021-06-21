<?php

class User extends Entity
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $image;
    protected $role;
    protected $email;
    protected $mot_de_passe;

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