<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\GnomeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GnomeRepository::class)]
#[ApiResource(
    collectionOperations: ['get' => ['normalization_context' => ['groups' => 'gnome:list']]],
//    itemOperations: ['get' => ['normalization_context' => ['groups' => 'gnome:item']]],
    order: ['boots' => 'DESC', 'hat' => 'ASC'],
    paginationEnabled: false
)]
class Gnome
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['gnome:list', 'gnome:item'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['gnome:list', 'gnome:item'])]
    private $hat;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['gnome:list', 'gnome:item'])]
    private $boots;

    #[ORM\Column(type: 'integer')]
    #[Groups(['gnome:list', 'gnome:item'])]
    private $mushrooms;

    #[ORM\ManyToOne(targetEntity: Village::class, inversedBy: 'gnomes')]
    #[Groups(['gnome:list', 'gnome:item'])]
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
