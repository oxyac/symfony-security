<?php

namespace App\Entity;

use App\Repository\GnomeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GnomeRepository::class)]
class Gnome
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $hat;

    #[ORM\Column(type: 'string', length: 255)]
    private $boots;

    #[ORM\Column(type: 'integer')]
    private $mushrooms;

    #[ORM\ManyToOne(targetEntity: Village::class, inversedBy: 'id')]
    private $village;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHat(): ?string
    {
        return $this->hat;
    }

    public function setHat(string $hat): self
    {
        $this->hat = $hat;

        return $this;
    }

    public function getBoots(): ?string
    {
        return $this->boots;
    }

    public function setBoots(string $boots): self
    {
        $this->boots = $boots;

        return $this;
    }

    public function getVillage(): ?Village
    {
        return $this->village;
    }

    public function setVillage(?Village $village): self
    {
        $this->village = $village;

        return $this;
    }
}
