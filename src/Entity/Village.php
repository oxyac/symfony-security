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
    private $id;

    #[ORM\OneToMany(mappedBy: "village", targetEntity: Gnome::class)]
    private $gnomes;

    #[ORM\OneToOne(targetEntity: Gnome::class)]
    #[ORM\JoinColumn(name: "chef_id", referencedColumnName: "id")]
    private $chef;

    public function __construct()
    {
//        $this->gnomes = new ArrayCollection();
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

    public function addChef(Gnome $chef): self
    {
        if (!$this->chef->contains($chef)) {
            $this->chef[] = $chef;
            $chef->setVillage($this);
        }

        return $this;
    }

    public function removeChef(Gnome $chef): self
    {
        if ($this->chef->removeElement($chef)) {
            // set the owning side to null (unless already changed)
            if ($chef->getVillage() === $this) {
                $chef->setVillage(null);
            }
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGnomes()
    {
        return $this->gnomes;
    }

    /**
     * @param mixed $gnomes
     */
    public function setGnomes($gnomes): void
    {
        $this->gnomes = $gnomes;
    }
}
