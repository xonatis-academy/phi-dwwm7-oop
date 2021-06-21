<?php

class Produit extends Entity
{
    protected $id;
    protected $nom;
    protected $prix;
    protected $image;
    protected $type;
    protected $description;

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