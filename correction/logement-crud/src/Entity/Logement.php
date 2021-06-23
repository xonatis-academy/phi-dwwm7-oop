<?php

namespace App\Entity {

    class Logement extends Entity
    {
        public $id;
        public $nom;
        public $prix;
        public $image;
        public $type;
        public $description;

        public function getId(): string
        {
            return $this->id;
        }

        public function getNom(): string
        {
            return $this->nom;
        }

        public function getPrix(): float
        {
            return $this->prix;
        }

        public function getImage(): string
        {
            return $this->image;
        }

        public function getType(): string
        {
            return $this->type;
        }

        public function getDescription(): string
        {
            return $this->description;
        }

        public function setId(string $value): void
        {
            $this->id = $value;
        }

        public function setNom(string $value): void
        {
            $this->nom = $value;
        }

        public function setPrix(float $value): void
        {
            $this->prix = $value;
        }

        public function setImage(string $value): void
        {
            $this->image = $value;
        }

        public function setType(string $value): void
        {
            $this->type = $value;
        }

        public function setDescription(string $value): void
        {
            $this->description = $value;
        }
    }
}
