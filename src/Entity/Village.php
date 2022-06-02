<?php

namespace App\Entity;

use App\Repository\VillageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VillageRepository::class)]
class Village
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[ORM\OneToMany(targetEntity: Gnome::class)]
    private $id;

    #[ORM\OneToOne(targetEntity: Gnome::class)]
    private $chef;

    public function __construct()
    {
        $this->chef = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, gnome>
     */
    public function getChef(): Collection
    {
        return $this->chef;
    }

    public function addChef(gnome $chef): self
    {
        if (!$this->chef->contains($chef)) {
            $this->chef[] = $chef;
            $chef->setVillage($this);
        }

        return $this;
    }

    public function removeChef(gnome $chef): self
    {
        if ($this->chef->removeElement($chef)) {
            // set the owning side to null (unless already changed)
            if ($chef->getVillage() === $this) {
                $chef->setVillage(null);
            }
        }

        return $this;
    }
}
